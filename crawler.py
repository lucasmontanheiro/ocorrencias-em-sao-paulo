import csv
import os
import requests
from bs4 import BeautifulSoup

# Define output path
OUTPUT_FILE = 'ssp_data_2016_2025.csv'

def clean_number(value):
    """
    Removes thousand separators (.) from numeric strings.
    Example: "145.598" -> "145598"
    """
    if not value:
        return ""
    # Remove dots that are used as thousand separators
    return value.replace('.', '').strip()

def fetch_and_parse(year, quarter):
    # Format quarter as 01, 02, etc.
    q_str = f"{quarter:02d}"
    url = f"https://www.ssp.sp.gov.br/assets/estatistica/trimestral/arquivos/{year}-{q_str}.htm"
    
    print(f"Fetching {url}...")
    try:
        response = requests.get(url, timeout=10)
        if response.status_code != 200:
            print(f"  Failed: {response.status_code}")
            return []
        
        # SSP pages usually encoded in windows-1252
        response.encoding = 'windows-1252'
        html_content = response.text
    except Exception as e:
        print(f"  Error fetching: {e}")
        return []

    soup = BeautifulSoup(html_content, 'html.parser')
    tables = soup.find_all('table')
    
    if not tables:
        print("  No tables found.")
        return []

    # Find main table
    target_table = None
    max_rows = 0
    for table in tables:
        rows = table.find_all('tr')
        if len(rows) > max_rows:
            max_rows = len(rows)
            target_table = table
            
    if not target_table:
        print("  Main table not found.")
        return []

    rows = target_table.find_all('tr')
    extracted_data = []
    
    # Per-file processing state
    current_category = "Uncategorized"
    
    for row in rows:
        cells = row.find_all(['td', 'th'])
        row_data = []
        for cell in cells:
            text = cell.get_text(strip=True)
            row_data.append(text)
            
        if row_data:
            # Check for ITEM row (Category)
            # Original Column A is at index 0
            if len(row_data) > 1 and row_data[0].strip() == "ITEM":
                current_category = row_data[1].strip()

            # Remove first column (Column A)
            cleaned_row = row_data[1:]
            
            # Skip empty rows
            if not any(cell.strip() for cell in cleaned_row):
                continue
            
            # Identify header row
            is_header = False
            if len(cleaned_row) > 1 and cleaned_row[1] == "Capital":
                is_header = True
                
            if is_header:
                # Return header with special flag
                row_with_meta = ["HEADER", "Category"] + cleaned_row
                extracted_data.append(row_with_meta)
            else:
                # Apply number cleaning to data rows
                # cleaned_row = [Natureza, Capital, ...]
                # Index 0 is Natureza (text), Index 1+ are numbers
                
                # Prepend Category to Natureza to ensure uniqueness
                natureza_unique = f"{current_category} - {cleaned_row[0]}"
                
                formatted_row = [natureza_unique] + [clean_number(val) for val in cleaned_row[1:]]
                
                # Add Year, Quarter, Category
                final_row = [str(year), q_str, current_category] + formatted_row
                extracted_data.append(final_row)
                
    return extracted_data

def main():
    all_data = []
    header_written = False
    
    # Loop 2016 to 2025
    for year in range(2016, 2026):
        for quarter in range(1, 5):
            file_rows = fetch_and_parse(year, quarter)
            
            for row in file_rows:
                if row[0] == "HEADER":
                    if not header_written:
                        # Extract the dynamic header part from this row
                        # row structure: ["HEADER", "Category", Col1, Col2...]
                        # desired output header: ["Year", "Quarter", "Category", Col1, Col2...]
                        
                        dynamic_headers = row[2:] # specific stats columns
                        full_header = ["Year", "Quarter", "Category"] + dynamic_headers
                        all_data.append(full_header)
                        header_written = True
                else:
                    all_data.append(row)
                    
    print(f"Total rows collected: {len(all_data)}")
    print(f"Writing to {OUTPUT_FILE}...")
    
    with open(OUTPUT_FILE, 'w', newline='', encoding='utf-8') as f:
        writer = csv.writer(f)
        writer.writerows(all_data)
        
    print("Done.")

if __name__ == "__main__":
    main()
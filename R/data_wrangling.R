# Load necessary libraries
library(dplyr)
library(lubridate)
library(ggplot2)
library(scales)
library(tidyr)
library(DataExplorer)
library(stringr)


# Estado
# 1. Read the dataset
df <- read.csv("ocorrencias-em-sao-paulo/ssp_data_2016_2025.csv", header = TRUE, check.names = FALSE)

# 2. Clean and format the dates
df_clean <- df %>%
    mutate(
        Month = (Quarter - 1) * 3 + 1,
        Date = make_date(Year, Month, 1)
    )

# DataExplorer::plot_missing(df_clean)

# 3. Aggregate data for the whole state ('Estado') for ALL metrics
df_aggregated <- df_clean %>%
    group_by(Date, Year, Quarter, metric) %>%
    summarise(Total_Ocorrencias = sum(as.numeric(Estado), na.rm = TRUE), .groups = "drop") %>%
    filter(!is.na(metric) & metric != "") %>% # Remove any blank or NA metrics
    arrange(Date)

# 4. Reshape the aggregated data to get metrics as columns
df_wide <- df_aggregated %>%
    pivot_wider(
        names_from = metric,
        values_from = Total_Ocorrencias
    )

# 5. Handle missing data profile and filter out bad columns
missing_profile <- profile_missing(df_wide)

# Identify bad columns (>= 5% missing data)
bad_columns <- missing_profile %>%
    filter(pct_missing >= 0.05) %>%
    pull(feature)

# Remove bad columns from df_wide
df_wide <- df_wide %>%
    select(-all_of(bad_columns))

# DataExplorer::plot_missing(df_wide)

# Extract a vector of all unique metrics directly from the columns that remain
# Exclude the grouping/time columns
unique_metrics <- setdiff(names(df_wide), c("Date", "Year", "Quarter"))

# 6. Export df_wide to a new CSV file
write.csv(df_wide, "ocorrencias-em-sao-paulo/R/df_wide_estado.csv", row.names = FALSE)


# Região
# 1. Read the raw dataset
df <- read.csv("ocorrencias-em-sao-paulo/ssp_data_2016_2025.csv", header = TRUE, check.names = FALSE)

# 2. Clean and format the dates
df_clean <- df %>%
    mutate(
        Month = (Quarter - 1) * 3 + 1,
        Date = make_date(Year, Month, 1)
    )

# 3. Pivot regions into a single column
# Exclude Category, metric, Estado (which is total), Date, Year, Quarter, Month
region_cols <- setdiff(names(df_clean), c("Category", "metric", "Estado", "Date", "Year", "Quarter", "Month"))

df_long <- df_clean %>%
    mutate(across(all_of(region_cols), as.character)) %>%
    pivot_longer(
        cols = all_of(region_cols),
        names_to = "Region",
        values_to = "Total_Ocorrencias"
    )

# 4. Aggregate data (group by Date, Region, metric)
df_aggregated <- df_long %>%
    group_by(Date, Region, metric) %>%
    summarise(Total_Ocorrencias = sum(as.numeric(Total_Ocorrencias), na.rm = TRUE), .groups = "drop") %>%
    filter(!is.na(metric) & metric != "") %>%
    arrange(Date)

# 5. Reshape the aggregated data to get metrics as columns
df_wide <- df_aggregated %>%
    pivot_wider(
        names_from = metric,
        values_from = Total_Ocorrencias
    )

# 5. Handle missing data profile and filter out bad columns
missing_profile <- profile_missing(df_wide)

# Identify bad columns (>= 5% missing data)
bad_columns <- missing_profile %>%
    filter(pct_missing >= 0.05) %>%
    pull(feature)

# Remove bad columns from df_wide
df_wide <- df_wide %>%
    select(-all_of(bad_columns))

# Extract a vector of all unique metrics directly from the columns that remain
# Exclude the grouping columns
unique_metrics <- setdiff(names(df_wide), c("Date", "Region"))

# 6. Export df_wide to a new CSV file
write.csv(df_wide, "ocorrencias-em-sao-paulo/R/df_wide_regiao.csv", row.names = FALSE)

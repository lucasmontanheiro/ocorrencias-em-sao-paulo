# Load necessary libraries
library(dplyr)
library(ggplot2)
library(tidyr)
library(scales)
library(stringr)

# 1. Read the already processed wide dataset
df_wide <- read.csv("ocorrencias-em-sao-paulo/R/df_wide_estado.csv", check.names = FALSE, stringsAsFactors = FALSE)

# Extract metric names (excluding time columns)
metric_names <- setdiff(names(df_wide), c("Date", "Year", "Quarter"))

# 2. Extract Category names from the metric columns
# The python crawler prepended the category using " - "
categories <- sapply(metric_names, function(m) {
    strsplit(m, " - ")[[1]][1]
})
unique_cats <- unique(categories)
unique_cats <- unique_cats[!is.na(unique_cats) & unique_cats != ""]

# 3. Calculate Yearly Totals for each metric
# df_wide already has Year, we just need to sum all quarters up per year
yearly_totals_wide <- df_wide %>%
    group_by(Year) %>%
    summarise(across(all_of(metric_names), ~ sum(.x, na.rm = TRUE)), .groups = "drop")

# 4. Group into 'Before' and 'After' periods (Excluding 2020-2022)
# We pivot to long format to do the math easily for all metrics
period_comparison <- yearly_totals_wide %>%
    pivot_longer(cols = all_of(metric_names), names_to = "Metric", values_to = "Total_Year") %>%
    mutate(Period = case_when(
        Year < 2020 ~ "Before_2020",
        Year > 2022 ~ "After_2022",
        TRUE ~ "Exclude"
    )) %>%
    filter(Period != "Exclude") %>%
    group_by(Metric, Period) %>%
    summarise(Avg_Yearly = mean(Total_Year, na.rm = TRUE), .groups = "drop") %>%
    pivot_wider(names_from = Period, values_from = Avg_Yearly, values_fill = 0) %>%
    # Log10 cannot handle 0. We must ensure both periods have at least > 0 occurrences
    filter(Before_2020 > 0 & After_2022 > 0) %>%
    mutate(
        Pct_Increase = (After_2022 - Before_2020) / Before_2020,
        # Re-attach Category by splitting the Metric string exactly as done previously
        Category = sapply(Metric, function(m) strsplit(m, " - ")[[1]][1])
    )

# 5. Open a PDF device to save all category plots
pdf("ocorrencias-em-sao-paulo/R/All_Categories_Dumbbell_Plots.pdf", width = 14, height = 9)

# 6. Initialize the FOR loop
for (current_cat in unique_cats) {
    # Filter data for the current category in the loop
    df_cat <- period_comparison %>% filter(Category == current_cat)

    if (nrow(df_cat) > 0) {
        # ---------------------------------------------------------
        # Clean the Metric names for plotting
        # ---------------------------------------------------------
        df_cat <- df_cat %>%
            mutate(
                # Remove the Category string from the Metric string
                Metric_Clean = gsub(current_cat, "", Metric, fixed = TRUE),
                # Remove any leftover leading dashes, colons, or whitespace
                Metric_Clean = trimws(sub("^[-:[:space:]]+", "", Metric_Clean)),
                # Fallback
                Metric_Clean = ifelse(Metric_Clean == "", Metric, Metric_Clean)
            )

        # Order the factor using the new Clean Metric name
        df_cat$Metric_Clean <- factor(df_cat$Metric_Clean, levels = df_cat$Metric_Clean[order(df_cat$Pct_Increase)])

        # Create the Dumbbell Plot
        p <- ggplot(df_cat) +
            geom_segment(
                aes(
                    x = Before_2020, xend = After_2022,
                    y = Metric_Clean, yend = Metric_Clean
                ),
                color = "gray70", linewidth = 1.2
            ) +
            geom_point(aes(x = Before_2020, y = Metric_Clean), color = "#5F6368", size = 3) +
            geom_point(aes(x = After_2022, y = Metric_Clean), color = "#D32F2F", size = 3) +
            geom_text(
                aes(
                    x = pmax(Before_2020, After_2022), y = Metric_Clean,
                    label = paste0(ifelse(Pct_Increase > 0, "+", ""), round(Pct_Increase * 100, 1), "%")
                ),
                color = "#D32F2F", fontface = "bold", hjust = -0.3, vjust = 0.5, size = 4.5
            ) +
            scale_x_log10(labels = comma, expand = expansion(mult = c(0.05, 0.8))) +
            theme_minimal() +
            labs(
                title = paste("", current_cat),
                subtitle = "Média de ocorrências anuais (Antes de 2020 vs Depois de 2022).",
                x = "Média de ocorrências por ano (Log10 Scale)",
                y = NULL,
                caption = "Fonte: https://www.ssp.sp.gov.br | Ponto cinza = Antes de 2020, Ponto vermelho = depois de 2022"
            ) +
            theme(
                plot.title = element_text(face = "bold", size = 16, color = "#202124"),
                plot.subtitle = element_text(size = 11, color = "gray40", margin = margin(b = 15)),

                # Angled and reduced text size for the Y-axis to save space
                axis.text.y = element_text(face = "bold", size = 8, angle = 20, hjust = 1, color = "#202124"),
                axis.text.x = element_text(size = 10),
                panel.grid.major.y = element_blank(),
                panel.grid.minor.x = element_blank(),
                plot.margin = margin(t = 20, r = 80, b = 20, l = 10)
            )

        # Print the plot
        print(p)
    }
}

# 7. Close the PDF device
dev.off()

print("All category dumbbell plots have been generated and saved to 'All_Categories_Dumbbell_Plots.pdf'!")

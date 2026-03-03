library(dplyr)
library(lubridate)
library(ggplot2)
library(scales)
library(tidyr)
library(stringr)

# 1. Read the raw dataset
df_wide <- read.csv("ocorrencias-em-sao-paulo/R/df_wide_regiao.csv", header = TRUE, check.names = FALSE)
df_wide$Date <- as.Date(df_wide$Date)

# (Data is already aggregated by Date and Region, and pivoted wider on metric)

# Extract a vector of all unique metrics directly from the columns that remain
# Exclude the grouping columns
unique_metrics <- setdiff(names(df_wide), c("Date", "Region"))

# 6. Open a PDF graphics device to save all plots in one file
pdf("ocorrencias-em-sao-paulo/R/All_Metrics_Regions_Time_Series.pdf", width = 12, height = 7)

# 7. Start the FOR loop
for (metric_name in unique_metrics) {
    # Skip to the next metric if all values are NA
    if (all(is.na(df_wide[[metric_name]]))) {
        next
    }

    # Create the ggplot directly using the column from df_wide
    p <- ggplot(df_wide, aes(x = Date, y = !!sym(metric_name), color = Region)) +
        geom_line(alpha = 0.6, linewidth = 1, na.rm = TRUE) +
        geom_point(alpha = 0.6, size = 1.5, na.rm = TRUE) +
        scale_y_continuous(labels = comma) +
        scale_x_date(date_breaks = "1 year", date_labels = "%Y") +
        theme_minimal() +
        labs(
            title = paste(str_wrap(metric_name, width = 60)),
            subtitle = "Ocorrências por trimestre de 2016 a 2025",
            x = "Ano",
            y = "Boletins de Ocorrência",
            color = "Região",
            caption = "Fonte: Estado de São Paulo"
        ) +
        theme(
            plot.title = element_text(face = "bold", size = 12),
            plot.subtitle = element_text(color = "gray40", size = 11),
            axis.title = element_text(face = "bold"),
            legend.position = "right",
            panel.grid.minor = element_blank()
        )

    # Print the plot to the PDF
    print(p)
}

# 8. Close the PDF device
dev.off()

print("All regional breakdown plots have been generated and saved to 'All_Metrics_Regions_Time_Series.pdf'")

library(dplyr)
library(tidyr)
library(ggplot2)
library(ggcorrplot)

# 1. Read the already processed wide dataset
df_wide <- read.csv("ocorrencias-em-sao-paulo/R/df_wide_estado.csv", check.names = FALSE, stringsAsFactors = FALSE)

# Extract metric names (excluding time columns)
metric_names <- setdiff(names(df_wide), c("Date", "Year", "Quarter"))

# 2. Extract Category names from the metric columns
# The python crawler prepended the category using " - "
# Example: "Category Name - Specific Metric Name"
categories <- sapply(metric_names, function(m) {
    # Split by " - " and take the first part
    strsplit(m, " - ")[[1]][1]
})

unique_categories <- unique(categories)
unique_categories <- unique_categories[!is.na(unique_categories) & unique_categories != ""]

# 3. Open a PDF graphics device to save all heatmaps
pdf("ocorrencias-em-sao-paulo/R/Category_Correlation_Matrices.pdf", width = 10, height = 10)

# 4. Start the FOR loop by Category
for (cat_name in unique_categories) {
    # Find all metrics that belong to this category
    # We use exact matching on the extracted category to avoid partial matches
    cat_metrics <- metric_names[categories == cat_name]

    if (length(cat_metrics) < 2) {
        message(paste("Skipping:", cat_name, "- Only 1 metric found."))
        next
    }

    # Select only the metrics for this category
    df_cat_wide <- df_wide %>% select(all_of(cat_metrics))

    # SAFETY CHECK 1: Ensure we have at least 3 time periods to calculate a meaningful correlation
    if (nrow(df_cat_wide) < 3) {
        message(paste("Skipping:", cat_name, "- Not enough time periods for correlation."))
        next
    }

    # SAFETY CHECK 2: THE FIX for the NA variance error
    # We use dplyr to safely select only columns where variance is strictly greater than 0 and not NA
    df_cat_wide <- df_cat_wide %>%
        select(where(~ !is.na(var(.x, na.rm = TRUE)) && var(.x, na.rm = TRUE) > 0))

    # SAFETY CHECK 3: Do we still have at least 2 metrics left to compare?
    if (ncol(df_cat_wide) < 2) {
        message(paste("Skipping:", cat_name, "- Not enough metrics with variance > 0."))
        next
    }

    # Calculate Correlation Matrix
    cor_matrix <- cor(df_cat_wide, use = "pairwise.complete.obs", method = "pearson")

    # Clean up column names for the plot by removing the category prefix to save space
    # (e.g. replacing "Category - Metric" with just "Metric")
    cleaned_names <- gsub(paste0("^", cat_name, " - "), "", colnames(cor_matrix))
    colnames(cor_matrix) <- cleaned_names
    rownames(cor_matrix) <- cleaned_names

    # Create the heatmap using ggcorrplot
    p_corr <- ggcorrplot(cor_matrix,
        method = "square",
        type = "lower",
        outline.color = "white",
        ggtheme = theme_minimal(),
        colors = c("#D32F2F", "white", "#1A73E8"),
        lab = TRUE,
        lab_size = 3,
        title = paste("Correlação:", cat_name)
    ) +
        theme(
            plot.title = element_text(face = "bold", size = 12),
            axis.text.x = element_text(angle = 45, hjust = 1, size = 9),
            axis.text.y = element_text(size = 9)
        )

    # Print plot to PDF
    print(p_corr)
}

# 5. Close the PDF device
dev.off()

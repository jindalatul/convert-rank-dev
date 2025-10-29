<?php
function attach_ai_search_volume_by_keyword(array $ai_search_volumes, array $keyword_data): array 
{
    // 1. Create a lookup map for ai_search_volume using the keyword as the key
    $ai_volume_map = [];
    foreach ($ai_search_volumes as $item) {
        $keyword = $item['keyword'] ?? null;
        if ($keyword) {
            $ai_volume_map[$keyword] = $item['ai_search_volume'] ?? null;
        }
    }

    $merged_array = [];

    // 2. Iterate through the main data array and add the volume from the map
    foreach ($keyword_data as $data) {
        $keyword = $data['keyword'] ?? null;
        
        // Retrieve the volume from the map, using 0 if the keyword doesn't exist
        $ai_volume = $ai_volume_map[$keyword] ?? 0; // Use 0 or null as a default if keyword is missing
        
        // Add the 'ai_search_volume' to the current element
        $data['ai_search_volume'] = $ai_volume;
        
        // Add the modified data to the new array
        $merged_array[] = $data;
    }
    
    // Optional: You can remove the count warning if you use this keyword-based merging,
    // as it gracefully handles missing keywords or extra keywords in either array.
    
    return $merged_array;
}

function remove_duplicate_keywords(array $array): array {
    $unique_items = [];
    
    foreach ($array as $item) {
        $keyword = $item['keyword'] ?? null;
        
        // Use the 'keyword' as the array key. 
        // Duplicate keywords will overwrite the previous entry.
        if ($keyword !== null) {
            $unique_items[$keyword] = $item;
        }
    }
    
    // Use array_values() to reset the array keys from keywords back to 0, 1, 2...
    return array_values($unique_items);
}

function get_non_present_keywords_in_metrics_array(array $seed_keywords, array $keywords_with_metrics): array
{
    // 1. Extract the 'keyword' column from the metrics array
    $metric_keywords = array_column($keywords_with_metrics, 'keyword');
    
    // 2. Find the difference between the two arrays
    $not_present = array_diff($seed_keywords, $metric_keywords);
    
    return $not_present;
}
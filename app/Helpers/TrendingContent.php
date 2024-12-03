<?php

namespace App\Helpers;

use App\Models\Blog;
use App\Models\Product;

/**
 * Helper class to fetch trending content like most viewed blogs and products.
 */
class TrendingContent {

    /**
     * Fetches the top 4 most viewed blogs and products.
     *
     * @return array An array containing two collections:
     *               - The first collection contains the top 4 most viewed blogs.
     *               - The second collection contains the top 4 most viewed products.
     */
    public static function getTopViewed() {
        // Get the top 4 blogs sorted by view count in descending order
        $mostViewedBlogs = Blog::orderBy('count_view', 'desc')
                                ->limit(4)
                                ->get();

        // Get the top 4 products sorted by view count in descending order
        $mostViewedProducts = Product::orderBy('count_view', 'desc')
                                      ->limit(4)
                                      ->get();

        // Return the collections of blogs and products
        return [$mostViewedBlogs, $mostViewedProducts];
    }
}

<?php

namespace Frontend;

if (!class_exists('LatestUpdateProducts')) {
    class LatestUpdateProducts {

        // Method to fetch latest updated products
        public static function get_latest_updated_products($limit = 5)
        {
            $args = array(
                'post_type' => 'product', // Assuming you are using WooCommerce
                'posts_per_page' => $limit,
                'orderby' => 'modified',
                'order' => 'DESC',
            );

            $query = new \WP_Query($args);
            return $query->posts;
        }

        // Method to render the fetched products
        public static function render_products($products)
        {
            echo '<ul>';
            foreach ($products as $product) {
                echo '<li><a href="' . get_permalink($product->ID) . '">' . $product->post_title . '</a></li>';
            }
            echo '</ul>';
        }

        // Method to register the shortcode
        public static function register_shortcode()
        {
            add_shortcode('latest_updated_products', function ($atts) {
                // Extract shortcode attributes with a default value
                $atts = shortcode_atts(array(
                    'limit' => 5, // Default limit if not specified
                ), $atts);

                // Ensure the limit is an integer
                $limit = intval($atts['limit']);

                // Get the latest updated products
                $products = self::get_latest_updated_products($limit);

                // Capture the output
                ob_start();
                self::render_products($products);
                return ob_get_clean();
            });
        }
    }
}

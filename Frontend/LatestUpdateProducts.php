<?php

namespace Frontend;

if (!class_exists('LatestUpdateProducts')) {
    class LatestUpdateProducts {

        // Method to fetch latest updated products
        public static function get_latest_updated_products($limit = 5, $paged = 1)
        {
            // Debugging: Check current page
            error_log('Current page: ' . $paged);

            $args = array(
                'post_type' => 'product', // Assuming you are using WooCommerce
                'posts_per_page' => $limit,
                'orderby' => 'modified',
                'order' => 'DESC',
                'paged' => $paged,
            );

            $query = new \WP_Query($args);
            return $query;
        }


        // Method to render the fetched products
        public static function render_products($query)
        {
            if ($query->have_posts()) {
                echo '<div class="latest-updated-products">';
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div>';
                    echo '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
                    echo '</div>';
                }
                echo '</div>';

                // Pagination
                self::render_pagination($query);
                
                // Reset Post Data
                wp_reset_postdata();
            } else {
                echo '<p>No products found.</p>';
            }
        }

        // Method to render pagination links
        public static function render_pagination($query)
        {
            $big = 999999999; // need an unlikely integer
        
            $pagination = paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $query->max_num_pages,
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
                'type' => 'list',
            ));
        
            if ($pagination) {
                echo '<div class="pagination d-block">';
                echo $pagination;
                echo '</div>';
            }
        }
        
        
        // Method to register the shortcode
        public static function register_shortcode()
        {
            add_shortcode('latest_updated_products', function ($atts) {
                $atts = shortcode_atts(array(
                    'limit' => 5,
                ), $atts);

                $limit = intval($atts['limit']);
                $paged = max(1, get_query_var('paged', 1)); // Handle pagination

                $query = self::get_latest_updated_products($limit, $paged);

                ob_start();
                self::render_products($query);
                // self::render_pagination($query);
                return ob_get_clean();
            });
        }
    }
}

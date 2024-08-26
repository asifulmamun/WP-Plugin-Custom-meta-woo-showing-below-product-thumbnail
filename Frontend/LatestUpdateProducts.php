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
                echo '<div id="latest_update_products" class="col-12 col-md-12">'; ?>
                <div class="lts_update_products_pagination">
                    <?php
                        // Pagination
                        self::render_pagination($query);
                    ?>
                </div>
                <div class="row lts_update_product_header">
                    <div class="col-3 col-md-3">Thumbnail</div>
                    <div class="col-5 col-md-5">Product Details</div>
                    <div class="col-2 col-md-2">Date</div>
                    <div class="col-2 col-md-2">Download</div>
                </div>
                <?php while ($query->have_posts()):
                    $query->the_post(); ?>

                    <div class="row mb-2 item_lts_update_product">
                        <div class="col-3 col-md-3">
                            <a href="<?php echo get_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
                            </a>
                        </div>
                        <div class="col-5 col-md-5 lts_content">
                            <a class="title" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                            <p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                        </div>
                        <div class="col-2 col-md-2">
                            <span title="Updated Date"><?php echo get_the_modified_date('F j, Y', get_the_ID()); ?></span>
                        </div>
                        <div class="col-2 col-md-2">
                            <?php
                                // check login
                                if ( is_user_logged_in() ){
                                    
                                    // check membership plugin active or not
                                    if ( is_plugin_active( 'yith-woocommerce-membership-premium/init.php' ) ){
                                    
                                        echo do_shortcode('[membership_protected_links]');
                                        echo '<br/><a class="join_now" href="/membership-plans/">Join Now</a>';
                                    
                                    } else{
                                        echo '<a class="join_now" href="/membership-plans/">Join Now</a>';
                                    }
                                }else{
                                    echo '<a class="join_now" href="/membership-plans/">Join Now</a>';
                                }
                            ?>
                        </div>
                    </div>
                <?php endwhile;
                echo '</div>';
                ?>
                <script>
                    // If membership download button found then Join now hide
                    document.addEventListener('DOMContentLoaded', function() {
                        // Find all elements with the class 'yith-wcmbs-download-button'
                        var downloadButtons = document.querySelectorAll('.yith-wcmbs-download-button');
                        
                        downloadButtons.forEach(function(downloadButton) {
                            // Get the parent container of the current download button
                            var parentContainer = downloadButton.parentElement;
                            
                            // Check if there is a 'Join Now' button in the same parent container
                            var joinNowButton = parentContainer.querySelector('.join_now');
                            
                            if (joinNowButton) {
                                // Hide the 'Join Now' button
                                joinNowButton.style.display = 'none';
                            }
                        });
                    });
                </script>
                <style>
                    .lts_update_product_header{
                        background: #000;
                        color: #fff;
                        font-weight: 800;
                        padding: .6rem 0rem;
                        border-radius: 3px;
                    }
                    .lts_update_product_header>div{
                        border-right: 1px solid #fff;
                    }
                    .lts_update_product_header>div:last-child{
                        border-right: 0 !important;
                    }
                    #latest_update_products{
                        display: flex;
                        flex-direction: column;
                        gap: 1.4rem;
                    }
                    #latest_update_products .item_lts_update_product{
                        background-color: #ededed;
                        color: #444444;
                        padding-top: 1rem;
                        padding-bottom: 1rem;
                        align-items: center;
                        border-radius: 5px;
                        box-shadow: 5px 3px 11px -2px #1e1d1d;
                        -ms-box-shadow: 5px 3px 11px -2px #1e1d1d;
                        -moz-box-shadow: 5px 3px 11px -2px #1e1d1d;
                        -webkit-box-shadow: 5px 3px 11px -2px #1e1d1d;
                        -o-box-shadow: 5px 3px 11px -2px #1e1d1d;
                    }
                    #latest_update_products .item_lts_update_product a img{
                        width: 100%;
                        max-height: 9.3rem;
                    }
                    #latest_update_products .item_lts_update_product .lts_content a.title{
                        font-size: 1.1rem;
                        font-weight: 600;
                        margin-bottom: .2rem;
                    }
                    .join_now{
                        background: #000;
                        color: #fff;
                        padding: .4rem .8rem;
                        border-radius: 5px;
                        font-size: 1rem;
                        text-transform: uppercase;
                        box-shadow: 4px 5px 8px 1px #383131;
                        -ms-box-shadow: 4px 5px 8px 1px #383131;
                        -moz-box-shadow: 4px 5px 8px 1px #383131;
                        -webkit-box-shadow: 4px 5px 8px 1px #383131;
                        -o-box-shadow: 4px 5px 8px 1px #383131;
                    }
                    .join_now:hover{
                        color: #fff;
                        border-radius: 0;
                    }
                </style>
                <div class="lts_update_products_pagination">
                    <?php
                        // Pagination
                        self::render_pagination($query);
                    ?>
                </div>
                <style>
                    .lts_update_products_pagination{
                        display: block;
                        margin: 0 auto;
                        padding: 2rem 0;
                        color: #1e1d1d;
                    }
                    .lts_update_products_pagination .pagination ul{
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        gap: .3rem;
                    }
                    .lts_update_products_pagination .pagination ul li{
                        list-style: none;
                        flex-grow: 1;
                        
                    }
                    .lts_update_products_pagination .pagination ul li a{
                        all: unset;
                        background-color: #000;
                        color: #fff;
                        padding: 0.5rem 1rem;
                        border-radius: 3px;
                        cursor: pointer;
                    }
                    .lts_update_products_pagination .pagination ul li:hover a{
                        background-color: #fff;
                        border: 1px solid #000;
                        color: #000;
                    }
                </style>

                <?php
                
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

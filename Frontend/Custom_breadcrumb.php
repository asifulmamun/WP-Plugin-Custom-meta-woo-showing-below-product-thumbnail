<?php

namespace Frontend;

if(!class_exists('Custom_breadcrumb')){
    class Custom_breadcrumb {
    
        function register() {
            // Remove default WooCommerce breadcrumbs
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    
            // Add custom breadcrumbs
            add_action('woocommerce_before_main_content', array($this, 'custom_woocommerce_breadcrumb'), 20);
        }
    
    
        public function custom_woocommerce_breadcrumb() {?>
        
        
            <!-- Breadcrumbs -->
            <div class="container-fluid custom_breadcrumbs">
                <div class="row">
                    <div class="col-lg-12 col-12 col-md-12 text-center" style="">
                        <?php
                            
                            // Product Title
                            // woocommerce_template_single_title();


                            /**
                             * @package woodmart
                             * Product Breadcrumbs by asifulmaun
                             */
                            
                            // Get the product category IDs
                            $product_cats_ids = get_the_terms( get_the_ID(), 'product_cat' );

                            // If product belongs to at least one category
                            if ( $product_cats_ids && ! is_wp_error( $product_cats_ids ) ) {
                                // Get the first category ID
                                $product_cat_id = reset($product_cats_ids)->term_id;
                                // Get the category object
                                $product_cat = get_term( $product_cat_id, 'product_cat' );
                                
                                // Output category name
                                $custom_breadcrumbs = '<a href="' . get_home_url() . '">Home</a>';
                                $custom_breadcrumbs .= ' / ';
                                $custom_breadcrumbs .= '<a href="' . get_term_link($product_cat) . '">' . $product_cat->name . '</a>';
                                echo get_the_title() . '<br/>';

                                echo $custom_breadcrumbs;
                            }
                        ?>
                    </div>
                </div><!-- /.row -->
            </div>
            <!-- / Breadcrumbs -->


            <!-- Product Mini Status -->
            <section class="container product_mini_status">
                <ul class="row">


                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Auto Update</div>
                            <div><a target="_blank" href="/how-to-update/">Yes (1 Year)?</a></div>
                        </div>
                    </li>
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Mannual Update</div>
                            <div><a target="_blank" href="/how-to-update-manually/">Yes (1 Year)?</a></div>
                        </div>
                    </li>

                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/hj38MWnT/Screenshot-from-2024-03-15-00-44-35.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Version</div>
                            <div>20.0.2 <sup><a target="_blank" href="/contact-version">Update?</a></sup></div>
                        </div>
                    </li>
                    
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/pV4YFHqt/Screenshot-from-2024-03-15-00-45-15.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Update On</div>
                            <div>March 14, 2024</div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- / Product Mini Status -->





            <style>
                /* Global */
                :root{
                    --custom_breadcrumb_text_color: #fff;
                    
                    --custom_secondary_color: #7558a2;
                    --custom_secondary_txt: gray;
                    --custom_optional_color: red;

                }
                ul{
                    list-style: none;
                }

                /* Breadcrumbs */
                .custom_breadcrumbs {
                    background-image: url("https://wp-premium.org/wp-content/uploads/2021/09/digitals-newslatter-bg.jpg");
                    padding: 3rem .8rem;
                }
                .product_title{
                    margin: 0 0 .7rem 0;
                }
                .custom_breadcrumbs, .custom_breadcrumbs h1, .custom_breadcrumbs a{
                    color: var(--custom_breadcrumb_text_color);
                }

                /* Product Mini Status */
                .product_mini_status{
                    padding: 2rem .8rem;
                }
                .product_mini_status li{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .product_mini_status .mini_status_desc div:first-child{
                    color: var(--custom_secondary_color);
                    font-weight: 600;
                }
                .product_mini_status .mini_status_desc div:last-child{
                    color: var(--custom_secondary_txt);
                }
                .product_mini_status .mini_status_desc div:last-child sup a{
                    text-transform: uppercase;
                    color: var(--custom_optional_color);
                }
            </style>

        
        <?php }
    }
}



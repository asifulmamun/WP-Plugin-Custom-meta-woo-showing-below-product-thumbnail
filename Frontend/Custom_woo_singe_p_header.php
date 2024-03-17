<?php

namespace Frontend;


use Frontend\Custom_breadcrumb as CB; // Custom BreadCrumb

if (!class_exists('Custom_woo_singe_p_header')) {
    class Custom_woo_singe_p_header {

        private $custom_breadcrumb;

        
        public function register() {

            // Remove default WooCommerce breadcrumbs
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    

            // Add custom breadcrumbs
            add_action('woocommerce_before_main_content', array(__CLASS__, 'custom_woocommerce_breadcrumb'), 20);
    
            
            // Add custom breadcrumbs
            add_action('woocommerce_before_main_content', array($this, 'custom_woocommerce_breadcrumbs'), 20);
        }

        // Custom Breadcrumb
        public static function custom_woocommerce_breadcrumb() {

            CB::custom_woocommerce_breadcrumb();
        }

        public function custom_woocommerce_breadcrumbs() {?>
        
        


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



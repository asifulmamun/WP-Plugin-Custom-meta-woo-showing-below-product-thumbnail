<?php

namespace Frontend;


use Frontend\Elements\Custom_breadcrumb as CB; // Custom BreadCrumb
use Frontend\Elements\Mini_Status_woo_header as MSWH; // Custom Mini Status


if (!class_exists('Customize_woo_single_page')) {
    class Customize_woo_single_page {


        
        public function register() {

            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); // Remove default WooCommerce breadcrumbs

            add_action('woocommerce_before_main_content', array(__CLASS__, 'custom_section'), 20); // custom_woocommerce_breadcrumb
            add_action('woocommerce_before_main_content', array($this, 'woo_product_single_header'), 20); // woo_product_single_header
        }

        // Custom Breadcrumb
        public static function custom_section() {

            CB::custom_woocommerce_breadcrumb(); // Custom BreadCrumbs
            MSWH::mini_status(); // Custom Mini Status Woo Header
        }





        /**
         *  Global for WOO Single Page 
         */
        public function woo_product_single_header() {?>
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
            </style>
        <?php }




    }
}



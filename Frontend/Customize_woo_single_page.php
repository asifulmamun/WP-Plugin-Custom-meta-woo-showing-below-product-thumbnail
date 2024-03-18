<?php

namespace Frontend;

use Frontend\Data\Get_meta as GM; // Get Meta
use Frontend\Elements\Custom_breadcrumb as CB; // Custom BreadCrumb
use Frontend\Elements\Mini_Status_woo_header as MSWH; // Custom Mini Status
use Frontend\Elements\Virus_total_el_single_product as VT; // Virus Total

if (!class_exists('Customize_woo_single_page')) {
    class Customize_woo_single_page {


        
        public function register() {

            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); // Remove default WooCommerce breadcrumbs
            add_action('woocommerce_before_main_content', array($this, 'global_woo_single'), 20); // woo_product_single_header

            add_action('woocommerce_before_main_content', array(__CLASS__, 'custom_section_as_header'), 20); // custom_woocommerce_breadcrumb
            
            add_action('woocommerce_before_add_to_cart_button', array(__CLASS__, 'custom_section_before_add_to_cart'));

        
        }

        // Custom Breadcrumb
        public static function custom_section_as_header() {

            CB::custom_woocommerce_breadcrumb(); // Custom BreadCrumbs

            /**
             *  mini_status($au, $mu, $version, $uo)
             *  Where $au - Auto Update, $mu- Mannual Update, $version - version, $uo - Update On
             *  mini_status(11years, $12years, '3.2.0', '2024-03-25') - Formate (11year/01years - first 1/0 means true/false)
             *  @package wp-premium.org
             */
            MSWH::mini_status(GM::get_meta('auto_update'), GM::get_meta('mannual_update'), GM::get_meta('product_version'), GM::get_meta('custom_product_update_on')); // Custom Mini Status Woo Header
        }


        public static function custom_section_before_add_to_cart(){

            VT::virus_status_btn_before_add_to_cart_single_page();
        }


        /**
         *  Global for WOO Single Page 
         */
        public function global_woo_single() {?>
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



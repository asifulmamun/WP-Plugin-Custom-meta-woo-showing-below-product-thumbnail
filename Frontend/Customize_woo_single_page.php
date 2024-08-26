<?php

namespace Frontend;

use Frontend\Data\Get_meta as GM; // Get Meta
use Frontend\Elements\Custom_breadcrumb as CB; // Custom BreadCrumb
use Frontend\Elements\Mini_Status_woo_header as MSWH; // Custom Mini Status
use Frontend\Elements\Virus_total_el_single_product as VT; // Virus Total

if (!class_exists('Customize_woo_single_page')) {
    class Customize_woo_single_page {


        
        public function register() {

            // remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); // Remove default WooCommerce breadcrumbs
            add_action('woocommerce_before_main_content', array($this, 'global_woo_single'), 20); // woo_product_single_header


            // add_action('woocommerce_before_main_content', array(__CLASS__, 'custom_section_as_header'), 20); // custom_woocommerce_breadcrumb
            add_action('woocommerce_before_add_to_cart_button', array(__CLASS__, 'custom_section_before_add_to_cart'));
            add_action('woocommerce_after_single_product_summary', array(__CLASS__, 'custom_section_after_additional_info_and_reviews'), 25);
            
        }

        // // Custom Breadcrumb
        // public static function custom_section_as_header() {
        //     if (is_product()) {
                
        //         CB::custom_woocommerce_breadcrumb(); // Custom BreadCrumbs
        //     }
        //     /**
        //      *  mini_status($au, $mu, $version, $uo)
        //      *  Where $au - Auto Update, $mu- Mannual Update, $version - version, $uo - Update On
        //      *  mini_status(11years, $12years, '3.2.0', '2024-03-25') - Formate (11year/01years - first 1/0 means true/false)
        //      *  @package wp-premium.org
        //      */

            
        //     if (is_product() && (has_term('wordpress-themes', 'product_cat') || has_term('wordpress-plugins', 'product_cat'))) {
        //         $au         = get_post_meta(get_the_ID(), 'auto_update', true);
        //         $mu         = get_post_meta(get_the_ID(), 'mannual_update', true);
        //         $version    = get_post_meta(get_the_ID(), 'product_version', true);
        //         $uo         = get_post_meta(get_the_ID(), 'custom_product_update_on', true);
                
        //         if(get_post_meta(get_the_ID(), 'custom_product_update_on', true) > '2024-08-24'){
        //             MSWH::mini_status($au, $mu, $version, $uo);
        //         }
        //     }
        // }


        // Before Add to Cart
        public static function custom_section_before_add_to_cart(){
            
            // If the hash file are exist
            if(GM::get_meta('vt_data') !== null){

                VT::virus_status_btn_before_add_to_cart_single_page();
            }
        }


        // After product desc/summery
        public static function custom_section_after_additional_info_and_reviews(){
            // If the hash file are exist
            if(GM::get_meta('vt_data') !== null){
                VT::after_pdocut_summery_or_desc(GM::get_meta('vt_data'));
            }
        }


        /**
         *  Global for WOO Single Page 
         */
        public function global_woo_single() {?>
            <style>
                /* Global */
                :root{
                    --custom_breadcrumb_text_color: #fff;
                    --virus_total_primary_color: green;
                    --custom_secondary_color: #7558a2;
                    --custom_secondary_txt: gray;
                    --custom_optional_color: red;
                }
                ul{
                    list-style: none;
                }

                /* display */
                .d_none{
                    display: none !important;
                }
                .d_block{
                    display: block !important;
                }
                .d_visible{
                    display: visible !important;
                }
            </style>
        <?php }




    }
}



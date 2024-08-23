<?php

namespace Frontend\Data;

/* 
 *  Data Showing
 *  Get_meta::get_meta($meta_name);
 */
if(!class_exists('Get_meta')){
    
    class Get_meta {

        public static function get_meta($field) {
            global $product;
    
            // Ensure $product is a valid instance and has the get_meta method
            if (!is_a($product, 'WC_Product') || !method_exists($product, 'get_meta')) {
                return;
            }
    
            // Get the demo URL from product meta
            // $data = $product->get_meta($field);
            $data = get_post_meta(get_the_ID(), $field, true);
        
            if (!empty($data)){
                return $data;
            }
            
        }
    }
}
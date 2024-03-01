<?php
/*
Plugin Name: WooCommerce Custom Meta Below Product Thumbnail
Plugin URI: https://github.com/asifulmamun/WP-Plugin-Custom-meta-woo-showing-below-product-thumbnail/
Description: This is the custom meta box, where user can add meta from product edit page and it will be showing below the product thumbnail, this plugin inspiration by https://wp-premium.org
Version: 1.2.5
Author: Al Mamun - asifulmamun
Author URI: https://asifulmamun.info.bd
*/

// Backend
include(plugin_dir_path(__FILE__) . 'admin/Custom_meta_woo.php');


// Frontend
include(plugin_dir_path(__FILE__) . 'frontend/Show_product_single_meta.php');




// Meta Box
use Admin\Custom_meta_woo as Woo_meta;
$woo_meta = new Woo_meta;
$woo_meta->meta_name = 'Demo URL';
$woo_meta->field_desc = 'Enter The Demo URL';
$woo_meta->field_name = 'demo_url';




// Showing Demo
use Frontend\CustomJSAndCSSForSingleProduct as Demo;
$demo = new Demo;
<?php
/*
Plugin Name: wp-premium.org
Plugin URI: https://github.com/asifulmamun/WooCommerce-wp-premium.org
Description: This is the custom meta box, where user can add meta from product edit page and it will be showing below the product thumbnail, this plugin inspiration by https://wp-premium.org
Version: 2.0.0
Author: Al Mamun - asifulmamun
Author URI: https://asifulmamun.info.bd
*/


define('PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('FILE_DIR', dirname( __FILE__ ) );


if( file_exists( FILE_DIR . '/vendor/autoload.php' ) ){
    require_once FILE_DIR . '/vendor/autoload.php';
}




// // Backend
// include(plugin_dir_path(__FILE__) . 'Admin/Custom_meta_woo.php');


// // Frontend
// include(plugin_dir_path(__FILE__) . 'Frontend/Show_product_single_meta.php');




// Meta Box
use Admin\Custom_meta_woo as Woo_meta;
$woo_meta = new Woo_meta;
$woo_meta->meta_name = 'Demo URL';
$woo_meta->field_desc = 'Enter The Demo URL';
$woo_meta->field_name = 'demo_url';

// Meta Box
use Admin\Custom_meta_woo as Video;
$Video = new Woo_meta;
$Video->meta_name = 'Video Url';
$Video->field_desc = 'Enter The Video URL';
$Video->field_name = 'video_url';





// Showing Demo
use Frontend\Custom_btn;
$demo = new Custom_btn;










/* ==================== PLUGIN TASKS =================================================================================================== */
// Activation hook
function activate_render_3d() {
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'activate_render_3d');



// Deactivation hook
function deactivate_render_3d() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'deactivate_render_3d');

/* ==================== / PLUGIN DEFAULT =================================================================================================== */

<?php
/*
Plugin Name: wp-premium.org
Plugin URI: https://github.com/asifulmamun/wp-premium.org/tree/release
Description: This is the custom meta box, where user can add meta from product edit page and it will be showing below the product thumbnail, this plugin inspiration by https://wp-premium.org
Version: 2.1.0
Author: Al Mamun - asifulmamun
Author URI: https://asifulmamun.info.bd
*/


define('PLUGIN_DIR', plugin_dir_path(__FILE__) );
define('FILE_DIR', dirname( __FILE__ ) );


if( file_exists( FILE_DIR . '/vendor/autoload.php' ) ){
    require_once FILE_DIR . '/vendor/autoload.php';
}


/* ==================== PLUGIN TASKS =================================================================================================== */
// Activation hook
function activate() {
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'activate');


// // TMPA
// require_once dirname( __FILE__ ) . '/Admin/Inc/TGM_Plugin_Activation.php';
// use Admin\Inc\Tgmpa_wp_premium as TGMPA_wp;
// $tg = new TGMPA_wp;
// $tg->register();


// Tepm Test
// require_once PLUGIN_DIR . 'temp.php';


// Deactivation hook
function deactive() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'deactive');

/* ==================== / PLUGIN DEFAULT =================================================================================================== */



/**
 * This is for elements below - product thumbnail for wooCommerce
 * @package - WooCommerce-custom-elements-below-thumbnail
 * 
  */
    
    // By JS - Auto add btn below thumb
    use Frontend\Add_element_below_product_thumb as UlProductBelow;
        $ul_product_below = new UlProductBelow;
        $ul_product_below->register();
        $ul_product_below->query_select = '.woocommerce-product-gallery--with-images';
        $ul_product_below->new_el = 'ul';
        $ul_product_below->new_el_id = 'el_below_product_thumb';
        $ul_product_below->new_el_className = 'el_below_product_thumb';
        $ul_product_below->new_el_styles = '<style>.el_below_product_thumb{flex-basis:100%;order:100;list-style:none;padding:.8rem 0 .8rem 0;display:flex;flex-direction:row;gap:0.8rem;margin-bottom:0 !important;}</style>';
        // $ul_product_below->new_el_innerHTML = '<b>The Demo</b>';


    // Demo URL
    use Admin\Custom_meta_btn_link_woo as Demo;
        $demo = new Demo;
        $demo->field_desc = 'Enter The Demo URL';
        $demo->meta_name = 'Demo URL';
        $demo->field_name = 'demo_url';
        // btn
        $demo->meta_name_btn_txt = 'Button Name';
        $demo->field_name_btn_submit = 'demo_btn';
        $demo->field_name_btn_txt = 'View Demo';
        // Show
        use Frontend\Custom_btn as Demo_btn;
        $demo_btn = new Demo_btn;
        $demo_btn->field = $demo->field_name;
        $demo_btn->field_name_btn_submit = $demo->field_name_btn_txt;


    // Video - Dashboard as Need Update
    use Admin\Custom_meta_btn_link_woo as Video;
        $Video = new Video;
        $Video->meta_name = 'Update Link';
        $Video->field_desc = 'Enter Update URL';
        $Video->field_name = 'video_url';
        // btn
        $Video->meta_name_btn_txt = 'Button Name';
        $Video->field_name_btn_submit = 'video_btn';
        $Video->field_name_btn_txt = 'Need Update ?';
        // show
        use Frontend\Custom_btn as Video_btn;
        $video_btn = new Video_btn;
        $video_btn->field = $Video->field_name;
        $video_btn->field_name_btn_submit = $Video->field_name_btn_txt;





/**
 * Add Mini Status YES/NO and Value
 * @package wp-premium.org
 */

    // //  Auto update field
    // use Admin\Custom_meta_yes_no_data_woo_woodmart as c_Field_auto_update;
    //     $custom_field_auto_update = new c_Field_auto_update;
    //     $custom_field_auto_update->register();
    //     $custom_field_auto_update->field_name = 'auto_update';
    //     $custom_field_auto_update->meta_name = 'Auto Update';

    // // Mannual Update Field
    // use Admin\Custom_meta_yes_no_data_woo_woodmart as c_Field_mannual_update;
    //     $custom_field_mannual_update = new c_Field_mannual_update;
    //     $custom_field_mannual_update->register();
    //     $custom_field_mannual_update->field_name = 'mannual_update';
    //     $custom_field_mannual_update->meta_name = 'Mannual Update';




/**
 * Text Field
 * @package wp-premium.org
 */

    // // Version
    // use Admin\Custom_meta_text_woo_woodmart as c_Version;
    //     $custom_post_version = new c_Version;
    //     $custom_post_version->register();
    //     $custom_post_version->field_name = 'product_version';
    //     $custom_post_version->meta_name = 'Version';


    // // Virus Total Hash File
    // use Admin\Custom_meta_text_woo_woodmart as Virus_total;
    //     $vt = new Virus_total;
    //     $vt->register();
    //     $vt->field_name = 'vt_data';
    //     $vt->meta_name = 'Virus Total Hash File';




/**
 * Date Field
 * @package wp-premium.org
 */

    // // Update ON
    // use Admin\Custom_meta_date_woo_woodmart as UpdateOn;
    // $upo = new UpdateOn;
    // $upo->register();
    // $upo->field_name = 'custom_product_update_on';
    // $upo->meta_name = 'Update On';



/**
 * Custom Section
 * @package wp-premium.org 
 */

    // // Single product - top of product header or section - custom bredcrums - product meta data table etc
    // use Frontend\Customize_woo_single_page as CustomSectionWOOsingle;
    // $cs_woo_single = new CustomSectionWOOsingle;
    // $cs_woo_single->register();







/**
 * Latest updated products with shortcode
 * Short Code: [latest_updated_products limit="10"] // where limit is dynamic post loop count
 * @package wp-premium.org 
 */

add_action('init', function() {
    $latest_update_products = new Frontend\LatestUpdateProducts();
    $latest_update_products->register_shortcode();
});

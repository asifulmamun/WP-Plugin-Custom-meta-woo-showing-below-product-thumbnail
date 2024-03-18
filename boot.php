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


/* ==================== PLUGIN TASKS =================================================================================================== */
// Activation hook
function activate() {
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'activate');


// TMPA
require_once dirname( __FILE__ ) . '/Admin/Inc/TGM_Plugin_Activation.php';
use Admin\Inc\Tgmpa_wp_premium as TGMPA_wp;
$tg = new TGMPA_wp;
$tg->register();


// Plugin Updatable
// require_once PLUGIN_DIR . '/Admin/Inc/PluginUpdater.php'; // Include PluginUpdater class file
// use Admin\Inc\PluginUpdater as Pupdate;
// $plugin_updater = new Pupdate();


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
        $ul_product_below->new_el_styles = '<style>.el_below_product_thumb{flex-basis:100%;order:100;list-style:none;padding:.8rem 0 .8rem 0;display:flex;flex-direction:row;gap:0.8rem;}</style>';
        // $ul_product_below->new_el_innerHTML = '<b>The Demo</b>';


    // Demo URL
    use Admin\Custom_meta_btn_link_woo as Demo;
        $demo = new Demo;
        $demo->meta_name = 'Demo URL';
        $demo->field_desc = 'Enter The Demo URL';
        $demo->field_name = 'demo_url';
        // btn
        $demo->meta_name_btn_txt = 'Button Name';
        $demo->field_name_btn_submit = 'demo_btn';
        $demo->field_name_btn_txt = 'Sales Page';
        // Show
        use Frontend\Custom_btn as Demo_btn;
        $demo_btn = new Demo_btn;
        $demo_btn->field = $demo->field_name;
        $demo_btn->field_name_btn_submit = $demo->field_name_btn_txt;


    // Video - Dashboard
    use Admin\Custom_meta_btn_link_woo as Video;
        $Video = new Video;
        $Video->meta_name = 'Video Url';
        $Video->field_desc = 'Enter The Video URL';
        $Video->field_name = 'video_url';
        // btn
        $Video->meta_name_btn_txt = 'Button Name';
        $Video->field_name_btn_submit = 'video_btn';
        $Video->field_name_btn_txt = 'Watch Video';
        // show
        use Frontend\Custom_btn as Video_btn;
        $video_btn = new Video_btn;
        $video_btn->field = $Video->field_name;
        $video_btn->field_name_btn_submit = $Video->field_name_btn_txt;





/**
 * Add Mini Status YES/NO and Value
 * @package wp-premium.org
 */

    //  Auto update field
    use Admin\Custom_meta_yes_no_data_woo_woodmart as c_Field_auto_update;
        $custom_field_auto_update = new c_Field_auto_update;
        $custom_field_auto_update->register();
        $custom_field_auto_update->field_name = 'auto_update';
        $custom_field_auto_update->meta_name = 'Auto Update';

    // Mannual Update Field
    use Admin\Custom_meta_yes_no_data_woo_woodmart as c_Field_mannual_update;
        $custom_field_mannual_update = new c_Field_mannual_update;
        $custom_field_mannual_update->register();
        $custom_field_mannual_update->field_name = 'mannual_update';
        $custom_field_mannual_update->meta_name = 'Mannual Update';




/**
 * Text Field
 * @package wp-premium.org
 */

    // Version
    use Admin\Custom_meta_text_woo_woodmart as c_Version;
        $custom_post_version = new c_Version;
        $custom_post_version->register();
        $custom_post_version->field_name = 'product_version';
        $custom_post_version->meta_name = 'Version';


    // Virus Total Hash File
    use Admin\Custom_meta_text_woo_woodmart as Virus_total;
        $vt = new Virus_total;
        $vt->register();
        $vt->field_name = 'vt_data';
        $vt->meta_name = 'Virus Total Hash File';




/**
 * Date Field
 * @package wp-premium.org
 */

    // Update ON
    use Admin\Custom_meta_date_woo_woodmart as UpdateOn;
    $upo = new UpdateOn;
    $upo->register();
    $upo->field_name = 'custom_product_update_on';
    $upo->meta_name = 'Update On';



/**
 * Custom Section
 * @package wp-premium.org 
 */

    use Frontend\Customize_woo_single_page as CustomSectionWOOsingle;
    $cs_woo_single = new CustomSectionWOOsingle;
    $cs_woo_single->register();








    define('PLUGIN_UPDATE_URL', 'https://github.com/asifulmamun/WooCommerce-wp-premium.org/archive/refs/heads/main.zip');

    // Add update notice
    function display_plugin_update_notice() {
        $plugin_version = '2.0.0'; // Current version
        $latest_version = '2.1.0'; // Example: Latest version retrieved from an external source
    
        if ($latest_version > $plugin_version) {
            echo "<div class='notice notice-info is-dismissible'>
                    <p>There is a new version of wp-premium.org available! <a href='" . esc_url(admin_url('admin-post.php?action=update_plugin')) . "'>Update now</a>.</p>
                  </div>";
        }
    }
    add_action('admin_notices', 'display_plugin_update_notice');

    
    // Add action to handle plugin update
    add_action('admin_post_update_plugin', 'update_plugin');
    
    // Update plugin function
    function update_plugin() {
        $download_url = PLUGIN_UPDATE_URL;
        $temp_zip_file = tempnam(sys_get_temp_dir(), 'wp-premium-update');
        $zip_resource = fopen($temp_zip_file, "w");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $download_url);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);
        curl_setopt($ch, CURLOPT_FILE, $zip_resource);
        $downloaded = curl_exec($ch);
        if (!$downloaded) {
            echo "<div class='notice notice-error is-dismissible'><p>Failed to download plugin update.</p></div>";
            return;
        }
        curl_close($ch);
        fclose($zip_resource);
    
        $zip = new ZipArchive;
        if ($zip->open($temp_zip_file) === TRUE) {
            $zip->extractTo(PLUGIN_DIR.'./../');
            $zip->close();
            unlink($temp_zip_file);
            echo "<div class='notice notice-success is-dismissible'><p>Plugin updated successfully!</p></div>";
            echo "<div class='notice notice-success is-dismissible'><p><a href='/wp-admin/plugins.php'>Plugin Directory</a></p></div>";
            
            
        } else {
            echo "<div class='notice notice-error is-dismissible'><p>Failed to extract plugin update.</p></div>";
        }
    }





    // add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wp_premium_org_plugin_action_links');

// function wp_premium_org_plugin_action_links($links) {
//     $plugin_file = plugin_basename(__FILE__);

//     // Add update link
//     $update_link = '<a href="' . wp_nonce_url(admin_url('admin-post.php?action=update_plugin&plugin=' . $plugin_file), 'update-plugin_' . $plugin_file) . '">Update</a>';
//     array_unshift($links, $update_link);

//     return $links;
// }

// // Add action to handle plugin update
// add_action('admin_post_update_plugin', 'update_plugin');

// // Update plugin function
// function update_plugin() {
//     if (!current_user_can('manage_options')) {
//         wp_die('Unauthorized access');
//     }

//     $plugin_file = isset($_GET['plugin']) ? sanitize_text_field($_GET['plugin']) : '';
//     if (empty($plugin_file)) {
//         wp_die('Invalid plugin file');
//     }

//     $plugin_update_url = 'https://github.com/asifulmamun/WooCommerce-wp-premium.org/archive/refs/heads/main.zip';
//     $temp_zip_file = download_url($plugin_update_url);

//     if (is_wp_error($temp_zip_file)) {
//         wp_die('Failed to download plugin update');
//     }

//     $plugin_dir = plugin_dir_path(__FILE__);
//     $extracted = unzip_file($temp_zip_file, $plugin_dir);
//     unlink($temp_zip_file);

//     if (is_wp_error($extracted)) {
//         wp_die('Failed to extract plugin update');
//     }

//     // Update plugin version in the database
//     update_option('wp_premium_org_version', '2.1.0'); // Update with the latest version

//     // Optionally, perform any additional update tasks

//     // Redirect to plugin page after update
//     wp_redirect(admin_url('plugins.php'));
//     exit;
// }
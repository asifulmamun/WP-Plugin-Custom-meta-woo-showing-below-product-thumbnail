<?php
/*
Plugin Name: WP-Premium Custom
Description: Custom Features as per reequired
Version: 1.0
Author: AL MAMUN
Author URI: https://asifulmamun.info.bd
*/



include(plugin_dir_path(__FILE__) . 'admin/Custom_meta_woo.php');




// Meta Box
use Admin\Custom_meta_woo as woo_meta;
$woo_meta = new woo_meta;
$woo_meta->meta_name = 'Demo URL';
$woo_meta->field_desc = 'Enter The Demo URL';
$woo_meta->field_name = 'demo_url';





// // Add meta box
// add_action('add_meta_boxes', 'ecommercehints_product_data_metabox', 20);
// function ecommercehints_product_data_metabox()
// {
//     add_meta_box(
//         'demo_url_metabox',
//         'Demo URL',
//         'ecommercehints_render_demo_url_metabox',
//         'product',
//         'advanced',
//         'default'
//     );
// }

// // Render meta box content
// function ecommercehints_render_demo_url_metabox($post)
// {
//     error_log('Rendering Metabox');

//     $demo_url = get_post_meta($post->ID, 'demo_url', true);

//     echo '<div class="options_group">';
//     echo '<label for="demo_url">Demo URL</label>';
//     echo '<input type="text" id="demo_url" name="demo_url" value="' . esc_attr($demo_url) . '" />';
//     echo '<p class="description">The button link</p>';
//     echo '</div>';
// }


// // Save the data
// add_action('woocommerce_process_product_meta', 'ecommercehints_save_demo_url_meta');
// function ecommercehints_save_demo_url_meta($post_id)
// {
//     // Check if nonce is set
//     if (isset($_POST['demo_url']) && !empty($_POST['demo_url'])) {
//         if (current_user_can('edit_post', $post_id)) {
//             // Save the demo URL
//             $demo_url = isset($_POST['demo_url']) ? sanitize_text_field($_POST['demo_url']) : '';
//             update_post_meta($post_id, 'demo_url', $demo_url);
//         }
//     }
// }


















<?php
/*
Plugin Name: WP-Premium Custom
Description: Custom Features as per reequired
Version: 1.0
Author: AL MAMUN
Author URI: https://asifulmamun.info.bd
*/


     
/**
 * Snippet Name:     WooCommerce Custom Product Data Metabox For Custom Button Link
 */

// add_action('woocommerce_product_options_advanced', 'ecommercehints_product_data_metabox');
// function ecommercehints_product_data_metabox()
// {
//     echo '<div class="options_group">';
//     woocommerce_wp_text_input(array(
//         'id'                => 'demo_url',
//         'value'             => get_post_meta(get_the_ID(), 'demo_url', true),
//         'label'             => 'Demo URL',
//         'description'       => 'The button link'
//     ));
//     echo '</div>';
// }

// add_action('woocommerce_process_product_meta', 'ecommercehints_save_field_on_update', 10, 2);
// function ecommercehints_save_field_on_update($id, $post)
// {
//     update_post_meta($id, 'demo_url', $_POST['demo_url']);
// }


// add_action('woocommerce_product_options_advanced', 'ecommercehints_product_data_metabox', 11);
// function ecommercehints_product_data_metabox()
// {
//     global $post;

//     echo '<div class="options_group">';
//     woocommerce_wp_text_input(array(
//         'id'                => 'demo_url',
//         'value'             => get_post_meta($post->ID, 'demo_url', true),
//         'label'             => 'Demo URL',
//         'description'       => 'The button link'
//     ));
//     echo '</div>';
// }

// add_action('woocommerce_process_product_meta', 'ecommercehints_save_field_on_update');
// function ecommercehints_save_field_on_update($post_id)
// {
//     // Check if nonce is set
//     if (isset($_POST['_wpnonce']) && !empty($_POST['_wpnonce'])) {
//         // Verify nonce
//         if (wp_verify_nonce($_POST['_wpnonce'], 'save_demo_url')) {
//             // Check if the user has permission to edit
//             if (current_user_can('edit_post', $post_id)) {
//                 // Save the demo URL
//                 update_post_meta($post_id, 'demo_url', sanitize_text_field($_POST['demo_url']));
//             }
//         }
//     }
// }


// Add meta box
add_action('add_meta_boxes', 'ecommercehints_product_data_metabox', 20);
function ecommercehints_product_data_metabox()
{
    add_meta_box(
        'demo_url_metabox',
        'Demo URL',
        'ecommercehints_render_demo_url_metabox',
        'product',
        'advanced',
        'default'
    );
}

// Render meta box content
function ecommercehints_render_demo_url_metabox($post)
{
    error_log('Rendering Metabox');

    $demo_url = get_post_meta($post->ID, 'demo_url', true);

    echo '<div class="options_group">';
    echo '<label for="demo_url">Demo URL</label>';
    echo '<input type="text" id="demo_url" name="demo_url" value="' . esc_attr($demo_url) . '" />';
    echo '<p class="description">The button link</p>';
    echo '</div>';
}

// Save the data
// add_action('woocommerce_process_product_meta', 'ecommercehints_save_demo_url_meta');
// function ecommercehints_save_demo_url_meta($post_id)
// {

//     error_log('Saving Data');

//     // Check if nonce is set
//     if (isset($_POST['_wpnonce']) && !empty($_POST['_wpnonce'])) {
//         // Verify nonce
//         if (wp_verify_nonce($_POST['_wpnonce'], 'save_demo_url')) {
//             // Check if the user has permission to edit
//             if (current_user_can('edit_post', $post_id)) {
//                 // Save the demo URL
//                 $demo_url = isset($_POST['demo_url']) ? sanitize_text_field($_POST['demo_url']) : '';
//                 update_post_meta($post_id, 'demo_url', $demo_url);
//             }
//         }
//     }
// }




/* 
  * Data Showing
*/
function add_custom_js_css_for_single_product($product){
    global $product;
    $demo_url = $product->get_meta('demo_url');
    // $demo_url = '/https://asifulmamun.info.bd';
    


    // Loading the content
    if(!empty($demo_url)):?>
        <script>
            document.addEventListener('DOMContentLoaded', function (customID, contentHTML) {
                contentLoad('view_demo_btn_below_product_thumb', '<a class="view_demo_btn" href="<?php echo esc_url($demo_url); ?>" target="_blank">View Demo</a>', '100%');
            });
        </script>
        <style>.view_demo_btn{padding:.8rem 1rem;border-radius:var(--btn-accented-brd-radius);color:var(--btn-accented-color);box-shadow:var(--btn-accented-box-shadow);background-color:var(--btn-accented-bgcolor);text-transform: ar(--btn-accented-transform, var(--btn-transform));font-weight:var(--btn-accented-font-weight, var(--btn-font-weight));font-family:var(--btn-accented-font-family, var(--btn-font-family));font-style:var(--btn-accented-font-style, var(--btn-font-style));}</style>
    <?php endif;?>


    <script type="text/javascript">/*(view_demo_btn_below_product_thumb,HTML,'100%')*/function contentLoad(customID, contentHTML,flexBais){var galleryWithImages = document.querySelector('.woocommerce-product-gallery--with-images');if(galleryWithImages){var newElement=document.createElement('div');newElement.id=customID;newElement.style.flexBasis=flexBais;newElement.innerHTML=contentHTML;galleryWithImages.appendChild(newElement);}}</script><style>.woocommerce-product-gallery--with-images{flex-wrap:wrap !important;}.woocommerce-product-gallery--with-images>div:nth-child(1),.woocommerce-product-gallery--with-images>div:nth-child(1){flex-basis:fit-content;}</style>
<?php } // add_custom_js_css_for_single_product

add_action( 'wp_footer', 'add_custom_js_css_for_single_product', 10 );


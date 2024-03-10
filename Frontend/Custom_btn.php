<?php

namespace Frontend;

/* 
 * Data Showing
 */
class Custom_btn {

    public $field;
    public $field_name_btn_submit;

    public function __construct() {
        // Add the custom JS and CSS to the wp_footer action
        add_action('wp_footer', array($this, 'add_custom_js_css_for_single_product'));
    }

    public function add_custom_js_css_for_single_product() {
        global $product;


        // Ensure $product is a valid instance and has the get_meta method
        if (!is_a($product, 'WC_Product') || !method_exists($product, 'get_meta')) {
            return;
        }

        // Get the demo URL from product meta
        $url = $product->get_meta($this->field);
        $btn = $product->get_meta($this->field_name_btn_submit);
    

        $custom_content = '';

        if (!empty($url)):
            $custom_content .= '<a class="view_demo_btn" href="' . esc_url($url) . '" target="_blank">'. $btn .'</a>';
        endif;
        // if (!empty($video_url)):
        // $custom_content .= '&nbsp;&nbsp;<a class="view_demo_btn" href="' . esc_url($video_url) . '" target="_blank">Watch Video</a>';
        // endif;
        ?>
        <script>
            // Add the View Demo button dynamically after DOMContentLoaded
            document.addEventListener('DOMContentLoaded', function () {
                contentLoad('<?php echo $custom_content; ?>');
            });
        </script>
        <style>.view_demo_btn {padding:.8rem 1rem;border-radius:var(--btn-accented-brd-radius);color:var(--btn-accented-color);box-shadow:var(--btn-accented-box-shadow);background-color:var(--btn-accented-bgcolor);text-transform:var(--btn-accented-transform, var(--btn-transform));font-weight:var(--btn-accented-font-weight, var(--btn-font-weight));font-family:var(--btn-accented-font-family, var(--btn-font-family));font-style:var(--btn-accented-font-style, var(--btn-font-style));order:20;}</style>

        <script type="text/javascript">
            // Function to dynamically add content to the product gallery
            function contentLoad(contentHTML) {
                var galleryWithImages = document.querySelector('#el_below_product_thumb');
                if (galleryWithImages) {
                    var newElement = document.createElement('li');
                    // newElement.id = 'view_demo_btn_below_product_thumb';
                    // newElement.style.flexBasis = '100%';
                    newElement.innerHTML = contentHTML;
                    galleryWithImages.appendChild(newElement);



                    // var newElement = document.createElement('div');
                    // newElement.id = customID;
                    // newElement.style.flexBasis = flexBasis;
                    // if (flexOrder > 0) {
                    //     newElement.style.order = flexOrder;
                    // }
                    // newElement.innerHTML = contentHTML;
                    // galleryWithImages.appendChild(newElement);
                }
            }
        </script>
    <?php }
}
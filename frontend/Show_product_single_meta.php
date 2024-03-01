<?php


namespace Frontend;

/* 
  * Data Showing
*/
class CustomJSAndCSSForSingleProduct {
    public function __construct() {
        add_action('wp_footer', array($this, 'add_custom_js_css_for_single_product'));
    }

    public function add_custom_js_css_for_single_product() {
        global $product;

        $demo_url = $product->get_meta('demo_url');

        // Loading the content
        if (!empty($demo_url)) : ?>
            <script>
                document.addEventListener('DOMContentLoaded', function(customID, contentHTML) {
                    contentLoad('view_demo_btn_below_product_thumb', '<a class="view_demo_btn" href="<?php echo esc_url($demo_url); ?>" target="_blank">View Demo</a>', '100%', 4);
                });
            </script>
            <style>
                .view_demo_btn {
                    padding: .8rem 1rem;
                    border-radius: var(--btn-accented-brd-radius);
                    color: var(--btn-accented-color);
                    box-shadow: var(--btn-accented-box-shadow);
                    background-color: var(--btn-accented-bgcolor);
                    text-transform: ar(--btn-accented-transform, var(--btn-transform));
                    font-weight: var(--btn-accented-font-weight, var(--btn-font-weight));
                    font-family: var(--btn-accented-font-family, var(--btn-font-family));
                    font-style: var(--btn-accented-font-style, var(--btn-font-style));
                    order: 20;
                }
            </style>
        <?php endif; ?>

        <script type="text/javascript">
            /*(view_demo_btn_below_product_thumb,HTML,'100%')*/
            function contentLoad(customID, contentHTML, flexBasis, flexOrder) {
                var galleryWithImages = document.querySelector('.woocommerce-product-gallery--with-images');
                if (galleryWithImages) {
                    var newElement = document.createElement('div');
                    newElement.id = customID;
                    newElement.style.flexBasis = flexBasis;
                    if(flexOrder > 0){newElement.style.order = flexOrder;};
                    newElement.innerHTML = contentHTML;
                    galleryWithImages.appendChild(newElement);
                };
            };
        </script>
        <style>
            .woocommerce-product-gallery--with-images {
                display: flex !important;
                flex-wrap: wrap !important;
            }

            .woocommerce-product-gallery--with-images>div:nth-child(1),
            .woocommerce-product-gallery--with-images>div:nth-child(1) {
                flex-basis: fit-content;
            }
        </style>
    <?php }
}

<?php

namespace Frontend;


/* 
 * Data Showing
 */
class Add_element_below_product_thumb {

    public $query_select; // css - ID/Clas Name (Sinlge Class Onl/1st Classy) - (.myClass/#myMainID)
    public $new_el; // New Element name (div/span/ul etc)
    public $new_el_id; // id="myID" (myID)
    public $new_el_className; // class="myClass" - (myClass)
    public $new_el_styles; // styles - (<style>.mycClass{color:red;}</style>)
    public $new_el_innerHTML; // HTML - (<div>Hello</div>)
    

    public function register() {
        // Add the custom JS and CSS to the wp_footer action
        add_action('wp_footer', array($this, 'add_elements'));
    }

    
    // Render the HTML element to selected ID
    public function add_elements(){

        // Check if we are on a single product page
        if (is_product()) {
            global $post;

            // global $product;
            // Get the product object
            $product = wc_get_product($post->ID);

            // Make sure the product is valid
            if ($product) {
                $demo_url = $product->get_meta('demo_url');
                // $demo_btn = ($product->get_meta('demo_btn')) ? $product->get_meta('demo_btn') : 'View Demo';
                
                $video_url = $product->get_meta('video_url');
                // $video_btn = ($product->get_meta('video_btn')) ? $product->get_meta('video_btn') : 'Watch Video';
                    

                // if(!empty($demo_url)){

                //     $this->new_el_innerHTML .= '<li><a class="view_demo_btn" href="' . esc_url($demo_url) . '" target="_blank">'. $demo_btn .'</a></li>';
                // }
                // if(!empty($video_url)){
                    
                //     $this->new_el_innerHTML .= '<li><a class="view_demo_btn" href="' . esc_url($video_url) . '" target="_blank">'. $video_btn .'</a></li>';
                // }
                
                if(!empty($demo_url) || !empty($video_url)){

                    // btn CSS
                    $this->new_el_innerHTML .= '<style>.view_demo_btn {padding:.8rem 1rem;border-radius:var(--btn-accented-brd-radius);color:var(--btn-accented-color);box-shadow:var(--btn-accented-box-shadow);background-color:var(--btn-accented-bgcolor);text-transform:var(--btn-accented-transform, var(--btn-transform));font-weight:var(--btn-accented-font-weight, var(--btn-font-weight));font-family:var(--btn-accented-font-family, var(--btn-font-family));font-style:var(--btn-accented-font-style, var(--btn-font-style));order:20;}</style>';

                    // Main Element print with child elements
                    echo $this->new_el_styles;?><style>.woocommerce-product-gallery--with-images{display:flex!important;flex-wrap:wrap!important;}.woocommerce-product-gallery--with-images>div:nth-child(1),.woocommerce-product-gallery--with-images>div:nth-child(1){flex-basis: fit-content;}</style><script type="text/javascript">document.addEventListener('DOMContentLoaded',function(){var galleryWithImages = document.querySelector("<?php echo $this->query_select; ?>");if (galleryWithImages) {var newElement=document.createElement("<?php echo $this->new_el; ?>");newElement.id='<?php echo $this->new_el_id; ?>';newElement.className='<?php echo $this->new_el_className; ?>';newElement.innerHTML='<?php echo $this->new_el_innerHTML; ?>';galleryWithImages.appendChild(newElement);}});</script><?php
                }
            } /* if($product) */
        } /* is_product */
        
    } /* add_elemetns() */

} /* Class */
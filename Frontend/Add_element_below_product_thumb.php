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
        
        echo $this->new_el_styles;?><style>.woocommerce-product-gallery--with-images{display:flex!important;flex-wrap:wrap!important;}.woocommerce-product-gallery--with-images>div:nth-child(1),.woocommerce-product-gallery--with-images>div:nth-child(1){flex-basis: fit-content;}</style><script type="text/javascript">document.addEventListener('DOMContentLoaded',function(){var galleryWithImages = document.querySelector("<?php echo $this->query_select; ?>");if (galleryWithImages) {var newElement=document.createElement("<?php echo $this->new_el; ?>");newElement.id='<?php echo $this->new_el_id; ?>';newElement.className='<?php echo $this->new_el_className; ?>';newElement.innerHTML='<?php echo $this->new_el_innerHTML; ?>';galleryWithImages.appendChild(newElement);}});</script>

    <?php }

}
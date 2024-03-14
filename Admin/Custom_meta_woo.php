<?php


namespace Admin;

if (!class_exists('Custom_meta_woo')) {
    class Custom_meta_woo {

        public $meta_name = '';
        public $field_desc = '';
        public $field_name = '';

        public $meta_name_btn_txt = '';
        public $field_name_btn_txt = '';
        public $field_name_btn_submit = '';

        public function __construct() {
            add_action('add_meta_boxes', array($this, 'add_metabox'));
            add_action('woocommerce_process_product_meta', array($this, 'save_meta'));

            add_action( 'admin_head', array($this, 'add_custom_inline_css_for_product_page') );
        }

        // Add meta box
        public function add_metabox() {
            add_meta_box(
                "{$this->field_name}_metabox",
                "{$this->meta_name}",
                array($this, 'render_meta_box'),
                'product',
                'advanced',
                'default'
            );
        }

        // Render meta box content
        public function render_meta_box($post) {
            error_log('Rendering Metabox');

            $meta_value = get_post_meta($post->ID, $this->field_name, true); // field - main
            $meta_value_btn_txt = (get_post_meta($post->ID, $this->field_name_btn_txt, true)) ? get_post_meta($post->ID, $this->field_name_btn_txt, true) : $this->field_name_btn_txt;


            $render_form = '';

            $render_form .= '<p>'. $this->field_desc .'&nbsp;<a target="_blank" href="https://asifulmamun.info.bd" class="credit">@asifulmamun</a></p>';
            $render_form .= '<ul class="meta_wrap">';
                $render_form .= '<li>';
                        $render_form .= '<label for="'. $this->field_name .'">'. $this->meta_name .'</label>';
                        $render_form .= '<input type="text" id="'. $this->field_name .'" name="'. $this->field_name .'" value="' . esc_attr($meta_value) . '" />';
                    $render_form .= '</li>';
                    $render_form .= '<li>';
                        $render_form .= '<label for="'. $this->field_name_btn_submit .'">'. $this->meta_name_btn_txt .'</label>';
                        $render_form .= '<input type="text" id="'. $this->field_name_btn_submit .'" name="'. $this->field_name_btn_submit .'" value="' . esc_attr($meta_value_btn_txt) . '" />';
                    $render_form .= '</li>';
            $render_form .= '</ul>';

            echo $render_form;
        }

        // Save the data
        public function save_meta($post_id) {
            // if (isset($_POST[$this->field_name]) && !empty($_POST[$this->field_name])) {
                if (current_user_can('edit_post', $post_id)) {
                    // Save the value
                    $meta_value = isset($_POST[$this->field_name]) ? sanitize_text_field($_POST[$this->field_name]) : '';
                    $meta_value_btn_txt = isset($_POST[$this->field_name_btn_submit]) ? sanitize_text_field($_POST[$this->field_name_btn_submit]) : '';

                    update_post_meta($post_id, $this->field_name, $meta_value); // field 1
                    update_post_meta($post_id, $this->field_name_btn_txt, $meta_value_btn_txt); // field 2
                }
            // }
        }



            
        function add_custom_inline_css_for_product_page() {
            global $post_type;

            // Check if we are on the product edit or adding page
            if ( 'product' === $post_type ):?>
                <style>
                    .credit{font-size:8px;color:#dbd7d7;}
                    .credit:hover{color:blue !important;}

                    .meta_wrap li input{
                        margin-left:.3rem;
                    }

                </style>
            <?php endif;
        }



    } // Custom_meta_woo
}




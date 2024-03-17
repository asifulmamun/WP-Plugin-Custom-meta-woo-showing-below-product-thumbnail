<?php

    namespace Admin;

    if (!class_exists('Custom_meta_yes_no_data_woo_woodmart')) {
        class Custom_meta_yes_no_data_woo_woodmart {

            public $field_name;
            public $meta_name;


            public function register(){

                add_action('add_meta_boxes', array($this, 'add_metabox'));
                add_action('woocommerce_process_product_meta', array($this, 'save_meta'));

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

            $pattern = '/^(\d|[^0-9])/'; // Pattern to match the first digit/character
            preg_match($pattern, $meta_value, $matches); // Match the pattern against the meta_value

            if (isset($matches[0])) {
                
                // If a match is found, extract the first digit/character
                $first_digit_char = $matches[0];
                
                // Now, extract all characters after the first digit/character
                $remaining_chars = substr($meta_value, strlen($first_digit_char));
            } else{
                $first_digit_char = 0;
                $remaining_chars = '';

            }


            $render_form = '';

            $render_form .= '<ul class="meta_wrap">';
                $render_form .= '<li>';
                        if($first_digit_char == 1): ?>
                            <select name="<?php echo $this->field_name; ?>" id="<?php echo $this->field_name; ?>">
                                <option value="1">On</option>
                                <option value="0">Off</option>
                            </select>
                        <?php else: ?>
                            <select name="<?php echo $this->field_name; ?>" id="<?php echo $this->field_name; ?>">
                                <option value="0">Off</option>
                                <option value="1">On</option>
                            </select>
                        <?php endif;
                $render_form .= '</li>';
                $render_form .= '<li>';
                    $render_form .= '<label for="'. $this->field_name .'_extra">Extra</label>';
                    $render_form .= '<input type="text" id="'. $this->field_name .'_extra" name="'. $this->field_name .'_extra" value="'. $remaining_chars .'" />';
                $render_form .= '</li>';
            $render_form .= '</ul>';

            echo $render_form;
        }

        // Save the data
        public function save_meta($post_id) {
            // if (isset($_POST[$this->field_name]) && !empty($_POST[$this->field_name])) {
                if (current_user_can('edit_post', $post_id)) {
                    
                    // Save the value

                    if(isset($_POST[$this->field_name . '_extra'])){

                        $meta_value = isset($_POST[$this->field_name]) ? sanitize_text_field($_POST[$this->field_name] . $_POST[$this->field_name . '_extra']) : '';
                    } else{

                        $meta_value = isset($_POST[$this->field_name]) ? sanitize_text_field($_POST[$this->field_name]) : '';
                    }
                    
                    update_post_meta($post_id, $this->field_name, $meta_value); // field
                }
            // }
        }


        }
    }
    
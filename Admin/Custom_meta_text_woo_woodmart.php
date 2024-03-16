<?php

    namespace Admin;

    if (!class_exists('Custom_meta_text_woo_woodmart')) {
        class Custom_meta_text_woo_woodmart {

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

                $render_form = '';

                $render_form .= '<ul class="meta_wrap">';
                    $render_form .= '<li>';
                        $render_form .= '<label for="'. $this->field_name .'">'. $this->meta_name .'</label>';
                        $render_form .= '<input type="text" id="'. $this->field_name .'" name="'. $this->field_name .'" value="' . esc_attr($meta_value) . '" />';
                    $render_form .= '</li>';
                $render_form .= '</ul>';

                echo $render_form;
            }

            // Save the data
            public function save_meta($post_id) {
                    if (current_user_can('edit_post', $post_id)) {
                        
                        // Save the value
                        $meta_value = isset($_POST[$this->field_name]) ? sanitize_text_field($_POST[$this->field_name]) : '';
                     
                        update_post_meta($post_id, $this->field_name, $meta_value); // field
                    }
            }

        }
    }
    
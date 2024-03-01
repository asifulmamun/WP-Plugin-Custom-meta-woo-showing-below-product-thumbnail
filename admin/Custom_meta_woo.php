<?php


namespace Admin;


class Custom_meta_woo {

    public $meta_name = '';
    public $field_desc = '';
    public $field_name = '';

    public function __construct() {
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

        $meta_value = get_post_meta($post->ID, $this->field_name, true);

        echo '<div class="options_group">';
        echo '<label for="'. $this->field_name .'">'. $this->meta_name .'</label>';
        echo '<input type="text" id="'. $this->field_name .'" name="'. $this->field_name .'" value="' . esc_attr($meta_value) . '" />';
        echo '<p class="description">'. $this->field_desc .'</p>';
        echo '</div>';
    }

    // Save the data
    public function save_meta($post_id) {
        if (isset($_POST[$this->field_name]) && !empty($_POST[$this->field_name])) {
            if (current_user_can('edit_post', $post_id)) {
                // Save the value
                $meta_value = isset($_POST[$this->field_name]) ? sanitize_text_field($_POST[$this->field_name]) : '';
                update_post_meta($post_id, $this->field_name, $meta_value);
            }
        }
    }
}



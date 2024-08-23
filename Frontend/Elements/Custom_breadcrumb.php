<?php

namespace Frontend\Elements;

if(!class_exists('Custom_breadcrumb')){
    class Custom_breadcrumb {
        public static function custom_woocommerce_breadcrumb() {?>
        
            <!-- Breadcrumbs -->
            <div class="container-fluid custom_breadcrumbs">
                <div class="row">
                    <div class="text-center col-lg-12 col-12 col-md-12">
                        <?php
                            
                            // Product Title
                            // woocommerce_template_single_title();


                            /**
                             * @package woodmart
                             * Product Breadcrumbs by asifulmaun
                             */
                            
                            // Get the product category IDs
                            $product_cats_ids = get_the_terms( get_the_ID(), 'product_cat' );

                            // If product belongs to at least one category
                            if ( $product_cats_ids && ! is_wp_error( $product_cats_ids ) ) {
                                // Get the first category ID
                                $product_cat_id = reset($product_cats_ids)->term_id;
                                // Get the category object
                                $product_cat = get_term( $product_cat_id, 'product_cat' );
                                
                                // Output category name
                                $custom_breadcrumbs = '<a href="' . get_home_url() . '">Home</a>';
                                $custom_breadcrumbs .= ' / ';
                                $custom_breadcrumbs .= '<a href="' . get_term_link($product_cat) . '">' . $product_cat->name . '</a>';
                                echo "<h3>". get_the_title() ."</h3>" . $custom_breadcrumbs;

                            }
                        ?>
                    </div>
                </div><!-- /.row -->
            </div>
            <!-- / Breadcrumbs -->
            
            <style>
                /* Breadcrumbs */
                .custom_breadcrumbs {
                    background-image: url("https://wp-premium.org/wp-content/uploads/2021/09/digitals-newslatter-bg.jpg");
                    padding: 3rem .8rem;
                    margin-bottom: 1rem;
                }

                .product_title {
                    margin: 0 0 .7rem 0;
                }

                .custom_breadcrumbs,
                .custom_breadcrumbs h3,
                .custom_breadcrumbs a {
                    color: var(--custom_breadcrumb_text_color);
                }
            </style>
        
        <?php }
    }
}



<?php


// namespace Admin\Inc;

// use Admin\Inc\TGM_Plugin_Activation as TGMPA;



// if(!class_exists('Tgmpa_wp_premium')){
//     class Tgmpa_wp_premium{
        

//         public function register(){

//             add_action( 'tgmpa_register', array($this, 'tws__required_register_required_plugins') );
//         }



//         public function tws__required_register_required_plugins() {
//             $plugins = array(
        
//                 // This is an example of how to include a plugin from the WordPress Plugin Repository.
//                 array(
//                     'name'      => 'WooCommerce',
//                     'slug'      => 'woocommerce',
//                     'required'  => true,
//                 ),
        
//                 // Example
//                     // array(
//                     //     'name'      => 'Variation Swatches for WooCommerce',
//                     //     'slug'      => 'woo-product-variation-swatches',
//                     //     'required'  => false,
//                     // ),
            
//                     // array(
//                     //     'name'      => 'WP Image Zoom',
//                     //     'slug'      => 'wp-image-zoooom',
//                     //     'required'  => false,
//                     // ),
            
//                     // This is an example of how to include a plugin bundled with a theme.
//                     // array(
//                     // 	'name'               => 'TGM Example Plugin', // The plugin name.
//                     // 	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
//                     // 	'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
//                     // 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
//                     // 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
//                     // 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
//                     // 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
//                     // 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
//                     // 	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
//                     // ),
            
//                     // This is an example of how to include a plugin from an arbitrary external source in your theme.
//                     // array(
//                     // 	'name'         => 'TGM New Media Plugin', // The plugin name.
//                     // 	'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
//                     // 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
//                     // 	'required'     => true, // If false, the plugin is only 'recommended' instead of required.
//                     // 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
//                     // ),
            
//                     // This is an example of how to include a plugin from a GitHub repository in your theme.
//                     // This presumes that the plugin code is based in the root of the GitHub repository
//                     // and not in a subdirectory ('/src') of the repository.
//                     // array(
//                     // 	'name'      => 'Adminbar Link Comments to Pending',
//                     // 	'slug'      => 'adminbar-link-comments-to-pending',
//                     // 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
//                     // ),
            
//                     // This is an example of the use of 'is_callable' functionality. A user could - for instance -
//                     // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
//                     // 'wordpress-seo-premium'.
//                     // By setting 'is_callable' to either a function from that plugin or a class method
//                     // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
//                     // recognize the plugin as being installed.
//                     // array(
//                     // 	'name'        => 'WordPress SEO by Yoast',
//                     // 	'slug'        => 'wordpress-seo',
//                     // 	'is_callable' => 'wpseo_init',
//                     // ),
                
        
//             );
        

//             $config = array(
//                 'id'           => 'wp_premium_customize__required',    		// Unique ID for hashing notices for multiple instances of TGMPA.
//                 'default_path' => '',                     	// Default absolute path to bundled plugins.
//                 'menu'         => 'tgmpa-install-plugins', 	// Menu slug.
//                 'parent_slug'  => 'index.php',            	// Parent menu slug.
//                 'capability'   => 'edit_theme_options',    	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
//                 'has_notices'  => true,                    	// Show admin notices or not.
//                 'dismissable'  => true,                    	// If false, a user cannot dismiss the nag message.
//                 'dismiss_msg'  => '',                      	// If 'dismissable' is false, this message will be output at top of nag.
//                 'is_automatic' => false,                   	// Automatically activate plugins after installation or not.
//                 'message'      => '',                      	// Message to output right before the plugins table.
//             );
        
//             tgmpa($plugins, $config);
//         }


//     }
// }



add_action( 'tgmpa_register',  'tws__required_register_required_plugins');
function tws__required_register_required_plugins() {
    $plugins = array(

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'WooCommerce',
            'slug'      => 'woocommerce',
            'required'  => true,
        ),

        // Example
            // array(
            //     'name'      => 'Variation Swatches for WooCommerce',
            //     'slug'      => 'woo-product-variation-swatches',
            //     'required'  => false,
            // ),
    
            // array(
            //     'name'      => 'WP Image Zoom',
            //     'slug'      => 'wp-image-zoooom',
            //     'required'  => false,
            // ),
    
            // This is an example of how to include a plugin bundled with a theme.
            // array(
            // 	'name'               => 'TGM Example Plugin', // The plugin name.
            // 	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
            // 	'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
            // 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            // 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            // 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            // 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            // 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            // 	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
            // ),
    
            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            // array(
            // 	'name'         => 'TGM New Media Plugin', // The plugin name.
            // 	'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
            // 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
            // 	'required'     => true, // If false, the plugin is only 'recommended' instead of required.
            // 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
            // ),
    
            // This is an example of how to include a plugin from a GitHub repository in your theme.
            // This presumes that the plugin code is based in the root of the GitHub repository
            // and not in a subdirectory ('/src') of the repository.
            // array(
            // 	'name'      => 'Adminbar Link Comments to Pending',
            // 	'slug'      => 'adminbar-link-comments-to-pending',
            // 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
            // ),
    
            // This is an example of the use of 'is_callable' functionality. A user could - for instance -
            // have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
            // 'wordpress-seo-premium'.
            // By setting 'is_callable' to either a function from that plugin or a class method
            // `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
            // recognize the plugin as being installed.
            // array(
            // 	'name'        => 'WordPress SEO by Yoast',
            // 	'slug'        => 'wordpress-seo',
            // 	'is_callable' => 'wpseo_init',
            // ),
        

    );


    $config = array(
        'id'           => 'wp_premium_customize__required',    		// Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                     	// Default absolute path to bundled plugins.
        'menu'         => 'tgmpa_wp_pemium_org', 	// Menu slug.
        'parent_slug'  => 'index.php',            	// Parent menu slug.
        'capability'   => 'edit_theme_options',    	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,                    	// Show admin notices or not.
        'dismissable'  => true,                    	// If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      	// If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   	// Automatically activate plugins after installation or not.
        'message'      => '',                      	// Message to output right before the plugins table.
    );

    tgmpa($plugins, $config);
}


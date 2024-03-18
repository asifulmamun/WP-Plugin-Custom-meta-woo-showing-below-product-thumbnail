<?php




    // define('PLUGIN_UPDATE_URL', 'https://github.com/asifulmamun/WooCommerce-wp-premium.org/archive/refs/heads/main.zip');

    // // Add update notice
    // function display_plugin_update_notice() {
    //     $plugin_version = '2.0.0'; // Current version
    //     $latest_version = '2.1.0'; // Example: Latest version retrieved from an external source

    //     if ($latest_version > $plugin_version) {
    //         echo "<div class='notice notice-info is-dismissible'>
    //                 <p>There is a new version of wp-premium.org available! <a href='" . esc_url(admin_url('admin-post.php?action=update_plugin')) . "'>Update now</a>.</p></div>";
    //     }
    // }
    // add_action('admin_notices', 'display_plugin_update_notice');


    // // Add action to handle plugin update
    // add_action('admin_post_update_plugin', 'update_plugin');

    // // Update plugin function
    // function update_plugin() {
    //     $download_url = PLUGIN_UPDATE_URL;
    //     $temp_zip_file = tempnam(sys_get_temp_dir(), 'wp-premium-update');
    //     $zip_resource = fopen($temp_zip_file, "w");
    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $download_url);
    //     curl_setopt($ch, CURLOPT_FAILONERROR, true);
    //     curl_setopt($ch, CURLOPT_HEADER, 0);
    //     curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_TIMEOUT, 200);
    //     curl_setopt($ch, CURLOPT_FILE, $zip_resource);
    //     $downloaded = curl_exec($ch);
    //     if (!$downloaded) {
    //         echo "<div class='notice notice-error is-dismissible'><p>Failed to download plugin update.</p></div>";
    //         return;
    //     }
    //     curl_close($ch);
    //     fclose($zip_resource);

    //     $zip = new ZipArchive;
    //     if ($zip->open($temp_zip_file) === TRUE) {
    //         $zip->extractTo(PLUGIN_DIR.'./../');
    //         $zip->close();
    //         unlink($temp_zip_file);
    //         echo "<div class='notice notice-success is-dismissible'><p>Plugin updated successfully!</p></div>";
    //         echo "<div class='notice notice-success is-dismissible'><p><a href='/wp-admin/plugins.php'>Plugin Directory</a></p></div>";
            
            
    //     } else {
    //         echo "<div class='notice notice-error is-dismissible'><p>Failed to extract plugin update.</p></div>";
    //     }
    // }





    // add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wp_premium_org_plugin_action_links');

    // function wp_premium_org_plugin_action_links($links) {
    //     $plugin_file = plugin_basename(__FILE__);

    //     // Add update link
    //     $update_link = '<a href="' . wp_nonce_url(admin_url('admin-post.php?action=update_plugin&plugin=' . $plugin_file), 'update-plugin_' . $plugin_file) . '">Update</a>';
    //     array_unshift($links, $update_link);

    //     return $links;
    // }

    // // Add action to handle plugin update
    // add_action('admin_post_update_plugin', 'update_plugin');

    // // Update plugin function
    // function update_plugin() {
    //     if (!current_user_can('manage_options')) {
    //         wp_die('Unauthorized access');
    //     }

    //     $plugin_file = isset($_GET['plugin']) ? sanitize_text_field($_GET['plugin']) : '';
    //     if (empty($plugin_file)) {
    //         wp_die('Invalid plugin file');
    //     }

    //     $plugin_update_url = 'https://github.com/asifulmamun/WooCommerce-wp-premium.org/archive/refs/heads/main.zip';
    //     $temp_zip_file = download_url($plugin_update_url);

    //     if (is_wp_error($temp_zip_file)) {
    //         wp_die('Failed to download plugin update');
    //     }

    //     $plugin_dir = plugin_dir_path(__FILE__);
    //     $extracted = unzip_file($temp_zip_file, $plugin_dir);
    //     unlink($temp_zip_file);

    //     if (is_wp_error($extracted)) {
    //         wp_die('Failed to extract plugin update');
    //     }

    //     // Update plugin version in the database
    //     update_option('wp_premium_org_version', '2.1.0'); // Update with the latest version

    //     // Optionally, perform any additional update tasks

    //     // Redirect to plugin page after update
    //     wp_redirect(admin_url('plugins.php'));
    //     exit;
    // }
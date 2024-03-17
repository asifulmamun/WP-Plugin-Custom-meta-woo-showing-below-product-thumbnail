<?php
namespace Admin\Inc;

class PluginUpdater {
    private $update_url;

    public function __construct() {
        $this->update_url = "https://downloads.wordpress.org/plugin/elementor.3.20.1.zip";
        add_action('admin_menu', array($this, 'add_update_button_to_menu'));
        add_action('admin_notices', array($this, 'add_update_notice'));
    }

    public function add_update_button_to_menu() {
        // add_submenu_page(
        //     null, // parent slug
        //     'Update Plugin', // page title
        //     'Update Plugin', // menu title
        //     'manage_options', // capability
        //     'update-plugin', // menu slug
        //     array($this, 'show_update_plugin_page') // callback function
        // );
    }

    public function show_update_plugin_page() {
        ?>
        <div class="wrap">
            <h2>Update Plugin</h2>
            <form method="post">
                <p><input type="submit" name="update_plugin" class="button-primary" value="Update Now"></p>
            </form>
        </div>
        <?php
    }

    public function add_update_notice() {
        // $plugin_version = $this->get_local_version();
        // if ($plugin_version !== null && version_compare($plugin_version, $this->get_remote_version(), '<')) {
            echo '<div class="notice notice-info"><p>A new version of the plugin is available. <strong><a href="?page=update-plugin">Update Now</a></strong>.</p></div>';
        // }
    }

    public function update_plugin() {
        // $remote_version = $this->get_remote_version();
        // $local_version = $this->get_local_version();

        $remote_version = '5.6.0';
        $local_version = '2.1.2';

        if ($remote_version !== null && version_compare($remote_version, $local_version, '>')) {
            // Remote version is newer, proceed with the update
            $this->perform_update();
        } else {
            // No update available
            echo '<div class="updated"><p>Your plugin is already up to date!</p></div>';
        }
    }

    // private function get_remote_version() {
    //     // Manually set the remote version for testing
    //     return '4.0.0';
    // }

    // private function get_local_version() {
    //     // Manually set the local version for testing
    //     return '2.0.0';
    // }

    private function perform_update() {
        
        // Example update logic:
        $update_zip_url = $this->update_url;
        $update_zip_contents = file_get_contents($update_zip_url);
        if ($update_zip_contents !== false) {
            $zip_path = WP_CONTENT_DIR . '/update.zip';
            file_put_contents($zip_path, $update_zip_contents);
            
            $zip = new \ZipArchive;
            if ($zip->open($zip_path) === TRUE) {
                $zip->extractTo(WP_PLUGIN_DIR); // Extract to plugin directory
                $zip->close();
                unlink($zip_path); // Remove the ZIP file

                // Provide feedback to the user
                echo '<div class="updated"><p>Plugin updated successfully!</p></div>';
            } else {
                // Handle ZIP extraction error
                echo '<div class="error"><p>Failed to extract update ZIP file.</p></div>';
            }
        } else {
            // Handle update download error
            echo '<div class="error"><p>Failed to download plugin update.</p></div>';
        }
    }
}

// Handle update action when form is submitted
if (isset($_POST['update_plugin'])) {
    $plugin_updater->update_plugin();
}

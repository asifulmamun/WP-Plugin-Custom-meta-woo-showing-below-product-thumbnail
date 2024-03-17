<?php



namespace Admin\Inc;

// Check if the class PluginUpdater doesn't exist, then define it
if (!class_exists('PluginUpdater')) {
    class PluginUpdater {
        private $update_url;

        public function __construct($update_url) {
            $this->update_url = $update_url;
            add_action('admin_menu', array($this, 'add_update_button_to_menu'));
        }

        public function add_update_button_to_menu() {
            add_submenu_page(
                'options-general.php', // parent slug
                'Update Plugin', // page title
                'Update Plugin', // menu title
                'manage_options', // capability
                'update-plugin', // menu slug
                array($this, 'show_update_plugin_page') // callback function
            );
        }

        public function show_update_plugin_page() {
            ?>
            <div class="wrap">
                <h2>Update Plugin</h2>
                <form method="post">
                    <p><input type="submit" name="update_plugin" class="button-primary" value="Check for Updates"></p>
                </form>
            </div>
            <?php
        }

        public function update_plugin() {
            $remote_version = $this->get_remote_version();
            $local_version = $this->get_local_version();

            if ($remote_version && version_compare($remote_version, $local_version, '>')) {
                // Remote version is newer, proceed with the update
                $this->perform_update();
            } else {
                // No update available
                echo '<div class="updated"><p>Your plugin is already up to date!</p></div>';
            }
        }

        private function get_remote_version() {
            // Fetch remote version from the update URL
            $response = wp_remote_get($this->update_url);
            if (!is_wp_error($response) && $response['response']['code'] === 200) {
                $update_data = json_decode($response['body'], true);
                return isset($update_data['version']) ? $update_data['version'] : null;
            }
            return null;
        }

        private function get_local_version() {
            // Get the currently installed version of the plugin
            return get_option('my_plugin_version');
        }

        private function perform_update() {
            // Perform the update process
            // This function should be similar to your previous update_plugin() method
        }
    }
}

// Create an instance of PluginUpdater
$plugin_updater = new PluginUpdater('https://example.com/update-info.json');


// {
//     "version": "1.0.0",
//     "download_url": "https://example.com/plugin-update.zip",
//     "changelog": "Version 1.0.0 - Initial release"
//   }
  


// Handle update action when form is submitted
if (isset($_POST['update_plugin'])) {
    $plugin_updater->update_plugin();
}



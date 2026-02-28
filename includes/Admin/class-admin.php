<?php
/**
 * Admin area functionality for the plugin.
 *
 * @package WPALLSTARS\PluginStarterTemplate\Admin
 */

namespace WPALLSTARS\PluginStarterTemplate\Admin;

use WPALLSTARS\PluginStarterTemplate\Core;

/**
 * Admin class responsible for admin-specific hooks and functionality.
 */
class Admin {

    /**
     * Core plugin class instance.
     *
     * @var Core
     */
    private Core $core;

    /**
     * Constructor.
     *
     * @param Core $core Core instance.
     */
    public function __construct( Core $core ) {
        $this->core = $core;
        $this->initialize_hooks();
    }

    /**
     * Initializes WordPress hooks.
     */
    private function initialize_hooks(): void {
        \add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_assets' ) );
    }

    /**
     * Enqueues admin-specific scripts and styles.
     *
     * This method is hooked into 'admin_enqueue_scripts'. It checks if the current
     * screen is relevant to the plugin before enqueueing assets.
     *
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function enqueue_admin_assets(): void {

		// @phpcs:disable WordPress.Security.NonceVerification.Recommended
		// @phpcs:disable WordPress.Security.NonceVerification.Missing
        $page = isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '';

        if ( 'wp_plugin_starter_template_settings' !== $page ) {
            return;
        }
		// @phpcs:enable

        // Get the plugin version.
        $plugin_version = $this->core->get_plugin_version();

        // Enqueue styles.
        \wp_enqueue_style(
            'wpst-admin-styles',
            WP_PLUGIN_STARTER_TEMPLATE_URL . 'admin/css/admin-styles.css',
            array(), // Dependencies.
            $plugin_version // Version.
        );

        // Enqueue admin scripts.
        \wp_enqueue_script(
            'wpst-admin-script',
            WP_PLUGIN_STARTER_TEMPLATE_URL . 'admin/js/admin-scripts.js',
            array( 'jquery' ),
            $plugin_version, // Version.
            true
        );

        // Prepare data for localization.
        $data = array(
            'ajax_url' => \admin_url( 'admin-ajax.php' ),
            'nonce'    => \wp_create_nonce( 'wpst_admin_nonce' ),
        );

        // Localize the script with the data.
        \wp_localize_script(
            'wpst-admin-script',
            'wpst_admin_data',
            $data
        );
    }
}

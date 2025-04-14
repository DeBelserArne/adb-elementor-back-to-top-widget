<?php

/**
 * Plugin Name: Elementor Back To Top Widget
 * Description: An advanced, highly customizable back-to-top widget for Elementor page builder. Features include flexible positioning, custom icons, scroll percentage indicator, smooth scrolling, and extensive styling options. Perfect for improving user experience and navigation on long-scrolling pages while maintaining your site's design aesthetic.
 * Version: 1.0.0
 * Author: De Belser Arne
 * Author URI: #
 * Text Domain: adb-elementor-back-to-top
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('ADB_BTT_PATH', plugin_dir_path(__FILE__));
define('ADB_BTT_URL', plugin_dir_url(__FILE__));
define('ADB_BTT_VERSION', '1.0.0');

// Autoloader
require_once ADB_BTT_PATH . 'includes/Plugin.php';

// Initialize the plugin
\ADB\BackToTop\Plugin::get_instance();

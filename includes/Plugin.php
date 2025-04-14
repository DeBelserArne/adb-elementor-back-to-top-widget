<?php

namespace ADB\BackToTop;

final class Plugin
{
    private static $instance = null;

    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        add_action('plugins_loaded', [$this, 'init']);
    }

    public function init()
    {
        // Check if Elementor is installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor']);
            return;
        }

        // Add Elementor widget category
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_category']);

        // Register widget
        add_action('elementor/widgets/register', [$this, 'register_widget']);

        // Register styles and scripts
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    public function register_widget($widgets_manager)
    {
        // Include widget file only when needed
        require_once ADB_BTT_PATH . 'includes/widgets/BackToTopWidget.php';
        $widgets_manager->register(new Widgets\BackToTopWidget());
    }

    public function add_elementor_widget_category($elements_manager)
    {
        $elements_manager->add_category(
            'adb-widgets',
            [
                'title' => esc_html__('ADB Widgets', 'adb-elementor-back-to-top'),
                'icon' => 'fa fa-plug',
            ]
        );
    }

    public function enqueue_scripts()
    {
        wp_enqueue_style(
            'adb-back-to-top',
            ADB_BTT_URL . 'assets/css/back-to-top.css',
            [],
            ADB_BTT_VERSION
        );

        wp_enqueue_script(
            'adb-back-to-top',
            ADB_BTT_URL . 'assets/js/back-to-top.js',
            ['jquery'],
            ADB_BTT_VERSION,
            true
        );
    }

    public function admin_notice_missing_elementor()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            '%1$s <strong>%2$s</strong> %3$s <strong>%4$s</strong> %5$s',
            esc_html__('The', 'adb-elementor-back-to-top'),
            esc_html__('Elementor Back To Top Widget', 'adb-elementor-back-to-top'),
            esc_html__('plugin requires', 'adb-elementor-back-to-top'),
            esc_html__('Elementor', 'adb-elementor-back-to-top'),
            esc_html__('plugin to be installed and activated.', 'adb-elementor-back-to-top')
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }
}

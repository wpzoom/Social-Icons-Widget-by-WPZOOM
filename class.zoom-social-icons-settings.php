<?php
// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


class WPZOOM_Social_Icons_Settings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    public static $option_name = 'wpzoom-social-icons-widget-settings';
    public static $option_defaults = [
        'disable-widget' => false,
        'disable-block' => false,
    ];

    /**
     * Start up
     */
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_plugin_page'));
        add_action('admin_init', array($this, 'page_init'));
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Social Icons Widget Settings',
            'Social Icons Widget Settings',
            'manage_options',
            'wpzoom-social-icons-widget',
            array($this, 'create_admin_page')
        );
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = self::get_settings();
        ?>
        <div class="wrap">
            <h1><?php _e('Social Icons Widget Settings', 'zoom-social-icons-widget') ?></h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('wpzoom-social-icons-widget-settings-group');
                do_settings_sections('wpzoom-social-icons-widget-settings-group');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting(
            'wpzoom-social-icons-widget-settings-group', // Option group
            self::$option_name, // Option name
            [
                'sanitize_callback' => [$this, 'sanitize'],
                'default' => self::$option_defaults
            ]
        );

        add_settings_section(
            'wpzoom-social-icons-widget-settings-general', // ID
            null, // Title
            '__return_false', // Callback
            'wpzoom-social-icons-widget-settings-group' // Page
        );

        add_settings_field(
            'wpzoom-disable-social-icons-widget-checkbox', // ID
            __('Disable Social Icons Widget', 'zoom-social-icons-widget'), // Title
            array($this, 'field_disable_widget_checkbox'), // Callback
            'wpzoom-social-icons-widget-settings-group', // Page
            'wpzoom-social-icons-widget-settings-general' // Section
        );

        add_settings_field(
            'wpzoom-disable-social-icons-block-checkbox',
            __('Disable Social Icons Block', 'zoom-social-icons-widget'), // Title
            array($this, 'field_disable_block_checkbox'),
            'wpzoom-social-icons-widget-settings-group',
            'wpzoom-social-icons-widget-settings-general'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['disable-widget']))
            $new_input['disable-widget'] = wp_validate_boolean($input['disable-widget']);

        if (isset($input['disable-block']))
            $new_input['disable-block'] = wp_validate_boolean($input['disable-block']);


        return $new_input;
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function field_disable_widget_checkbox()
    {
        ?>
        <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-widget]" value="0"/>
        <input type="checkbox"
               id="disable-widget"
               name="wpzoom-social-icons-widget-settings[disable-widget]"
               value="1"
            <?php checked($this->options['disable-widget'], 1) ?>/>
        <?php
    }

    static public function get_settings()
    {
        return get_option(self::$option_name, self::$option_defaults);
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function field_disable_block_checkbox()
    {
        ?>
        <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-block]" value="0"/>
        <input type="checkbox"
               id="disable-block"
               name="wpzoom-social-icons-widget-settings[disable-block]"
               value="1"
            <?php checked($this->options['disable-block'], 1) ?>/>
        <?php
    }
}

if (is_admin())
    $my_settings_page = new WPZOOM_Social_Icons_Settings();
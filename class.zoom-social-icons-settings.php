<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPZOOM_Social_Icons_Settings {
	public static $option_name = 'wpzoom-social-icons-widget-settings';

	public static $menu_slug = 'wpzoom-social-icons-widget';
	public static $option_defaults = [
		'disable-widget'                         => false,
		'disable-block'                          => false,
		'disable-fonts-preloading'               => true,
		'disable-css-loading-for-academicons'    => true,
		'disable-css-loading-for-font-awesome-3' => true,
		'disable-css-loading-for-font-awesome-5' => true,
		'disable-css-loading-for-genericons'     => true,
		'disable-css-loading-for-dashicons'      => true,
		'disable-css-loading-for-socicons'       => true,
	];
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'add_plugin_page' ] );
		add_action( 'admin_init', [ $this, 'page_init' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ] );

	}

	function enqueue( $hook ) {
		if ( $this->get_hook_name() === $hook ) {
			wp_enqueue_style(
				'zoom-social-icons-settings-page',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/social-icons-settings-page.css',
				[],
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/social-icons-settings-page.css' )
			);

			wp_enqueue_script(
				'zoom-social-icons-settings-page',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-settings-page.js',
				[ 'jquery', 'jquery-ui-tabs' ],
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-settings-page.js' ),
				true
			);
		}
	}

	function get_hook_name() {
		return 'settings_page_' . self::$menu_slug;
	}


	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		// This page will be under "Settings"
		add_options_page(
			__( 'Social Icons Widget By WPZOOM Settings Page', 'zoom-social-icons-widget' ),
			__( 'Social Icons Widget', 'zoom-social-icons-widget' ),
			'manage_options',
			self::$menu_slug,
			[ $this, 'create_admin_page' ]
		);
	}

	public static function get_option_key($key){
	    $options = self::get_settings();

	    return array_key_exists($key, $options) ? $options[$key] :self::$option_defaults[$key];
    }

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property
		$this->options = self::get_settings();

		?>
        <div class="wrap zoom-social-icons-settings">
            <h1><?php _e( 'Social Icons Widget & Block by WPZOOM', 'zoom-social-icons-widget' ) ?></h1>

            <div class="wp-filter">
                <ul class="filter-links">
                    <li>
                        <a href="#font-styles"><?php _e( 'Icon Sets', 'zoom-social-icons-widget' ) ?></a>
                    </li>

                    <li>
                        <a href="#font-preload"><?php _e( 'Optimization', 'zoom-social-icons-widget' ) ?></a>
                    </li>
                    <li>
                        <a href="#general-tab"><?php _e( 'Misc.', 'zoom-social-icons-widget' ) ?></a>
                    </li>
                </ul>
            </div>

            <form method="post" action="options.php">

                <div id="font-styles" class="tab">
                    <?php settings_fields( 'wpzoom-social-icons-widget-settings-group-font-styles' );
                    do_settings_sections( 'wpzoom-social-icons-widget-settings-group-font-styles' ); ?>
                </div>

                <div id="font-preload" class="tab">
					<?php settings_fields( 'wpzoom-social-icons-widget-settings-group-font-preload' );
					do_settings_sections( 'wpzoom-social-icons-widget-settings-group-font-preload' ); ?>
                </div>

                <div id="general-tab" class="tab">
                    <?php settings_fields( 'wpzoom-social-icons-widget-settings-group-general' );
                    do_settings_sections( 'wpzoom-social-icons-widget-settings-group-general' ); ?>
                </div>

				<?php submit_button(); ?>
            </form>
        </div>
		<?php
	}

	static public function get_settings() {
		return get_option( self::$option_name, self::$option_defaults );
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		/**
		 * Register settings for General tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-general',
			self::$option_name, // Option name
			[
				'sanitize_callback' => [ $this, 'sanitize' ],
				'default'           => self::$option_defaults
			]
		);

		/**
		 * Register settings for Font Preload tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-font-preload',
			self::$option_name, // Option name
			[
				'sanitize_callback' => [ $this, 'sanitize' ],
				'default'           => self::$option_defaults
			]
		);

		/**
		 * Register settings for Font Styles tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-font-styles',
			self::$option_name, // Option name
			[
				'sanitize_callback' => [ $this, 'sanitize' ],
				'default'           => self::$option_defaults
			]
		);


		/**
		 * General tab section and settings.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-general',
			false, // Title
			'__return_false', // Callback
			'wpzoom-social-icons-widget-settings-group-general'
		);

		add_settings_field(
			'wpzoom-disable-social-icons-widget-checkbox',
			__( 'Social Icons Widget', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_widget_checkbox' ],
			'wpzoom-social-icons-widget-settings-group-general',
			'wpzoom-social-icons-widget-settings-general'
		);

		add_settings_field(
			'wpzoom-disable-social-icons-block-checkbox',
			__( 'Social Icons Block', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_block_checkbox' ],
			'wpzoom-social-icons-widget-settings-group-general',
			'wpzoom-social-icons-widget-settings-general'
		);

		/**
		 * Font Preloader tab section and settings.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-font-preload',
			false,
			'__return_false',
			'wpzoom-social-icons-widget-settings-group-font-preload'
		);

		add_settings_field(
			'wpzoom-enable-social-icons-fonts-preloader',
			__( 'Preload Fonts', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_fonts_preloading' ],
			'wpzoom-social-icons-widget-settings-group-font-preload',
			'wpzoom-social-icons-widget-settings-font-preload'
		);

		/**
		 * Font Styles tab section and settings.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-font-styles',
			false, // Title
			'__return_false',
			'wpzoom-social-icons-widget-settings-group-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-academicons',
			__( 'Academicons', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_academicons' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-3',
			__( 'Font Awesome 3', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_font_awesome_3' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-5',
			__( 'Font Awesome 5', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_font_awesome_5' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-genericons',
			__( 'Genericons', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_genericons' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-dashicons',
			__( 'Dashicons', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_dashicons' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-socicons',
			__( 'Socicons', 'zoom-social-icons-widget' ),
			[ $this, 'field_disable_css_loading_for_socicons' ],
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 *
	 * @return array
	 */
	public function sanitize( $input ) {
		$new_input = [];
		if ( isset( $input['disable-widget'] ) ) {
			$new_input['disable-widget'] = wp_validate_boolean( $input['disable-widget'] );
		}

		if ( isset( $input['disable-block'] ) ) {
			$new_input['disable-block'] = wp_validate_boolean( $input['disable-block'] );
		}

		if ( isset( $input['disable-fonts-preloading'] ) ) {
			$new_input['disable-fonts-preloading'] = wp_validate_boolean( $input['disable-fonts-preloading'] );
		}

		if ( isset( $input['disable-css-loading-for-academicons'] ) ) {
			$new_input['disable-css-loading-for-academicons'] = wp_validate_boolean( $input['disable-css-loading-for-academicons'] );
		}

		if ( isset( $input['disable-css-loading-for-font-awesome-3'] ) ) {
			$new_input['disable-css-loading-for-font-awesome-3'] = wp_validate_boolean( $input['disable-css-loading-for-font-awesome-3'] );
		}

		if ( isset( $input['disable-css-loading-for-font-awesome-5'] ) ) {
			$new_input['disable-css-loading-for-font-awesome-5'] = wp_validate_boolean( $input['disable-css-loading-for-font-awesome-5'] );
		}

		if ( isset( $input['disable-css-loading-for-genericons'] ) ) {
			$new_input['disable-css-loading-for-genericons'] = wp_validate_boolean( $input['disable-css-loading-for-genericons'] );
		}

		if ( isset( $input['disable-css-loading-for-dashicons'] ) ) {
			$new_input['disable-css-loading-for-dashicons'] = wp_validate_boolean( $input['disable-css-loading-for-dashicons'] );
		}

		if ( isset( $input['disable-css-loading-for-socicons'] ) ) {
			$new_input['disable-css-loading-for-socicons'] = wp_validate_boolean( $input['disable-css-loading-for-socicons'] );
		}

		return $new_input;
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_widget_checkbox() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-widget]" value="0"/>
            <input type="checkbox"
                   id="disable-widget"
                   name="wpzoom-social-icons-widget-settings[disable-widget]"
                   value="1"
				<?php checked( self::get_option_key('disable-widget'), 1 ) ?>/>
			<?php _e( 'Disable', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Social Icons Widget module functionality, by default enabled.', 'zoom-social-icons-widget' ) ?></span>

		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_block_checkbox() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-block]" value="0"/>
            <input type="checkbox"
                   id="disable-block"
                   name="wpzoom-social-icons-widget-settings[disable-block]"
                   value="1"
				<?php checked( self::get_option_key('disable-block'), 1 ) ?>/>
			<?php _e( 'Disable', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Social Icons Block module functionality, by default enabled.', 'zoom-social-icons-widget' ) ?></span>

		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_fonts_preloading() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-fonts-preloading]" value="0"/>
            <input type="checkbox"
                   id="disable-fonts-preloading"
                   name="wpzoom-social-icons-widget-settings[disable-fonts-preloading]"
                   value="1"
				<?php checked( self::get_option_key('disable-fonts-preloading'), 1 ) ?>/>
			<?php _e( 'Enable', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Preload web fonts using rel="preload" to remove any flash of unstyled text and improve the PageSpeed score.', 'zoom-social-icons-widget' ) ?></span>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_academicons() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-academicons]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-academicons"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-academicons]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-academicons'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_font_awesome_3() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-3]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-font-awesome-3"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-3]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-font-awesome-3'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Font Awesome 3 is loaded only in the Social Icons Widget', 'zoom-social-icons-widget' ) ?></span>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_font_awesome_5() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-5]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-font-awesome-5"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-5]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-font-awesome-5'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Font Awesome 5 is loaded only in the Social Icons Block.', 'zoom-social-icons-widget' ) ?></span>

		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_genericons() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-genericons]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-genericons"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-genericons]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-genericons'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_dashicons() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-dashicons]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-dashicons"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-dashicons]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-dashicons'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_css_loading_for_socicons() {
		?>
        <label>
            <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-socicons]"
                   value="0"/>
            <input type="checkbox"
                   id="disable-css-loading-for-socicons"
                   name="wpzoom-social-icons-widget-settings[disable-css-loading-for-socicons]"
                   value="1"
				<?php checked( self::get_option_key('disable-css-loading-for-socicons'), 1 ) ?>/>
			<?php _e( 'Enable this font', 'zoom-social-icons-widget' ) ?>
        </label>
        <span class="description"><?php _e( 'Main icon set', 'zoom-social-icons-widget' ) ?></span>

		<?php
	}
}

if ( is_admin() ) {
	$my_settings_page = new WPZOOM_Social_Icons_Settings();
}
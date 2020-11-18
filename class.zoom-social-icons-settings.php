<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPZOOM_Social_Icons_Settings {
	public static $option_name = 'wpzoom-social-icons-widget-settings';
	public static $option_defaults = [
		'disable-widget'                         => false,
		'disable-block'                          => false,
		'enable-fonts-preloading'                => false,
		'disable-css-loading-for-academicons'    => false,
		'disable-css-loading-for-font-awesome-3' => false,
		'disable-css-loading-for-font-awesome-5' => false,
		'disable-css-loading-for-genericons'     => false,
		'disable-css-loading-for-dashicons'      => false,
		'disable-css-loading-for-socicons'       => false,
	];
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	private $options;

	/**
	 * Start up
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		// This page will be under "Settings"
		add_options_page(
			'Social Icons Widget Settings',
			'Social Icons Widget Settings',
			'manage_options',
			'wpzoom-social-icons-widget',
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property
		$this->options = self::get_settings();
		?>
        <div class="wrap">
            <h1><?php _e( 'Social Icons Widget Settings', 'zoom-social-icons-widget' ) ?></h1>
            <form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields
				settings_fields( 'wpzoom-social-icons-widget-settings-group' );
				do_settings_sections( 'wpzoom-social-icons-widget-settings-group' );
				submit_button();
				?>
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
		register_setting(
			'wpzoom-social-icons-widget-settings-group', // Option group
			self::$option_name, // Option name
			[
				'sanitize_callback' => [ $this, 'sanitize' ],
				'default'           => self::$option_defaults
			]
		);


		add_settings_section(
			'wpzoom-social-icons-widget-settings-general', // ID
			__( 'General', 'zoom-social-icons-widget' ), // Title
			'__return_false', // Callback
			'wpzoom-social-icons-widget-settings-group' // Page
		);

		add_settings_section(
			'wpzoom-social-icons-widget-settings-font-preload', // ID
			__( 'Font Preload', 'zoom-social-icons-widget' ), // Title
			function () {
				echo wpautop( __( 'Preload web fonts using rel="preload" to remove any flash of unstyled text and improve loading speed.', 'zoom-social-icons-widget' ) );
			}, // Callback
			'wpzoom-social-icons-widget-settings-group' // Page
		);

		add_settings_section(
			'wpzoom-social-icons-widget-settings-css-enqueue', // ID
			__( 'CSS Font Styles Enqueue', 'zoom-social-icons-widget' ), // Title
			function () {
				echo wpautop( __( 'This options are for Advanced Users who want to disabled one of this fonts.', 'zoom-social-icons-widget' ) );
			},
			'wpzoom-social-icons-widget-settings-group' // Page
		);

		add_settings_field(
			'wpzoom-disable-social-icons-widget-checkbox', // ID
			__( 'Disable Social Icons Widget', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_widget_checkbox' ), // Callback
			'wpzoom-social-icons-widget-settings-group', // Page
			'wpzoom-social-icons-widget-settings-general' // Section
		);

		add_settings_field(
			'wpzoom-disable-social-icons-block-checkbox',
			__( 'Disable Social Icons Block', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_block_checkbox' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-general'
		);

		add_settings_field(
			'wpzoom-enable-social-icons-fonts-preloader',
			__( 'Enable preload web fonts to improve loading speed', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_enable_fonts_preloading' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-font-preload'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-academicons',
			__( 'Academicons CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_academicons' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-3',
			__( 'Font Awesome 3 CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_font_awesome_3' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-5',
			__( 'Font Awesome 5 CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_font_awesome_5' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-genericons',
			__( 'Genericons CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_genericons' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-dashicons',
			__( 'Dashicons CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_dashicons' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-socicons',
			__( 'Socicons CSS file', 'zoom-social-icons-widget' ), // Title
			array( $this, 'field_disable_css_loading_for_socicons' ),
			'wpzoom-social-icons-widget-settings-group',
			'wpzoom-social-icons-widget-settings-css-enqueue'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public function sanitize( $input ) {
		$new_input = array();
		if ( isset( $input['disable-widget'] ) ) {
			$new_input['disable-widget'] = wp_validate_boolean( $input['disable-widget'] );
		}

		if ( isset( $input['disable-block'] ) ) {
			$new_input['disable-block'] = wp_validate_boolean( $input['disable-block'] );
		}

		if ( isset( $input['enable-fonts-preloading'] ) ) {
			$new_input['enable-fonts-preloading'] = wp_validate_boolean( $input['enable-fonts-preloading'] );
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
        <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-widget]" value="0"/>
        <input type="checkbox"
               id="disable-widget"
               name="wpzoom-social-icons-widget-settings[disable-widget]"
               value="1"
			<?php checked( $this->options['disable-widget'], 1 ) ?>/>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_disable_block_checkbox() {
		?>
        <input type="hidden" name="wpzoom-social-icons-widget-settings[disable-block]" value="0"/>
        <input type="checkbox"
               id="disable-block"
               name="wpzoom-social-icons-widget-settings[disable-block]"
               value="1"
			<?php checked( $this->options['disable-block'], 1 ) ?>/>
		<?php
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function field_enable_fonts_preloading() {
		?>
        <input type="hidden" name="wpzoom-social-icons-widget-settings[enable-fonts-preloading]" value="0"/>
        <input type="checkbox"
               id="enable-fonts-preloading"
               name="wpzoom-social-icons-widget-settings[enable-fonts-preloading]"
               value="1"
			<?php checked( $this->options['enable-fonts-preloading'], 1 ) ?>/>
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
				<?php checked( $this->options['disable-css-loading-for-academicons'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
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
				<?php checked( $this->options['disable-css-loading-for-font-awesome-3'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
        </label>
        <p class="description"><?php _e( 'Font Awesome 3 is loaded only for Widgets.', 'zoom-social-icons-widget' ) ?></p>
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
				<?php checked( $this->options['disable-css-loading-for-font-awesome-5'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
        </label>
        <p class="description"><?php _e( 'Font Awesome 5 is loaded only for Blocks.', 'zoom-social-icons-widget' ) ?></p>

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
				<?php checked( $this->options['disable-css-loading-for-genericons'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
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
				<?php checked( $this->options['disable-css-loading-for-dashicons'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
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
				<?php checked( $this->options['disable-css-loading-for-socicons'], 1 ) ?>/>
			<?php _e( 'Disable file loading', 'zoom-social-icons-widget' ) ?>
        </label>
		<?php
	}
}

if ( is_admin() ) {
	$my_settings_page = new WPZOOM_Social_Icons_Settings();
}
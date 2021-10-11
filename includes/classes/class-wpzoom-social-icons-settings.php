<?php
/**
 * Class for Social Icons Settings
 *
 * @package WPZOOM_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class WPZOOM_Social_Icons_Settings
 */
class WPZOOM_Social_Icons_Settings {
	/**
	 * Settings option name
	 *
	 * @var string
	 */
	public static $option_name = 'wpzoom-social-icons-widget-settings';

	/**
	 * Admin menu slug
	 *
	 * @var string
	 */
	public static $menu_slug = 'wpzoom-social-icons-widget';

	/**
	 * Settings options defaults
	 *
	 * @var array
	 */
	public static $option_defaults = array(
		'disable-widget'                         => false,
		'disable-block'                          => false,
		'disable-fonts-preloading'               => true,
		'disable-css-loading-for-academicons'    => true,
		'disable-css-loading-for-font-awesome-3' => true,
		'disable-css-loading-for-font-awesome-5' => true,
		'disable-css-loading-for-genericons'     => true,
		'disable-css-loading-for-dashicons'      => true,
		'disable-css-loading-for-socicons'       => true,
		'categories-sync'                        => true,
		'custom-icon-set'                        => array(),
	);

	/**
	 * Holds the values to be used in the fields callbacks
	 *
	 * @var array
	 */
	private $options;

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'page_init' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Get settings for icons kits
	 *
	 * @return array
	 */
	public static function get_settings_for_icons_kits() {
		return array(
			'socicon'     => self::get_option_key( 'disable-css-loading-for-socicons' ),
			'dashicons'   => self::get_option_key( 'disable-css-loading-for-dashicons' ),
			'genericon'   => self::get_option_key( 'disable-css-loading-for-genericons' ),
			'academicons' => self::get_option_key( 'disable-css-loading-for-academicons' ),
			'fab'         => self::get_option_key( 'disable-css-loading-for-font-awesome-5' ),
			'far'         => self::get_option_key( 'disable-css-loading-for-font-awesome-5' ),
			'fas'         => self::get_option_key( 'disable-css-loading-for-font-awesome-5' ),
			'fa'          => self::get_option_key( 'disable-css-loading-for-font-awesome-3' ),
		);
	}

	/**
	 * Load scripts and styles
	 *
	 * @param string $hook The current admin page.
	 * @return void
	 */
	public function enqueue( $hook ) {
		if ( $this->get_hook_name() === $hook ) {
			wp_enqueue_style(
				'zoom-social-icons-settings-page',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/social-icons-settings-page.css',
				array(),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/social-icons-settings-page.css' )
			);

			wp_enqueue_script(
				'zoom-social-icons-settings-page',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-settings-page.js',
				array( 'jquery', 'jquery-ui-tabs' ),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-settings-page.js' ),
				true
			);
		}
	}

	/**
	 * Get hook name
	 *
	 * @return string
	 */
	public function get_hook_name() {
		return 'settings_page_' . self::$menu_slug;
	}

	/**
	 * Add page to admin menu
	 *
	 * @return void
	 */
	public function add_plugin_page() {
		// This page will be under "Settings".
		add_options_page(
			__( 'Social Icons Widget By WPZOOM Settings Page', 'social-icons-widget-by-wpzoom' ),
			__( 'Social Icons Widget', 'social-icons-widget-by-wpzoom' ),
			'manage_options',
			self::$menu_slug,
			array( $this, 'create_admin_page' )
		);
	}

	/**
	 * Get option name by passed parameter $key
	 *
	 * @param string $key The option key to receive options for.
	 * @return array|string
	 */
	public static function get_option_key( $key ) {
		$options = self::get_settings();

		return array_key_exists( $key, $options ) ? $options[ $key ] : self::$option_defaults[ $key ];
	}

	/**
	 * Options page callback
	 *
	 * @return void
	 */
	public function create_admin_page() {
		// Set class property.
		$this->options = self::get_settings();

		?>
<div class="wrap zoom-social-icons-settings">
	<h1><?php esc_html_e( 'Social Icons Widget & Block by WPZOOM', 'social-icons-widget-by-wpzoom' ); ?></h1>

	<div class="wpzoom-social-icons-settings-inner">
		<div class="wp-filter">
			<ul class="filter-links">
				<li>
					<a href="#font-styles"><?php esc_html_e( 'Icon Sets', 'social-icons-widget-by-wpzoom' ); ?></a>
				</li>

				<li>
					<a href="#font-preload"><?php esc_html_e( 'Optimization', 'social-icons-widget-by-wpzoom' ); ?></a>
				</li>
				<li>
					<a href="#general-tab"><?php esc_html_e( 'Misc.', 'social-icons-widget-by-wpzoom' ); ?></a>
				</li>

				<li>
					<a href="#upload-pro"><?php esc_html_e( 'Upload Icons', 'social-icons-widget-by-wpzoom' ); ?> <span>PRO</span></a>
				</li>
			</ul>
		</div>

		<form method="post" action="options.php">

			<div id="font-styles" class="tab">
				<?php
						settings_fields( 'wpzoom-social-icons-widget-settings-group-font-styles' );
						do_settings_sections( 'wpzoom-social-icons-widget-settings-group-font-styles' );
				?>
			</div>

			<div id="font-preload" class="tab">
				<?php
						settings_fields( 'wpzoom-social-icons-widget-settings-group-font-preload' );
						do_settings_sections( 'wpzoom-social-icons-widget-settings-group-font-preload' );
				?>
			</div>

			<div id="general-tab" class="tab">
				<?php
						settings_fields( 'wpzoom-social-icons-widget-settings-group-general' );
						do_settings_sections( 'wpzoom-social-icons-widget-settings-group-general' );
				?>
			</div>

			<div id="upload-pro" class="tab">
				<?php
						settings_fields( 'wpzoom-social-icons-widget-settings-upload-pro' );
						do_settings_sections( 'wpzoom-social-icons-widget-settings-upload-pro' );
				?>
			</div>

			<?php submit_button(); ?>
		</form>
	</div>
</div>

		<?php
	}

	/**
	 * Get all social icons settings
	 *
	 * @return array
	 */
	public static function get_settings() {
		return get_option( self::$option_name, self::$option_defaults );
	}

	/**
	 * Register settings, add sections and settings
	 *
	 * @return void
	 */
	public function page_init() {
		/**
		 * Register settings for General tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-general',
			self::$option_name, // Option name.
			array(
				'sanitize_callback' => array( $this, 'sanitize' ),
				'default'           => self::$option_defaults,
			)
		);

		/**
		 * Register settings for Upload Icons tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-upload-pro',
			self::$option_name, // Option name.
			array(
				'sanitize_callback' => array( $this, 'sanitize' ),
				'default'           => self::$option_defaults,
			)
		);

		/**
		 * Register settings for Font Preload tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-font-preload',
			self::$option_name, // Option name.
			array(
				'sanitize_callback' => array( $this, 'sanitize' ),
				'default'           => self::$option_defaults,
			)
		);

		/**
		 * Register settings for Font Styles tab.
		 */
		register_setting(
			'wpzoom-social-icons-widget-settings-group-font-styles',
			self::$option_name, // Option name.
			array(
				'sanitize_callback' => array( $this, 'sanitize' ),
				'default'           => self::$option_defaults,
			)
		);

		/**
		 * General tab section and settings.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-general',
			false, // Title.
			'__return_false', // Callback.
			'wpzoom-social-icons-widget-settings-group-general'
		);

		add_settings_field(
			'wpzoom-disable-social-icons-widget-checkbox',
			__( 'Social Icons Widget', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_widget_checkbox' ),
			'wpzoom-social-icons-widget-settings-group-general',
			'wpzoom-social-icons-widget-settings-general'
		);

		add_settings_field(
			'wpzoom-disable-social-icons-block-checkbox',
			__( 'Social Icons Block', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_block_checkbox' ),
			'wpzoom-social-icons-widget-settings-group-general',
			'wpzoom-social-icons-widget-settings-general'
		);

		/**
		 * Upload tab section.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-upload',
			false, // Title.
			'__return_false', // Callback.
			'wpzoom-social-icons-widget-settings-upload-pro'
		);

		add_settings_section(
			'wpzoom-instagram-widget-settings-user-info',
			false,
			array( $this, 'settings_field_user_details' ),
			'wpzoom-social-icons-widget-settings-upload-pro'
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
			__( 'Preload Fonts', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_fonts_preloading' ),
			'wpzoom-social-icons-widget-settings-group-font-preload',
			'wpzoom-social-icons-widget-settings-font-preload'
		);

		/**
		 * Font Styles tab section and settings.
		 */
		add_settings_section(
			'wpzoom-social-icons-widget-settings-font-styles',
			false, // Title.
			'__return_false',
			'wpzoom-social-icons-widget-settings-group-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-academicons',
			__( 'Academicons', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_academicons' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-3',
			__( 'Font Awesome 3', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_font_awesome_3' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-awesome-5',
			__( 'Font Awesome 5', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_font_awesome_5' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-genericons',
			__( 'Genericons', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_genericons' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-dashicons',
			__( 'Dashicons', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_dashicons' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-disable-css-loading-for-font-socicons',
			__( 'Socicons', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_disable_css_loading_for_socicons' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);

		add_settings_field(
			'wpzoom-categories-sync',
			__( 'Sync Icon Sets', 'social-icons-widget-by-wpzoom' ),
			array( $this, 'field_categories_sync' ),
			'wpzoom-social-icons-widget-settings-group-font-styles',
			'wpzoom-social-icons-widget-settings-font-styles'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys.
	 * @return array
	 */
	public function sanitize( $input ) {
		$new_input = array();
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

		if ( isset( $input['categories-sync'] ) ) {
			$new_input['categories-sync'] = wp_validate_boolean( $input['categories-sync'] );
		}

		return $new_input;
	}

	/**
	 * Render Disable Widget checkbox in settings page.
	 */
	public function field_disable_widget_checkbox() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-widget]" value="0" />
	<input type="checkbox" id="disable-widget" name="wpzoom-social-icons-widget-settings[disable-widget]" value="1" <?php checked( self::get_option_key( 'disable-widget' ), 1 ); ?> />
		<?php esc_html_e( 'Disable', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Social Icons Widget module functionality, by default enabled.', 'social-icons-widget-by-wpzoom' ); ?></span>

		<?php
	}

	/**
	 * Render Disable Block checkbox in settings page.
	 */
	public function field_disable_block_checkbox() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-block]" value="0" />
	<input type="checkbox" id="disable-block" name="wpzoom-social-icons-widget-settings[disable-block]" value="1" <?php checked( self::get_option_key( 'disable-block' ), 1 ); ?> />
		<?php esc_html_e( 'Disable', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Social Icons Block module functionality, by default enabled.', 'social-icons-widget-by-wpzoom' ); ?></span>

		<?php
	}

	/**
	 * Render Fonts Preloading checkbox in settings page.
	 */
	public function field_disable_fonts_preloading() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-fonts-preloading]" value="0" />
	<input type="checkbox" id="disable-fonts-preloading" name="wpzoom-social-icons-widget-settings[disable-fonts-preloading]" value="1" <?php checked( self::get_option_key( 'disable-fonts-preloading' ), 1 ); ?> />
		<?php esc_html_e( 'Enable', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Preload web fonts using rel="preload" to remove any flash of unstyled text and improve the PageSpeed score.', 'social-icons-widget-by-wpzoom' ); ?></span>
		<?php
	}

	/**
	 * Render Academicons CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_academicons() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-academicons]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-academicons" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-academicons]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-academicons' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
		<?php
	}

	/**
	 * Render Font Awesome 3 CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_font_awesome_3() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-3]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-font-awesome-3" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-3]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-font-awesome-3' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Font Awesome 3 is loaded only in the Social Icons Widget', 'social-icons-widget-by-wpzoom' ); ?></span>
		<?php
	}

	/**
	 * Render Font Awesome 5 CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_font_awesome_5() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-5]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-font-awesome-5" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-font-awesome-5]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-font-awesome-5' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Font Awesome 5 is loaded only in the Social Icons Block.', 'social-icons-widget-by-wpzoom' ); ?></span>
		<?php
	}

	/**
	 * Render Genericons CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_genericons() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-genericons]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-genericons" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-genericons]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-genericons' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
		<?php
	}

	/**
	 * Render Dashicons CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_dashicons() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-dashicons]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-dashicons" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-dashicons]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-dashicons' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
		<?php
	}

	/**
	 * Render Socicons CSS Loading checkbox in settings page.
	 */
	public function field_disable_css_loading_for_socicons() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-socicons]" value="0" />
	<input type="checkbox" id="disable-css-loading-for-socicons" name="wpzoom-social-icons-widget-settings[disable-css-loading-for-socicons]" value="1" <?php checked( self::get_option_key( 'disable-css-loading-for-socicons' ), 1 ); ?> />
		<?php esc_html_e( 'Enable this font', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Main icon set', 'social-icons-widget-by-wpzoom' ); ?></span>
		<?php
	}

	/**
	 * Render categories sync checkbox in settings page.
	 */
	public function field_categories_sync() {
		?>
<label>
	<input type="hidden" name="wpzoom-social-icons-widget-settings[categories-sync]" value="0" />
	<input type="checkbox" id="categories-sync" name="wpzoom-social-icons-widget-settings[categories-sync]" value="1" <?php checked( self::get_option_key( 'categories-sync' ), 1 ); ?> />
		<?php esc_html_e( 'Enable sync', 'social-icons-widget-by-wpzoom' ); ?>
</label>
<span class="description"><?php esc_html_e( 'Sync Icon sets with Block and Widget Settings from popup.', 'social-icons-widget-by-wpzoom' ); ?></span>
		<?php
	}

	/**
	 * Display promo tab of Social Icons PRO
	 *
	 * @return void
	 */
	public function settings_field_user_details() {
		?>

<div class="wpz-pro-plugin-wrap">

	<div class="wpz-pro-btn-wrap">
		<a class="wpz-social-pro-btn" href="https://www.wpzoom.com/plugins/social-widget/?utm_source=wpadmin&utm_medium=website&utm_campaign=social_free_promotab" target="_blank"><?php esc_html_e( 'Get Social Icons Widget PRO', 'social-icons-widget-by-wpzoom' ); ?></a>
	</div>


	<table class="form-table wpz-section_disabled_pro" role="presentation">
		<tbody>
			<tr>
				<th scope="row"><?php esc_html_e( 'Upload Icons', 'social-icons-widget-by-wpzoom' ); ?></th>
				<td>
					<p style="margin-bottom: 16px;"><?php esc_html_e( 'Upload your icons here and create a new Custom Icons set', 'social-icons-widget-by-wpzoom' ); ?></p>

					<div class="zoom-instagram-user-avatar-media-uploader" data-type="image" data-button-add-text="<?php esc_html_e( 'Upload an SVG icon', 'social-icons-widget-by-wpzoom' ); ?>" data-button-replace-text="Replace SVG icon">
						<a href="#" class="button add-media" title="<?php esc_html_e( 'Upload SVG icon', 'social-icons-widget-by-wpzoom' ); ?>"><?php esc_html_e( 'Upload an SVG icon', 'social-icons-widget-by-wpzoom' ); ?></a>

						<div class="file-wrapper custom-icon__list" style="display: none;"></div>

						<button type="button" class="remove-avatar button-link delete-attachment" style="display: none;"><?php esc_html_e( 'Remove Icon', 'social-icons-widget-by-wpzoom' ); ?></button>

						<input class="attachment-url-input" type="hidden" name="wpzoom-custom-icon[attachment-url]">
						<input class="attachment-title-input" type="hidden" name="wpzoom-custom-icon[attachment-title]">
					</div>
					<div class="add-to-custom-iconset" id="add-to-custom-iconset">
						<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( 'Add icon to set', 'social-icons-widget-by-wpzoom' ); ?>"></p>
					</div>

					<div class="modal-icons-wrapper" style="margin-top: 1em;">

						<div class="" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
							<div style=" width: 50%; max-width: 300px; display: flex; flex-direction: row; align-items: center;">
								<div class="custom-icon__list" style="margin-right: 2em;">

									<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
										<title>Yoast</title>
										<path d="M15.864 0L14.55 3.652H5.422A3.592 3.592 0 0 0 1.84 7.233v9.529a3.592 3.592 0 0 0 3.582 3.581h1.495a4.9 4.9 0 0 1-.18.029l-.34.047V24h.391c2.76 0 4.442-1.385 5.706-3.657h9.666V7.233a3.593 3.593 0 0 0-3.253-3.565L20.275 0zm.556.778h2.738l-6.055 16.22c-1.55 4.335-3.186 6.064-5.924 6.21v-2.12c1.767-.354 2.418-1.461 2.785-2.408a3.902 3.902 0 0 0 0-2.828L6.43 6.772h2.488l2.512 7.86z"></path>
									</svg>
								</div>
								<label>
									<input type="checkbox" name="remove[]" value="0">
									<?php esc_html_e( 'Remove', 'social-icons-widget-by-wpzoom' ); ?>
								</label>
							</div>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="update"></p>
						</div>
						<div class="" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
							<div style=" width: 50%; max-width: 300px; display: flex; flex-direction: row; align-items: center;">
								<div class="custom-icon__list" style="margin-right: 2em;">

									<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
										<title>Bitcoin</title>
										<path d="M23.638 14.904c-1.602 6.43-8.113 10.34-14.542 8.736C2.67 22.05-1.244 15.525.362 9.105 1.962 2.67 8.475-1.243 14.9.358c6.43 1.605 10.342 8.115 8.738 14.548v-.002zm-6.35-4.613c.24-1.59-.974-2.45-2.64-3.03l.54-2.153-1.315-.33-.525 2.107c-.345-.087-.705-.167-1.064-.25l.526-2.127-1.32-.33-.54 2.165c-.285-.067-.565-.132-.84-.2l-1.815-.45-.35 1.407s.975.225.955.236c.535.136.63.486.615.766l-1.477 5.92c-.075.166-.24.406-.614.314.015.02-.96-.24-.96-.24l-.66 1.51 1.71.426.93.242-.54 2.19 1.32.327.54-2.17c.36.1.705.19 1.05.273l-.51 2.154 1.32.33.545-2.19c2.24.427 3.93.257 4.64-1.774.57-1.637-.03-2.58-1.217-3.196.854-.193 1.5-.76 1.68-1.93h.01zm-3.01 4.22c-.404 1.64-3.157.75-4.05.53l.72-2.9c.896.23 3.757.67 3.33 2.37zm.41-4.24c-.37 1.49-2.662.735-3.405.55l.654-2.64c.744.18 3.137.524 2.75 2.084v.006z"></path>
									</svg>
								</div>
								<label>
									<input type="checkbox" name="remove[]" value="1">
									<?php esc_html_e( 'Remove', 'social-icons-widget-by-wpzoom' ); ?>
								</label>
							</div>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="update"></p>
						</div>
						<div class="" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
							<div style=" width: 50%; max-width: 300px; display: flex; flex-direction: row; align-items: center;">
								<div class="custom-icon__list" style="margin-right: 2em;">

									<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
										<title>Tesla</title>
										<path d="M12 5.362l2.475-3.026s4.245.09 8.471 2.054c-1.082 1.636-3.231 2.438-3.231 2.438-.146-1.439-1.154-1.79-4.354-1.79L12 24 8.619 5.034c-3.18 0-4.188.354-4.335 1.792 0 0-2.146-.795-3.229-2.43C5.28 2.431 9.525 2.34 9.525 2.34L12 5.362l-.004.002H12v-.002zm0-3.899c3.415-.03 7.326.528 11.328 2.28.535-.968.672-1.395.672-1.395C19.625.612 15.528.015 12 0 8.472.015 4.375.61 0 2.349c0 0 .195.525.672 1.396C4.674 1.989 8.585 1.435 12 1.46v.003z"></path>
									</svg>
								</div>
								<label>
									<input type="checkbox" name="remove[]" value="2">
									<?php esc_html_e( 'Remove', 'social-icons-widget-by-wpzoom' ); ?>
								</label>
							</div>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="update"></p>
						</div>
						<div class="" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
							<div style=" width: 50%; max-width: 300px; display: flex; flex-direction: row; align-items: center;">
								<div class="custom-icon__list" style="margin-right: 2em;">

									<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
										<title>foodpanda</title>
										<path d="M4.224 0a3.14 3.14 0 00-3.14 3.127 3.1 3.1 0 001.079 2.36 11.811 11.811 0 00-2.037 6.639C.126 18.68 5.458 24 12 24c6.542 0 11.874-5.32 11.874-11.874a11.69 11.69 0 00-2.025-6.614 3.136 3.136 0 001.09-2.373A3.132 3.132 0 0019.8.012a3.118 3.118 0 00-2.636 1.438A11.792 11.792 0 0012.012.264c-1.845 0-3.595.419-5.152 1.174A3.133 3.133 0 004.224 0zM12 1.198c1.713 0 3.331.396 4.78 1.102a10.995 10.995 0 014.29 3.715 10.89 10.89 0 011.882 6.135c.011 6.039-4.901 10.951-10.94 10.951-6.04 0-10.951-4.912-10.951-10.951 0-2.277.694-4.386 1.88-6.135A11.08 11.08 0 017.232 2.3 10.773 10.773 0 0112 1.198zM7.367 6.345c-.853.012-1.743.292-2.28.653-1.031.682-2.29 2.156-2.085 4.181.191 2.025 1.785 3.283 2.612 3.283.826 0 1.234-.42 1.485-1.45.252-1.018 1.115-2.192 2.217-3.45s-.024-2.469-.024-2.469c-.393-.513-1.052-.727-1.755-.747a3.952 3.952 0 00-.17-.001zm9.233.007l-.17.001c-.702.02-1.358.233-1.746.752 0 0-1.126 1.21-.024 2.469 1.114 1.258 1.965 2.432 2.217 3.45.251 1.019.659 1.438 1.485 1.45.827 0 2.409-1.258 2.612-3.283.204-2.025-1.054-3.51-2.084-4.182-.544-.36-1.437-.643-2.29-.657zm-8.962 2c.348 0 .624.275.624.623-.012.335-.288.623-.624.623a.619.619 0 01-.623-.623c0-.348.276-.624.623-.624zm8.891 0c.348 0 .623.275.623.623-.012.335-.287.623-.623.623a.619.619 0 01-.623-.623c0-.348.288-.624.623-.624zm-4.541 4.025c-.527 0-2.06.096-2.06.587 0 .887 1.88 1.522 2.06 1.474.18.048 2.06-.587 2.06-1.474 0-.49-1.52-.587-2.06-.587zM9.076 15.17c0 1.414 1.294 2.564 2.912 2.564 1.618 0 2.924-1.15 2.924-2.564z"></path>
									</svg>
								</div>
								<label>
									<input type="checkbox" name="remove[]" value="3">
									<?php esc_html_e( 'Remove', 'social-icons-widget-by-wpzoom' ); ?>
								</label>
							</div>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="update"></p>
						</div>
						<div class="" style="display: flex; flex-direction: row; align-items: center; justify-content: space-between;">
							<div style=" width: 50%; max-width: 300px; display: flex; flex-direction: row; align-items: center;">
								<div class="custom-icon__list" style="margin-right: 2em;">

									<svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 24 24">
										<title>WP Rocket</title>
										<path d="M3.723.666c-.08-.276.08-.47.356-.47h2.283c.16 0 .31.137.356.274L8.393 7.07h.08L11.491.218A.374.374 0 0111.824 0h.356c.172 0 .287.092.333.218l3.018 6.85h.08L17.286.47a.397.397 0 01.356-.275h2.284c.275 0 .424.195.355.47l-3.683 13.082a.369.369 0 01-.356.275h-.31a.38.38 0 01-.333-.218l-3.568-7.963h-.058l-3.545 7.963a.403.403 0 01-.333.218h-.31a.379.379 0 01-.356-.275L3.723.666m8.308 7.917l-2.594 5.818a1.663 1.663 0 01-.344.448v.004a1.466 1.466 0 01-.688.34l1.4 8.687c.091.16.263.16.367 0l1.79-2.72 1.64 2.708c.104.16.265.16.368 0l1.584-8.698a1.5 1.5 0 01-.832-.618l-.02-.03a1.405 1.405 0 01-.066-.12l-.609-1.366h-.003Z"></path>
									</svg>
								</div>
								<label>
									<input type="checkbox" name="remove[]" value="4">
									<?php esc_html_e( 'Remove', 'social-icons-widget-by-wpzoom' ); ?>
								</label>
							</div>
							<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="update"></p>
						</div>

					</div>
				</td>
			</tr>
		</tbody>
	</table>


</div>

</p>
		<?php
	}


}

if ( is_admin() ) {
	$wpzoom_social_icons_settings = new WPZOOM_Social_Icons_Settings();
}

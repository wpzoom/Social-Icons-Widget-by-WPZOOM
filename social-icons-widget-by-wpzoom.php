<?php
/**
 * Plugin Name:         Social Icons Widget & Block by WPZOOM
 * Plugin URI:          https://www.wpzoom.com/plugins/social-widget/
 * Description:         Social Icons Widget & Block to display links to social media networks websites. Supports most of the known social networks and includes more than 400 icons. Sort icons by Drag & Drop and change their color easily.
 * Version:             4.2.13
 * Author:              WPZOOM
 * Author URI:          https://www.wpzoom.com/
 * Text Domain:         social-icons-widget-by-wpzoom
 * License:             GNU General Public License v2.0 or later
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
 * Requires at least:   5.2
 * Tested up to:        6.2
 *
 * @package WPZOOM_Social_Icons
 */

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_VERSION' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_VERSION', '4.2.13' );
}

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_URL' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_PATH' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_BASE' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_BASE', plugin_basename( __FILE__ ) );
}

require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-wpzoom-social-icons-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/zoom-helper.php';

$wpzoom_social_icons_settings = WPZOOM_Social_Icons_Settings::get_settings();

if ( empty( $wpzoom_social_icons_settings['disable-block'] ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'block/src/init.php';
}

if ( empty( $wpzoom_social_icons_settings['disable-widget'] ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'includes/classes/class-zoom-social-icons-widget.php';

	/**
	 * Register the widget
	 */
	add_action(
		'widgets_init',
		function () {
			register_widget( 'Zoom_Social_Icons_Widget' );
		}
	);
}

/**
 * Load icon fonts libraries
 *
 * @return void
 */
function zoom_social_icons_enqueue_fonts() {
	// phpcs:disable WordPress.WP.EnqueuedResourceParameters.MissingVersion
	if ( wp_style_is( 'wpzoom-social-icons-academicons' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-academicons-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/academicons.woff2?v=1.9.2', array(), null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-font-awesome-3' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-3-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fontawesome-webfont.woff2?v=4.7.0', array(), null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-font-awesome-5' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-brands-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-brands-400.woff2', array(), null );

		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-regular-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-regular-400.woff2', array(), null );

		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.woff2', array(), null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-genericons' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-genericons-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/Genericons.woff', array(), null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-socicon' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-socicon-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/socicon.woff2?v=' . WPZOOM_SOCIAL_ICONS_PLUGIN_VERSION, array(), null );
	}
}

/**
 * Add preload to rel attribute
 *
 * @param string $tag The link tag for the enqueued style.
 * @param string $handle The style's registered handle.
 * @param string $href The stylesheet's source URL.
 *
 * @return string $tag The HTML link tag of an enqueued style.
 */
function zoom_social_icons_add_preload_to_rel_attribute( $tag, $handle, $href ) {
	$style_handlers = apply_filters(
		'wpzoom-social-icons-fonts-preload-filter',
		array(
			'wpzoom-social-icons-font-academicons-woff2',
			'wpzoom-social-icons-font-fontawesome-3-woff2',
			'wpzoom-social-icons-font-genericons-woff',
			'wpzoom-social-icons-font-socicon-woff2',
			'wpzoom-social-icons-font-fontawesome-5-brands-woff2',
			'wpzoom-social-icons-font-fontawesome-5-regular-woff2',
			'wpzoom-social-icons-font-fontawesome-5-solid-woff2',
		)
	);

	if ( in_array( $handle, $style_handlers ) ) {
		$file_type = strtolower( pathinfo( basename( parse_url( $href, PHP_URL_PATH ) ), PATHINFO_EXTENSION ) );
		$file_type = ! empty( $file_type ) ? ( "type='font/{$file_type}'" ) : '';
		$tag       = preg_replace( array( "/='stylesheet'/", "/media='all'/", "/type=['\"]text\/(css)['\"]/" ), array( "='preload' as='font' ", $file_type . ' crossorigin', '' ), $tag );
	}

	return $tag;
}

/**
 * Load textdomain
 *
 * @return void
 */
function zoom_social_icons_widget_load_textdomain() {
	load_plugin_textdomain( 'social-icons-widget-by-wpzoom', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

/**
 * Hide old widget
 *
 * @since 4.2.0
 * @param array $widget_types Array of widgets types to hide from legacy widget block.
 * @return array The parsed widget types
 */
function zoom_social_icons_widget_hide( $widget_types ) {
	$widget_types[] = 'zoom-social-icons-widget';
	return $widget_types;
}
add_filter( 'widget_types_to_hide_from_legacy_widget_block', 'zoom_social_icons_widget_hide' );

/**
 * Generate select values for block and widget options that are synced with fonts loading values from Settings Page.
 *
 * @param string $type Category type [widget, block].
 *
 * @return array
 */
function zoom_social_icons_kits_categories_list( $type = 'widget' ) {
	$icons_kits = WPZOOM_Social_Icons_Settings::get_settings_for_icons_kits();

	$categories_list = array(
		array(
			'value' => 'socicon',
			'label' => __( 'Socicons', 'social-icons-widget-by-wpzoom' ),
		),
		array(
			'value' => 'dashicons',
			'label' => __( 'Dashicons', 'social-icons-widget-by-wpzoom' ),
		),
		array(
			'value' => 'genericon',
			'label' => __( 'Genericons', 'social-icons-widget-by-wpzoom' ),
		),
		array(
			'value' => 'academicons',
			'label' => __( 'Academicons', 'social-icons-widget-by-wpzoom' ),
		),
	);

	if ( 'widget' === $type ) {
		$categories_list[] = array(
			'value' => 'fa',
			'label' => __( 'Font Awesome', 'social-icons-widget-by-wpzoom' ),
		);
	}

	if ( 'block' === $type ) {
		$categories_list[] = array(
			'value' => 'fab',
			'label' => __( 'Font Awesome Brands', 'social-icons-widget-by-wpzoom' ),
		);
		$categories_list[] = array(
			'value' => 'far',
			'label' => __( 'Font Awesome Regular', 'social-icons-widget-by-wpzoom' ),
		);
		$categories_list[] = array(
			'value' => 'fas',
			'label' => __( 'Font Awesome Solid', 'social-icons-widget-by-wpzoom' ),
		);
	}

	$categories_sync = WPZOOM_Social_Icons_Settings::get_option_key( 'categories-sync' );
	if ( empty( $categories_sync ) ) {
		return $categories_list;
	}

	return array_filter(
		$categories_list,
		function ( $category_item ) use ( $icons_kits ) {
			return ! empty( $icons_kits[ $category_item['value'] ] );
		}
	);
}
add_action( 'init', 'zoom_social_icons_widget_load_textdomain' );

/**
 * Set hooks for enqueue preloaded fonts
 *
 * @return void
 */
function zoom_enqueue_preloaded_fonts() {
	$fonts_preloading = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-fonts-preloading' );
	if ( ! empty( $fonts_preloading ) ) {
		add_action( 'wp_enqueue_scripts', 'zoom_social_icons_enqueue_fonts', 999 );
		add_filter( 'style_loader_tag', 'zoom_social_icons_add_preload_to_rel_attribute', 10, 3 );
	}
}
add_action( 'init', 'zoom_enqueue_preloaded_fonts' );

if ( ! function_exists( 'wpzoom_social_icons_plugin_action_links' ) ) {
	/**
	 * Plugin action links.
	 *
	 * Adds action links to the plugin list table
	 *
	 * Fired by `plugin_action_links` filter.
	 *
	 * @since 4.2.2
	 *
	 * @param array $links An array of plugin action links.
	 *
	 * @return array An array of plugin action links.
	 */
	function wpzoom_social_icons_plugin_action_links( $links ) {
		$is_active = is_plugin_active( WPZOOM_SOCIAL_ICONS_PLUGIN_BASE ); // Used to prevent the display of admin notice when activate PRO version of the plugin.

		if ( $is_active ) {
			$settings_link = sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'options-general.php?page=' . WPZOOM_Social_Icons_Settings::$menu_slug ), esc_html__( 'Settings', 'social-icons-widget-by-wpzoom' ) );

			array_unshift( $links, $settings_link );

			$links['go_pro'] = sprintf( '<a href="%1$s" target="_blank" class="wpzoom-social-icons-gopro" style="font-weight: bold;">%2$s</a>', 'https://www.wpzoom.com/plugins/social-widget/?utm_source=plugins-admin-page&utm_medium=plugins-row-action-links&utm_campaign=go_pro', esc_html__( 'Go Pro', 'social-icons-widget-by-wpzoom' ) );
		}

		return $links;
	}
	add_filter( 'plugin_action_links_' . WPZOOM_SOCIAL_ICONS_PLUGIN_BASE, 'wpzoom_social_icons_plugin_action_links' );
}

if ( ! function_exists( 'wpzoom_social_icons_plugin_row_meta' ) ) {
	/**
	 * Plugin row meta.
	 *
	 * Adds row meta links to the plugin list table
	 *
	 * Fired by `plugin_row_meta` filter.
	 *
	 * @since 4.2.2
	 *
	 * @param array  $plugin_meta An array of the plugin's metadata, including
	 *                            the version, author, author URI, and plugin URI.
	 * @param string $plugin_file Path to the plugin file, relative to the plugins
	 *                            directory.
	 *
	 * @return array An array of plugin row meta links.
	 */
	function wpzoom_social_icons_plugin_row_meta( $plugin_meta, $plugin_file ) {
		$is_active = is_plugin_active( WPZOOM_SOCIAL_ICONS_PLUGIN_BASE ); // Used to prevent the display of admin notice when activate PRO version of the plugin.

		if ( $is_active && WPZOOM_SOCIAL_ICONS_PLUGIN_BASE === $plugin_file ) {
			$row_meta = array(
				'docs' => '<a href="https://www.wpzoom.com/documentation/social-icons-widget-by-wpzoom/?utm_source=plugins-admin-page&utm_medium=plugin-row-meta&utm_campaign=plugins-admin-docs" aria-label="' . esc_attr( esc_html__( 'View Documentation', 'social-icons-widget-by-wpzoom' ) ) . '" target="_blank">' . esc_html__( 'Documentation', 'social-icons-widget-by-wpzoom' ) . '</a>',
			);

			$plugin_meta = array_merge( $plugin_meta, $row_meta );
		}

		return $plugin_meta;
	}
	add_filter( 'plugin_row_meta', 'wpzoom_social_icons_plugin_row_meta', 10, 2 );
}

if ( ! function_exists( 'wpzoom_social_icons_upgrade_pro_notice' ) ) {
	/**
	 * Content of Admin Notices in WordPress Dashboard
	 *
	 * @since 4.2.2
	 * @return void
	 */
	function wpzoom_social_icons_upgrade_pro_notice() {
		?>
		<div class="notice notice-success wpz-social-icons-notice is-dismissible">
			<a class="notice-dismiss" href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'social-icons-dismiss', 'dismiss_admin_notices' ), 'wpz_social_icons_hide_notices_nonce', '_wpz_social_icons_notice_nonce' ) ); ?>" style="text-decoration: none">
				<span class="screen-reader-text">
					<?php echo esc_html__( 'Dismiss this notice.', 'social-icons-widget-by-wpzoom' ); ?>
				</span>
			</a>
			<div class="wpz-social-icons-notice-wrap-content">
				<div class="wpz-social-icons-notice-aside">
					<img src="<?php echo esc_url( WPZOOM_SOCIAL_ICONS_PLUGIN_URL . '/assets/images/social-icons-pro-avatar.png' ); ?>" width="100" height="100" alt="Social Icons PRO"/>
				</div>
				<div class="wpz-social-icons-notice-content">
					<?php
					/* translators: %s The heading title */
					echo sprintf( '<h3>%s</h3>', esc_html__( '🤩&nbsp; Thank you for using Social Icons Widget by WPZOOM!', 'social-icons-widget-by-wpzoom' ) );
					?>
					<p class="wpz-social-icons-notice-text">
					<?php
					/* translators: %s The pro version features */
					echo sprintf( esc_html__( 'Big News! We\'ve released a new PRO version with unique features such as %s', 'social-icons-widget-by-wpzoom' ), '<strong>' . esc_html__( 'SVG Icons Uploader, Loading Icons in SVG format, and many other improvements to boost your PageSpeed score!', 'social-icons-widget-by-wpzoom' ) . '</strong>' );
					?>
					</p>
					<p class="wpz-social-icons-notice-actions">
						<a class="button-primary" href="https://www.wpzoom.com/plugins/social-widget/?utm_source=admin-notices&utm_medium=admin-notice-actions&utm_campaign=go_pro" target="_blank"><strong><?php esc_html_e( 'Get Social Icons Widget PRO &rarr;', 'social-icons-widget-by-wpzoom' ); ?></strong></a>
						<?php
						// phpcs:disable
						/*
						<a class="button-link" href="https://www.wpzoom.com/documentation/social-icons-widget-by-wpzoom/?utm_source=admin-notice&utm_medium=admin-notice-actions&utm_campaign=docs" target="_blank"><?php esc_html_e( 'Documentation', 'social-icons-widget-by-wpzoom' ); ?></a>
						<a class="button-link" href="<?php echo esc_url( admin_url( 'admin.php?page=' . WPZOOM_Social_Icons_Settings::$menu_slug ) ); ?>"><?php esc_html_e( 'Settings', 'social-icons-widget-by-wpzoom' ); ?></a> */
						// phpcs:enable
						?>
					</p>
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Admin styles.
	 *
	 * @since 4.2.2
	 */
	function wpzoom_social_icons_custom_admin_styles() {
		echo '<style id="wpzoom-social-icons-custom-admin-styles">

		.wpz-social-icons-notice .wpz-social-icons-notice-actions a {
			margin-right: .5em;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-actions a:last-child {
			margin-right: 0;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-wrap-content {
			padding: 0;
			display: flex;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-aside {
			overflow: hidden;
			padding-top: 10px;
			width: 110px;
			flex-grow: 0;
			flex-shrink: 0;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-content {
			padding: 15px 0;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-content h3 {
			margin-top: 0;
			margin-bottom: .5em;
		}
		.wpz-social-icons-notice .wpz-social-icons-notice-content p:last-child {
			margin-bottom: 0;
		}
		</style>';
	}
	add_action( 'admin_head', 'wpzoom_social_icons_custom_admin_styles' );
}

if ( ! function_exists( 'wpzoom_social_icons_admin_notices' ) ) {
	/**
	 * Admin Notice after Plugin Activation
	 *
	 * @since 4.2.2
	 * @return void
	 */
	function wpzoom_social_icons_admin_notices() {
		global $pagenow;

		$page                  = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$is_active             = is_plugin_active( WPZOOM_SOCIAL_ICONS_PLUGIN_BASE ); // Used to prevent the display of admin notice when activate PRO version of the plugin.
		$dismiss_notice        = get_option( 'wpz_social_icons_dismiss_admin_notices' );
		$should_display_notice = ( ( 'index.php' === $pagenow || 'plugins.php' === $pagenow || 'options-general.php' === $pagenow && 'wpzoom-social-icons-widget' === $page ) && $is_active && ! $dismiss_notice ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( $should_display_notice ) {
			wpzoom_social_icons_upgrade_pro_notice();
		}
	}
	add_action( 'admin_notices', 'wpzoom_social_icons_admin_notices' );
}

if ( ! function_exists( 'wpzoom_social_icons_hide_notice' ) ) {
	/**
	 * Hide Admin Notice in WordPress Dashboard
	 *
	 * @since 4.2.2
	 * @return void
	 */
	function wpzoom_social_icons_hide_notice() {
		$hide_notice = isset( $_GET['social-icons-dismiss'] ) ? sanitize_text_field( wp_unslash( $_GET['social-icons-dismiss'] ) ) : '';

		if ( 'dismiss_admin_notices' === $hide_notice && isset( $_GET['_wpz_social_icons_notice_nonce'] ) ) {
			if ( ! check_admin_referer( 'wpz_social_icons_hide_notices_nonce', '_wpz_social_icons_notice_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'social-icons-widget-by-wpzoom' ) );
			}

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_die( esc_html__( 'You do not have the necessary permission to perform this action.', 'social-icons-widget-by-wpzoom' ) );
			}

			update_option( 'wpz_social_icons_' . $hide_notice, 1 );
		}
	}
}
add_action( 'wp_loaded', 'wpzoom_social_icons_hide_notice' );

<?php
/**
 * Plugin Name: Social Icons Widget & Block by WPZOOM
 * Plugin URI: https://www.wpzoom.com/plugins/social-widget/
 * Description: Social Icons Widget & Block to display links to social media networks websites. Supports most of the known social networks and includes more than 400 icons. Sort icons by Drag & Drop and change their color easily.
 * Author: WPZOOM
 * Author URI: https://www.wpzoom.com/
 * Version: 4.1.0
 * License: GPLv2 or later
 * Text Domain: zoom-social-icons-widget
 * Domain Path: /languages
 */

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_URL' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WPZOOM_SOCIAL_ICONS_PLUGIN_PATH' ) ) {
	define( 'WPZOOM_SOCIAL_ICONS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}

require_once plugin_dir_path( __FILE__ ) . 'class.zoom-social-icons-settings.php';
require_once plugin_dir_path( __FILE__ ) . 'zoom-helper.php';

$wpzoom_social_icons_settings = WPZOOM_Social_Icons_Settings::get_settings();

if ( empty( $wpzoom_social_icons_settings['disable-block'] ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'block/src/init.php';
}

if ( empty( $wpzoom_social_icons_settings['disable-widget'] ) ) {
	require_once plugin_dir_path( __FILE__ ) . 'class.zoom-social-icons-widget.php';

	/**
	 * Register the widget
	 */
	add_action( 'widgets_init', function () {
		register_widget( 'Zoom_Social_Icons_Widget' );
	} );

}

function zoom_social_icons_enqueue_fonts() {

	if ( wp_style_is( 'wpzoom-social-icons-academicons' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-academicons-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/academicons.ttf?v=1.8.6', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-academicons-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/academicons.woff?v=1.8.6', [], null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-font-awesome-3' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-3-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fontawesome-webfont.ttf?v=4.7.0', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-3-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fontawesome-webfont.woff?v=4.7.0', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-3-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fontawesome-webfont.woff2?v=4.7.0', [], null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-font-awesome-5' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-brands-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-brands-400.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-brands-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-brands-400.woff', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-brands-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-brands-400.woff2', [], null );

		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-regular-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-regular-400.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-regular-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-regular-400.woff', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-regular-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-regular-400.woff2', [], null );

		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.woff', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.woff2', [], null );

		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.woff', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-fontawesome-5-solid-woff2', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/fa-solid-900.woff2', [], null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-genericons' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-genericons-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/Genericons.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-genericons-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/Genericons.woff', [], null );
	}

	if ( wp_style_is( 'wpzoom-social-icons-socicon' ) ) {
		wp_enqueue_style( 'wpzoom-social-icons-font-socicon-ttf', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/socicon.ttf', [], null );
		wp_enqueue_style( 'wpzoom-social-icons-font-socicon-woff', WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/font/socicon.woff', [], null );
	}

}

function zoom_social_icons_add_preload_to_rel_attribute( $tag, $handle, $href ) {

	$style_handlers = apply_filters( 'wpzoom-social-icons-fonts-preload-filter', [
		'wpzoom-social-icons-font-academicons-ttf',
		'wpzoom-social-icons-font-academicons-woff',
		'wpzoom-social-icons-font-fontawesome-3-ttf',
		'wpzoom-social-icons-font-fontawesome-3-woff',
		'wpzoom-social-icons-font-fontawesome-3-woff2',
		'wpzoom-social-icons-font-genericons-ttf',
		'wpzoom-social-icons-font-genericons-woff',
		'wpzoom-social-icons-font-socicon-ttf',
		'wpzoom-social-icons-font-socicon-woff',
		'wpzoom-social-icons-font-fontawesome-5-brands-ttf',
		'wpzoom-social-icons-font-fontawesome-5-brands-woff',
		'wpzoom-social-icons-font-fontawesome-5-brands-woff2',
		'wpzoom-social-icons-font-fontawesome-5-regular-ttf',
		'wpzoom-social-icons-font-fontawesome-5-regular-woff',
		'wpzoom-social-icons-font-fontawesome-5-regular-woff2',
		'wpzoom-social-icons-font-fontawesome-5-solid-ttf',
		'wpzoom-social-icons-font-fontawesome-5-solid-woff',
		'wpzoom-social-icons-font-fontawesome-5-solid-woff2',
	] );


	if ( in_array( $handle, $style_handlers ) ) {
		$file_type = strtolower( pathinfo( basename( parse_url( $href, PHP_URL_PATH ) ), PATHINFO_EXTENSION ) );

		$file_type = ! empty( $file_type ) ? ( 'type="font/' . $file_type . '"' ) : '';
		$tag       = preg_replace( [ "/='stylesheet'/", "/media='all'/" ], [
			"=\"preload\" as=\"font\" ",
			"{$file_type} crossorigin"
		], $tag );

	}

	return $tag;
}


/**
 * Load textdomain
 */
function zoom_social_icons_widget_load_textdomain() {
	load_plugin_textdomain( 'zoom-social-icons-widget', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'init', 'zoom_social_icons_widget_load_textdomain' );

/**
 * Set hooks for enqueue preloaded fonts.
 */
add_action( 'init', function () {

	if ( ! empty( WPZOOM_Social_Icons_Settings::get_option_key( 'disable-fonts-preloading' ) ) ) {
		add_action( 'wp_enqueue_scripts', 'zoom_social_icons_enqueue_fonts', 999 );
		add_filter( 'style_loader_tag', 'zoom_social_icons_add_preload_to_rel_attribute', 10, 3 );
	}

} );
<?php
/**
 * Helper functions.
 *
 * @package WPZOOM_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'zoom_pointer_load' ) ) :
	/**
	 * Load pointer scripts
	 *
	 * @param string $hook_suffix The current admin page.
	 * @return void
	 */
	function zoom_pointer_load( $hook_suffix ) {

		// Don't run on WP < 3.3.
		if ( get_bloginfo( 'version' ) < '3.3' ) {
			return;
		}

		$screen    = get_current_screen();
		$screen_id = $screen->id;

		// Get pointers for this screen.
		$pointers = apply_filters( 'zoom_admin_pointers_' . $screen_id, array() );

		if ( ! $pointers || ! is_array( $pointers ) ) {
			return;
		}

		// Get dismissed pointers.
		$dismissed      = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );
		$valid_pointers = array();

		// Check pointers and remove dismissed ones.
		foreach ( $pointers as $pointer_id => $pointer ) {

			// Sanity check.
			if ( in_array( $pointer_id, $dismissed ) || empty( $pointer ) || empty( $pointer_id ) || empty( $pointer['target'] ) || empty( $pointer['options'] ) ) {
				continue;
			}

			$pointer['pointer_id'] = $pointer_id;

			// Add the pointer to $valid_pointers array.
			$valid_pointers['pointers'][] = $pointer;
		}

		// No valid pointers? Stop here.
		if ( empty( $valid_pointers ) ) {
			return;
		}

		wp_localize_script(
			'wp-pointer',
			'wpPointerL10n',
			array(
				'dismiss' => __( 'I already did this', 'social-icons-widget-by-wpzoom' ),
			)
		);
		// Add pointers style to queue.
		wp_enqueue_style( 'wp-pointer' );

		// Add pointers script to queue. Add custom script.
		wp_enqueue_script(
			'zoom-social-pointer',
			plugins_url( 'assets/js/zoom-social-pointer.js', WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . '/social-icons-widget-by-wpzoom.php' ),
			array( 'wp-pointer' ),
			filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/zoom-social-pointer.js' ),
			true
		);

		// Add pointer options to script.
		wp_localize_script( 'zoom-social-pointer', 'zoom_social_pointer', $valid_pointers );
	}
endif;

if ( ! function_exists( 'zoom_register_pointer_callback' ) ) :
	/**
	 * Register pointer callback
	 *
	 * @param array $p Pointer data.
	 * @return array
	 */
	function zoom_register_pointer_callback( $p ) {
		$pointer = zoom_get_pointer_data();

		if ( ! empty( $pointer['transient_name'] ) && ! empty( $pointer['lifetime'] ) && ! get_site_transient( $pointer['transient_name'] ) ) {
			zoom_set_pointer_transient( $pointer['transient_name'], $pointer['lifetime'] );
		}

		if ( ! empty( $pointer['transient_name'] ) && get_option( '_site_transient_timeout_' . $pointer['transient_name'] ) ) {
			$data_timeout = get_option( '_site_transient_timeout_' . $pointer['transient_name'] );
			$lifetime     = ! empty( $pointer['lifetime'] ) ? $pointer['lifetime'] : MONTH_IN_SECONDS * 6;
			$delay_time   = ! empty( $pointer['delay_time'] ) ? $pointer['delay_time'] : DAY_IN_SECONDS * 3;

			if ( time() > $data_timeout - ( $lifetime - $delay_time ) ) {
				$p[ $pointer['transient_name'] ] = $pointer;
			}
		}

		return $p;
	}
endif;

if ( ! function_exists( 'zoom_set_pointer_transient' ) ) :
	/**
	 * Set pointer transient
	 *
	 * @param string $key Transient key name.
	 * @param string $time Transient expiration time.
	 * @return void
	 */
	function zoom_set_pointer_transient( $key, $time ) {
		set_site_transient( $key, true, $time );
	}
endif;

if ( ! function_exists( 'zoom_ajax_set_pointer_transient' ) ) :
	/**
	 * Set pointer transient via AJAX
	 *
	 * @return mixed|void
	 */
	function zoom_ajax_set_pointer_transient() {
		// phpcs:ignore WordPress.Security.NonceVerification.Missing
		if ( empty( $_POST['lifetime'] ) && empty( $_POST['transient_name'] ) && ! is_int( $_POST['lifetime'] ) && ! is_string( $_POST['transient_name'] ) ) {
			return wp_send_json_error( array( 'response' => 'Failed, $lifetime is not int or empty, $transient name is not string or empty' ) );
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Missing
		zoom_set_pointer_transient( $_POST['transient_name'], $_POST['lifetime'] );
		wp_send_json_success( array( 'response' => 'Done, transient is set' ) );
	}
endif;

if ( ! function_exists( 'zoom_get_pointer_data' ) ) :
	/**
	 * Get pointer data
	 *
	 * @return array
	 */
	function zoom_get_pointer_data() {
		$plugin_data = get_plugin_data( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . '/social-icons-widget-by-wpzoom.php' );
		$plugin_name = $plugin_data['Name'];

		$pointer_content  = esc_html__( 'Thank you for using', 'social-icons-widget-by-wpzoom' ) . ' <b>Social Icons Widget by WPZOOM!</b><br/>';
		$pointer_content .= esc_html__( 'Would you mind taking a moment to rate it! It won\'t take more than two minutes.', 'social-icons-widget-by-wpzoom' );
		$pointer_content .= '<p><b>' . esc_html__( 'Thanks for your support!', 'social-icons-widget-by-wpzoom' ) . '</b></p>';
		$pointer_content .= '<p><a class="button button-primary button-hero" href="https://wordpress.org/support/plugin/social-icons-widget-by-wpzoom/reviews/#new-post" target="_blank"> &#9733; ' . esc_html__( 'Rate Now', 'social-icons-widget-by-wpzoom' ) . '  &#9733;</a></p>';
		$pointer_content .= '<p><a class="zoom-social-remind-me-later button button-secondary button-hero">' . esc_html__( 'Remind Me later!', 'social-icons-widget-by-wpzoom' ) . '</a></p>';

		return array(
			'target'         => '#wp-admin-bar-my-account',
			'options'        => array(
				'content'      => sprintf(
					'<h3> %s </h3> <p> %s </p>',
					__( 'Rate Social Icons Widget by WPZOOM', 'social-icons-widget-by-wpzoom' ),
					$pointer_content
				),
				'position'     => array(
					'edge'  => 'top',
					'align' => 'left',
				),
				'pointerClass' => 'wp-pointer zoom-pointer-class',
				'pointerWidth' => 400,
			),
			'lifetime'       => MONTH_IN_SECONDS * 6,
			'delay_time'     => DAY_IN_SECONDS * 2,
			'transient_name' => 'zoom-social-pointer',
		);
	}
endif;

add_action( 'admin_enqueue_scripts', 'zoom_pointer_load', 1000 );
add_action( 'wp_ajax_zoom_ajax_set_pointer_transient', 'zoom_ajax_set_pointer_transient' );
add_filter( 'zoom_admin_pointers_widgets', 'zoom_register_pointer_callback' );

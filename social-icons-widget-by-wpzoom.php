<?php
/**
 * Plugin Name: Social Icons Widget by WPZOOM
 * Plugin URI: http://wpzoom.com/
 * Description: Social Icons Widget
 * Author: WPZOOM
 * Author URI: http://wpzoom.com/
 * Version: 1.0.2
 * License: GPLv2 or later
 */

require_once plugin_dir_path( __FILE__ ) . 'class.zoom-social-icons-widget.php';

add_action( 'widgets_init', 'zoom_social_icons_widget_register' );
function zoom_social_icons_widget_register() {
	register_widget( 'Zoom_Social_Icons_Widget' );
}

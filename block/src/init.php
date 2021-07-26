<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * Assets enqueued:
 * 1. style-wpzoom-social-icons.css - Frontend + Backend.
 * 2. wpzoom-social-icons.js - Backend.
 * 3. wpzoom-social-icons.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function wpzoom_social_icons_block_enqueue_assets() {

	$asset_file = wpzoom_social_icons_get_asset_file('block/dist/style-wpzoom-social-icons');

	wp_register_style(
		'wpzoom-social-icons-block-style',
		plugins_url( 'dist/style-wpzoom-social-icons.css', dirname( __FILE__ ) ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	$asset_file = wpzoom_social_icons_get_asset_file('block/dist/wpzoom-social-icons');

	// Register block editor script for backend.
	wp_register_script(
		'wpzoom-social-icons-block-js',
		plugins_url( '/dist/wpzoom-social-icons.js', dirname( __FILE__ ) ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);


	// Register block editor styles for backend.
	wp_register_style(
		'wpzoom-social-icons-block-editor',
		plugins_url( 'dist/wpzoom-social-icons.css', dirname( __FILE__ ) ),
		array( 'wp-edit-blocks' ),
		$asset_file['version']
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'wpzoom-social-icons-block-js',
		'wpzSocialIconsBlock',
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			'icons'         => include WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'icons-data.php',
			'iconKitsCategories' => zoom_social_icons_kits_categories_list('block')
		]
	);

	/**
	 * Register Gutenberg block on server-side.
	 *
	 * Register the block on server-side to ensure that the block
	 * scripts and styles for both frontend and backend are
	 * enqueued when the editor loads.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/blocks/writing-your-first-block-type#enqueuing-block-scripts
	 * @since 1.16.0
	 */
	register_block_type(
		'wpzoom-blocks/social-icons', array(
			// Enqueue style-wpzoom-social-icons.css on both frontend & backend.
			'style'         => 'wpzoom-social-icons-block-style',
			// Enqueue wpzoom-social-icons.js in the editor only.
			'editor_script' => 'wpzoom-social-icons-block-js',
			// Enqueue wpzoom-social-icons.css in the editor only.
			'editor_style'  => 'wpzoom-social-icons-block-editor',
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'wpzoom_social_icons_block_enqueue_assets' );

/**
 * Add custom block category
 *
 * @since 1.0.0
 */
function wpzoom_social_icons_block_add_custom_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'wpzoom-blocks',
				'title' => __( 'WPZOOM - Blocks', 'zoom-social-icons-widget' ),
			),
		)
	);
}

//Hook: Add block category.
global $wp_version;
if ( version_compare( $wp_version, '5.8', '<' ) ) {
	add_filter( 'block_categories', 'wpzoom_social_icons_block_add_custom_category', 10, 2 );
} else {
	add_filter( 'block_categories_all', 'wpzoom_social_icons_block_add_custom_category', 10, 2 );
}

/**
 * Register css and js files.
 */
function wpzoom_social_icons_block_register_secondary_assets() {

	/**
	 * Register academicons.css
	 */
	wp_register_style(
		'wpzoom-social-icons-academicons',
		WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/academicons.min.css',
		array(),
		filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/academicons.min.css' )
	);

	/**
	 * Register socicons.css
	 */
	wp_register_style(
		'wpzoom-social-icons-socicon',
		WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-socicon.css',
		array(),
		filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-socicon.css' )
	);

	/**
	 * Register font-awesome.css
	 */
	wp_register_style(
		'wpzoom-social-icons-font-awesome-5',
		WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/font-awesome-5.min.css',
		array(),
		filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/font-awesome-5.min.css' )
	);

	/**
	 * Register genericons.css
	 */
	wp_register_style(
		'wpzoom-social-icons-genericons',
		WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/genericons.css',
		array(),
		filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/genericons.css' )
	);

}

add_action( 'wp_enqueue_scripts', 'wpzoom_social_icons_block_register_secondary_assets' );

function wpzoom_has_reusable_block( $block_name, $id = false ){
	$id = (!$id) ? get_the_ID() : $id;
	if( $id ){
		if ( has_block( 'block', $id ) ){
			// Check reusable blocks
			$content = get_post_field( 'post_content', $id );
			$blocks = parse_blocks( $content );

			if ( ! is_array( $blocks ) || empty( $blocks ) ) {
				return false;
			}

			foreach ( $blocks as $block ) {
				if ( $block['blockName'] === 'core/block' && ! empty( $block['attrs']['ref'] ) ) {
					if( has_block( $block_name, $block['attrs']['ref'] ) ){
						return true;
					}
				}
			}
		}
	}

	return false;
}

/**
 * Enqueue css and js files.
 */
function wpzoom_social_icons_block_enqueue_secondary_assets() {

	if ( wpzoom_has_reusable_block( 'wpzoom-blocks/social-icons' ) ||
	     has_block( 'wpzoom-blocks/social-icons' ) ||
	     is_admin() ) {

		/**
		 * Enqueue dashicons.css
		 */

		if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-dashicons') ) ) {

			wp_enqueue_style( 'dashicons' );

		}


		/**
		 * Enqueue academicons.css
		 */

		if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-academicons') ) ) {

			wp_enqueue_style(
				'wpzoom-social-icons-academicons',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/academicons.min.css',
				array(),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/academicons.min.css' )
			);
		}
		/**
		 * Enqueue socicons.css
		 */
		if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-socicons') ) ) {

			wp_enqueue_style(
				'wpzoom-social-icons-socicon',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-socicon.css',
				array(),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-socicon.css' )
			);
		}

		/**
		 * Enqueue font-awesome.css
		 */
		if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-font-awesome-5') ) ) {

			wp_enqueue_style(
				'wpzoom-social-icons-font-awesome-5',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/font-awesome-5.min.css',
				array(),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/font-awesome-5.min.css' )
			);
		}

		/**
		 * Enqueue genericons.css
		 */
		if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-genericons') ) ) {

			wp_enqueue_style(
				'wpzoom-social-icons-genericons',
				WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/genericons.css',
				array(),
				filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/genericons.css' )
			);
		}
	}
}

add_action( 'enqueue_block_assets', 'wpzoom_social_icons_block_enqueue_secondary_assets' );

/**
 * Loads the asset file for the given script or style.
 * Returns a default if the asset file is not found.
 *
 * @since 4.2.0
 * @param string $filepath The name of the file without the extension.
 *
 * @return array The asset file contents.
 */
function wpzoom_social_icons_get_asset_file( $filepath ) {
	$asset_path = WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . $filepath . '.asset.php';

	return file_exists( $asset_path )
		? include $asset_path
		: array(
			'dependencies' => array(),
			'version'      => WPZOOM_SOCIAL_ICONS_PLUGIN_VERSION,
		);
}

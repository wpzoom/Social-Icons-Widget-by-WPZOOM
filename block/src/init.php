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
 * 1. blocks.style.build.css - Frontend + Backend.
 * 2. blocks.build.js - Backend.
 * 3. blocks.editor.build.css - Backend.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * @since 1.0.0
 */
function wpzoom_social_icons_block_enqueue_assets() { // phpcs:ignore
	// Register block styles for both frontend + backend.
	wp_register_style(
		'wpzoom-social-icons-block-style', // Handle.
		plugins_url( 'dist/blocks.style.build.css', dirname( __FILE__ ) ), // Block style CSS.
		array( 'wp-editor' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.style.build.css' ) // Version: File modification time.
	);

	// Register block editor script for backend.
	wp_register_script(
		'wpzoom-social-icons-block-js', // Handle.
		plugins_url( '/dist/blocks.build.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);

	/**
	 * Enqueue academicons.css
	 */
	wp_enqueue_style(
		'wpzoom-social-icons-block-academicons',
		plugins_url( 'dist/assets/css/academicons.min.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/assets/css/academicons.min.css' ) // Version: filemtime — Gets file modification time.

	);


	/**
	 * Enqueue socicons.css
	 */
	wp_enqueue_style(
		'wpzoom-social-icons-block-socicon', // Handle.
		plugins_url( 'dist/assets/css/socicon.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/assets/css/socicon.css' ) // Version: filemtime — Gets file modification time.
	);

	/**
	 * Enqueue font-awesome.css
	 */
	wp_enqueue_style(
		'wpzoom-social-icons-block-font-awesome', // Handle.
		plugins_url( 'dist/assets/css/fontawesome.min.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/assets/css/fontawesome.min.css' ) // Version: filemtime — Gets file modification time.
	);

	/**
	 * Enqueue genericons.css
	 */
	wp_enqueue_style(
		'wpzoom-social-icons-block-genericons', // Handle.
		plugins_url( 'dist/assets/css/genericons.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/assets/css/genericons.css' ) // Version: filemtime — Gets file modification time.
	);

	// Register block editor styles for backend.
	wp_register_style(
		'wpzoom-social-icons-block-editor', // Handle.
		plugins_url( 'dist/blocks.editor.build.css', dirname( __FILE__ ) ), // Block editor CSS.
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' ) // Version: File modification time.
	);

	// WP Localized globals. Use dynamic PHP stuff in JavaScript via `cgbGlobal` object.
	wp_localize_script(
		'wpzoom-social-icons-block-js',
		'wpzSocialIconsBlock', // Array containing dynamic data for a JS Global.
		[
			'pluginDirPath' => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'  => plugin_dir_url( __DIR__ ),
			// Add more data here that you want to access from `cgbGlobal` object.
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
			// Enqueue blocks.style.build.css on both frontend & backend.
			'style'         => 'wpzoom-social-icons-block-style',
			// Enqueue blocks.build.js in the editor only.
			'editor_script' => 'wpzoom-social-icons-block-js',
			// Enqueue blocks.editor.build.css in the editor only.
			'editor_style'  => 'wpzoom-social-icons-block-editor',
		)
	);
}

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
				'title' => __( 'WPZOOM - Blocks', 'wpzoom-social-icons-block' ),
			),
		)
	);
}

// Hook: Block assets.
add_action( 'init', 'wpzoom_social_icons_block_enqueue_assets' );
//Hook: Add block category.
add_filter( 'block_categories', 'wpzoom_social_icons_block_add_custom_category', 10, 2 );

<?php
/**
 * Blocks Initializer
 *
 * Enqueue CSS/JS of all the blocks.
 *
 * @since   1.0.0
 * @package WPZOOM_Social_Icons
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
	$asset_file = wpzoom_social_icons_get_asset_file( 'block/dist/style-wpzoom-social-icons' );

	wp_register_style(
		'wpzoom-social-icons-block-style',
		plugins_url( 'dist/style-wpzoom-social-icons.css', dirname( __FILE__ ) ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	$asset_file = wpzoom_social_icons_get_asset_file( 'block/dist/wpzoom-social-icons' );

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

	// WP Localized globals.
	wp_localize_script(
		'wpzoom-social-icons-block-js',
		'wpzSocialIconsBlock',
		array(
			'pluginDirPath'      => plugin_dir_path( __DIR__ ),
			'pluginDirUrl'       => plugin_dir_url( __DIR__ ),
			'icons'              => include WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'includes/icons-data.php',
			'iconKitsCategories' => zoom_social_icons_kits_categories_list( 'block' ),
		)
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
	if ( ! WP_Block_Type_Registry::get_instance()->is_registered( 'wpzoom-blocks/social-icons' ) ) {
		register_block_type(
			'wpzoom-blocks/social-icons',
			array(
				// Enqueue style-wpzoom-social-icons.css on both frontend & backend.
				'style'         => 'wpzoom-social-icons-block-style',
				// Enqueue wpzoom-social-icons.js in the editor only.
				'editor_script' => 'wpzoom-social-icons-block-js',
				// Enqueue wpzoom-social-icons.css in the editor only.
				'editor_style'  => 'wpzoom-social-icons-block-editor',
			)
		);
	}

	/**
	 * Register Social Sharing block.
	 */
	if ( ! WP_Block_Type_Registry::get_instance()->is_registered( 'wpzoom-blocks/social-sharing' ) ) {
		register_block_type(
			'wpzoom-blocks/social-sharing',
			array(
				// Enqueue style-wpzoom-social-icons.css on both frontend & backend.
				'style'         => 'wpzoom-social-icons-block-style',
				// Enqueue wpzoom-social-icons.js in the editor only.
				'editor_script' => 'wpzoom-social-icons-block-js',
				// Enqueue wpzoom-social-icons.css in the editor only.
				'editor_style'  => 'wpzoom-social-icons-block-editor',
				'render_callback' => 'wpzoom_social_sharing_block_render_callback',
			)
		);
	}
}

// Hook: Block assets.
add_action( 'init', 'wpzoom_social_icons_block_enqueue_assets' );

/**
 * Render callback for the social sharing block.
 * 
 * @param array $attributes The block attributes.
 * @return string The block HTML.
 */
function wpzoom_social_sharing_block_render_callback( $attributes ) {
	// Include social sharing icons functions if not already included
	if ( ! function_exists( 'wpzoom_social_sharing_get_svg_icon' ) ) {
		require_once WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . '/includes/social-sharing-icons.php';
	}

	// Get the current post URL and title
	$current_url = esc_url( get_permalink() );
	$current_title = esc_attr( get_the_title() );
	$featured_image = esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );

	// Get block attributes with defaults
	$align = isset( $attributes['align'] ) ? $attributes['align'] : 'none';
	$showLabels = isset( $attributes['showLabels'] ) ? $attributes['showLabels'] : true;
	$iconColor = isset( $attributes['iconColor'] ) ? $attributes['iconColor'] : '#ffffff';
	$labelColor = isset( $attributes['labelColor'] ) ? $attributes['labelColor'] : 'inherit';
	$iconSize = isset( $attributes['iconSize'] ) ? $attributes['iconSize'] : 20;
	$labelSize = isset( $attributes['labelSize'] ) ? $attributes['labelSize'] : 16;
	$paddingVertical = isset( $attributes['paddingVertical'] ) ? $attributes['paddingVertical'] : 10;
	$paddingHorizontal = isset( $attributes['paddingHorizontal'] ) ? $attributes['paddingHorizontal'] : 17;
	$marginVertical = isset( $attributes['marginVertical'] ) ? $attributes['marginVertical'] : 5;
	$marginHorizontal = isset( $attributes['marginHorizontal'] ) ? $attributes['marginHorizontal'] : 5;
	$borderRadius = isset( $attributes['borderRadius'] ) ? $attributes['borderRadius'] : 50;
	$hasBorder = isset( $attributes['hasBorder'] ) ? $attributes['hasBorder'] : false;
	$platforms = isset( $attributes['platforms'] ) ? $attributes['platforms'] : array();
	$oneToneColor = isset( $attributes['oneToneColor'] ) ? $attributes['oneToneColor'] : '#000000';

	// Class for block
	$block_class = 'wp-block-wpzoom-blocks-social-sharing';
	$class_name = isset( $attributes['className'] ) ? $attributes['className'] : '';
	
	// Check styles
	$is_one_tone_style = strpos($class_name, 'is-style-one-tone') !== false;
	$is_outlined_pill = strpos($class_name, 'is-style-outlined-pill') !== false;
	$is_outlined_square = strpos($class_name, 'is-style-outlined-square') !== false;
	$is_minimal = strpos($class_name, 'is-style-minimal') !== false;
	$is_filled_square = strpos($class_name, 'is-style-filled') !== false;

	// Ensure oneToneColor has a value
	if ($is_one_tone_style && empty($oneToneColor)) {
		$oneToneColor = '#000000';
	}
	
	// Ensure icon colors are appropriate for the style
	if ($is_one_tone_style) {
		$iconColor = '#ffffff';
		$labelColor = '#ffffff';
	} else if ($is_filled_square || strpos($class_name, 'is-style-default') !== false || strpos($class_name, 'is-style-rounded') !== false) {
		// Set white color for default, filled square and rounded styles
		$iconColor = '#ffffff';
		$labelColor = '#ffffff';
	}

	// Start building output
	$output = '<div class="' . esc_attr( $block_class . ' ' . $class_name ) . ' align-' . esc_attr( $align ) . '"';
	if ($align !== 'none') {
		$output .= ' style="text-align:' . esc_attr( $align ) . ';"';
	}
	$output .= '>';
	$output .= '<ul class="social-sharing-icons">';

	// Only show enabled platforms
	$enabled_platforms = array_filter( $platforms, function( $platform ) {
		return isset( $platform['enabled'] ) && $platform['enabled'];
	});

	// If no platforms are enabled, use default platforms
	if ( empty( $enabled_platforms ) ) {
		$enabled_platforms = array(
			array(
				'id' => 'facebook',
				'name' => __( 'Facebook', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#0866FF'
			),
			array(
				'id' => 'x',
				'name' => __( 'X', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#000000'
			),
			array(
				'id' => 'linkedin',
				'name' => __( 'LinkedIn', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#0966C2'
			),
			array(
				'id' => 'reddit',
				'name' => __( 'Reddit', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#FF4500'
			),
			array(
				'id' => 'whatsapp',
				'name' => __( 'WhatsApp', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#25D366'
			),
			array(
				'id' => 'email',
				'name' => __( 'Email', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#333333'
			),
			array(
				'id' => 'copy-link',
				'name' => __( 'Copy Link', 'social-icons-widget-by-wpzoom' ),
				'enabled' => true,
				'color' => '#333333'
			)
		);
	}

	// Loop through platforms
	foreach ( $enabled_platforms as $platform ) {
		// Generate share URL
		$share_url = wpzoom_social_sharing_get_share_url(
			$platform['id'],
			$current_url,
			$current_title,
			$featured_image
		);
		
		// Override borderRadius for filled-square style
		$style_specific_border_radius = $is_filled_square ? 0 : $borderRadius;
		
		// Set appropriate colors for all styles
		$icon_color_value = $iconColor;
		$label_color_value = $labelColor;
		
		// Set background color based on style
		$platform_color = isset( $platform['color'] ) ? $platform['color'] : wpzoom_social_sharing_get_platform_color( $platform['id'] );
		
		// Special handling for One Tone style
		if ($is_one_tone_style) {
			$platform_color = $oneToneColor;
		} elseif ($is_outlined_pill || $is_outlined_square || $is_minimal) {
			$platform_color = 'transparent';
		}
		
		// Set border based on style
		$border_style = '';
		if ($is_outlined_pill || $is_outlined_square) {
			$border_style = 'border:1px solid ' . $icon_color_value . ';';
		} elseif ($hasBorder) {
			$border_style = 'border:1px solid;';
		}
		
		// Calculate padding
		$padding_vertical = $paddingVertical;
		$padding_horizontal = $paddingHorizontal;
		if ($is_minimal) {
			$padding_vertical = 5;
			$padding_horizontal = 5;
		}
		
		// Build output for this platform
		$button_style = sprintf(
			'padding:%dpx %dpx;margin:%dpx %dpx;border-radius:%dpx;font-size:%dpx;color:%s;background-color:%s;%s',
			$padding_vertical,
			$padding_horizontal,
			$marginVertical,
			$marginHorizontal,
			$style_specific_border_radius,
			$iconSize,
			$icon_color_value,
			$platform_color,
			$border_style
		);
		
		$output .= '<li class="social-sharing-icon-li">';
		$output .= '<a class="social-sharing-icon social-sharing-icon-' . esc_attr( $platform['id'] ) . '" ';
		$output .= 'style="' . esc_attr( $button_style ) . '" ';
		$output .= 'href="' . esc_url( $share_url ) . '" ';
		$output .= 'title="' . esc_attr( $platform['name'] ) . '" ';
		
		// Don't use target="_blank" for copy-link only
		if ( $platform['id'] !== 'copy-link' ) {
			$output .= 'target="_blank" rel="noopener noreferrer" ';
		}
		
		$output .= 'data-platform="' . esc_attr( $platform['id'] ) . '">';
		
		// Add SVG icon
		$output .= wpzoom_social_sharing_get_svg_icon( $platform['id'], $iconSize, $icon_color_value );
		
		if ( $showLabels ) {
			$label_style = sprintf( 'font-size:%dpx;color:%s;', $labelSize, $label_color_value );
			$output .= '<span class="social-sharing-icon-label" style="' . esc_attr( $label_style ) . '">' . esc_html( $platform['name'] ) . '</span>';
		}
		
		$output .= '</a>';
		$output .= '</li>';
	}
	
	$output .= '</ul>';

	// Add JS for copy link functionality
	$copy_link_enabled = false;
	foreach ( $enabled_platforms as $platform ) {
		if ( $platform['id'] === 'copy-link' ) {
			$copy_link_enabled = true;
			break;
		}
	}

	if ( $copy_link_enabled ) {
		// Get success icon SVG
		$success_icon = wpzoom_social_sharing_get_success_icon($iconSize, $iconColor);
		
		$output .= '<script>
			document.addEventListener("DOMContentLoaded", function() {
				var copyLinks = document.querySelectorAll("a[data-platform=\'copy-link\']");
				copyLinks.forEach(function(link) {
					link.addEventListener("click", function(e) {
						e.preventDefault();
						var tempInput = document.createElement("input");
						tempInput.value = "' . esc_js( $current_url ) . '";
						document.body.appendChild(tempInput);
						tempInput.select();
						document.execCommand("copy");
						document.body.removeChild(tempInput);
						
						var originalText = this.querySelector(".social-sharing-icon-label")?.textContent || "";
						var originalTitle = this.getAttribute("title");
						var originalIcon = this.querySelector("svg").outerHTML;
						
						// Show success feedback
						this.setAttribute("title", "' . esc_js( __( 'Copied!', 'social-icons-widget-by-wpzoom' ) ) . '");
						this.classList.add("copied"); // Add class for animation
						
						if (this.querySelector(".social-sharing-icon-label")) {
							// If labels are shown, update the label text
							this.querySelector(".social-sharing-icon-label").textContent = "' . esc_js( __( 'Copied!', 'social-icons-widget-by-wpzoom' ) ) . '";
						} else {
							// If labels are not shown, change the icon to a check mark
							this.querySelector("svg").outerHTML = \'' . $success_icon . '\';
						}
						
						setTimeout(function() {
							// Reset back to original state
							link.setAttribute("title", originalTitle);
							link.classList.remove("copied"); // Remove class after animation
							if (link.querySelector(".social-sharing-icon-label")) {
								link.querySelector(".social-sharing-icon-label").textContent = originalText;
							} else {
								link.querySelector("svg").outerHTML = originalIcon;
							}
						}, 2000);
					});
				});
			});
		</script>';
	}
	
	$output .= '</div>';
	
	return $output;
}

/**
 * Add custom block category
 *
 * @since 1.0.0
 *
 * @param array $categories Array of categories for block types.
 * @return array Filters the default array of categories for block types.
 */
function wpzoom_social_icons_block_add_custom_category( $categories ) {
	if ( empty( $categories ) || ( ! empty( $categories ) && is_array( $categories ) && ! in_array( 'wpzoom-blocks', wp_list_pluck( $categories, 'slug' ) ) ) ) {
		$categories = array_merge(
			$categories,
			array(
				array(
					'slug'  => 'wpzoom-blocks',
					'title' => __( 'WPZOOM - Blocks', 'social-icons-widget-by-wpzoom' ),
				),
			)
		);
	}

	return $categories;
}

/**
 * Use hook for block categories depending by WordPress version.
 *
 * @return void
 */
function wpzoom_social_icons_block_categories() {
	global $wp_version;
	if ( version_compare( $wp_version, '5.8', '<' ) ) {
		add_filter( 'block_categories', 'wpzoom_social_icons_block_add_custom_category', 10, 2 );
	} else {
		add_filter( 'block_categories_all', 'wpzoom_social_icons_block_add_custom_category', 10, 2 );
	}
}
wpzoom_social_icons_block_categories();

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

/**
 * Check has reusable block
 *
 * @param string $block_name The block name.
 * @param int    $id The post id.
 * @return boolean
 */
function wpzoom_has_reusable_block( $block_name, $id = 0 ) {
	$id = ( ! $id ) ? get_the_ID() : $id;
	if ( $id ) {
		if ( has_block( 'block', $id ) ) {
			// Check reusable blocks.
			$content = get_post_field( 'post_content', $id );
			$blocks  = parse_blocks( $content );

			if ( ! is_array( $blocks ) || empty( $blocks ) ) {
				return false;
			}

			foreach ( $blocks as $block ) {
				if ( 'core/block' === $block['blockName'] && ! empty( $block['attrs']['ref'] ) ) {
					if ( has_block( $block_name, $block['attrs']['ref'] ) ) {
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
		 wpzoom_has_reusable_block( 'wpzoom-blocks/social-sharing' ) || 
		 has_block( 'wpzoom-blocks/social-icons' ) || 
		 has_block( 'wpzoom-blocks/social-sharing' ) || 
		 is_admin() ) {
		$disable_css_loading_socicons    = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-css-loading-for-socicons' );
		$disable_css_loading_genericons  = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-css-loading-for-genericons' );
		$disable_css_loading_academicons = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-css-loading-for-academicons' );
		$disable_css_loading_fa5         = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-css-loading-for-font-awesome-5' );
		$disable_css_loading_dashicons   = WPZOOM_Social_Icons_Settings::get_option_key( 'disable-css-loading-for-dashicons' );

		/**
		 * Enqueue dashicons.css
		 */

		if ( ! empty( $disable_css_loading_dashicons ) ) {
			wp_enqueue_style( 'dashicons' );
		}

		/**
		 * Enqueue academicons.css
		 */

		if ( ! empty( $disable_css_loading_academicons ) ) {
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
		if ( ! empty( $disable_css_loading_socicons ) ) {
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
		if ( ! empty( $disable_css_loading_fa5 ) ) {
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
		if ( ! empty( $disable_css_loading_genericons ) ) {
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

if ( ! function_exists( 'wpzoom_social_icons_get_asset_file' ) ) {
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
}

<?php
/**
 * Social Icons Shortcode
 *
 * This class adds all the hooks neceessary to enable the desired shortcode features
 * in the WordPress installation. It uses the class ZOOM_Social_Icons_Widget().
 *
 * @package WPZOOM_Social_Icons
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main class for Social Icons Widget
 */
class WPZOOM_Social_Icons_Free_Shortcode {

	/**
	 * Post type name
	 *
	 * @since 1.1.0
	 * @var string
	 */
	public static $post_type_name = 'Social Icon Sets';

	/**
	 * Constructor
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_custom_post_type' ) );
		add_action( 'edit_form_after_title', array( $this, 'add_form_to_post' ) );
		add_action( 'save_post_wpzoom-shortcode', array( $this, 'save_data' ) );
		add_action( 'manage_wpzoom-shortcode_posts_columns', array( $this, 'register_columns' ) );
		add_action( 'manage_wpzoom-shortcode_posts_custom_column', array( $this, 'render_column' ) );
		add_action( 'init', array( $this, 'register_shortcode' ) );
	}

	/**
	 * Register custom post type
	 *
	 * @since 1.1.0
	 * @return void
	 */
	public function register_custom_post_type() {
		$labels = array(
			'name'               => _x( 'Social Icons Sets', 'post type general name', 'social-icons-widget-by-wpzoom' ),
			'singular_name'      => _x( 'Social Icon Sets', 'post type singular name', 'social-icons-widget-by-wpzoom' ),
			'add_new'            => _x( 'Add New', 'shortcode', 'social-icons-widget-by-wpzoom' ),
			'add_new_item'       => __( 'Add New Shortcode', 'social-icons-widget-by-wpzoom' ),
			'edit_item'          => __( 'Edit Social Icon Shortcode', 'social-icons-widget-by-wpzoom' ),
			'new_item'           => __( 'New Social Icon Shortcodes Memeber', 'social-icons-widget-by-wpzoom' ),
			'all_items'          => __( 'All Icon Sets', 'social-icons-widget-by-wpzoom' ),
			'view_item'          => __( 'View Shortcodes', 'social-icons-widget-by-wpzoom' ),
			'search_items'       => __( 'Search Social Icon Shortcodes', 'social-icons-widget-by-wpzoom' ),
			'not_found'          => __( 'No shortcode found', 'social-icons-widget-by-wpzoom' ),
			'not_found_in_trash' => __( 'No shortcode found in Trash', 'social-icons-widget-by-wpzoom' ),
			'parent_item_colon'  => '',
			'menu_name'          => self::$post_type_name,
		);
		$args   = array(
			'labels'             => $labels,
			'description'        => 'A post type for entering shortcode information.',
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'query_var'          => true,
			'hierarchical'       => false,
			'show_in_nav_menus'  => false,
			'supports'           => array( 'title' ),
			'has_archive'        => false,
			'menu_position'      => 80,
			'menu_icon'          => 'data:image/svg+xml;base64,' . base64_encode( '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.43 225.56"><path fill="#a7aaad" d="M947.67,465.69h72a18,18,0,0,0,18-18v-72a18,18,0,0,0-18-18h-72a18,18,0,0,0-18,18v12a6,6,0,0,0,12,0v-12a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v72a6,6,0,0,1-6,6h-72a6,6,0,0,1-6-6v-36a6,6,0,1,0-12,0v36A18,18,0,0,0,947.67,465.69Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M984,505a24,24,0,1,0,22.17,14.82A24,24,0,0,0,984,505Zm4.59,35.09A12,12,0,1,1,996,529,12,12,0,0,1,988.59,540.09Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M1032,535a6,6,0,0,0,6-6V493a18,18,0,0,0-18-18H948a18,18,0,0,0-18,18v72a18,18,0,0,0,18,18h72a18,18,0,0,0,18-18V553a6,6,0,0,0-12,0v12a6,6,0,0,1-6,6H948a6,6,0,0,1-6-6V493a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v36A6,6,0,0,0,1032,535Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M902.57,475.25h-72a18,18,0,0,0-18,18v12a6,6,0,1,0,12,0v-12a6,6,0,0,1,6-6h72a6,6,0,0,1,6,6v72a6,6,0,0,1-6,6h-72a6,6,0,0,1-6-6v-36a6,6,0,0,0-12,0v36a18,18,0,0,0,18,18h72a18,18,0,0,0,18-18v-72A18,18,0,0,0,902.57,475.25Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M893.7,406.66l-36-18A6,6,0,0,0,849,394v36a6,6,0,0,0,6,6,5.92,5.92,0,0,0,2.7-.66l36-18a6,6,0,0,0,0-10.68ZM861,420.28V403.72L877.56,412Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M846.34,362.11a54,54,0,1,0,58.84,11.71A54,54,0,0,0,846.34,362.11ZM896.7,441.7a42,42,0,1,1,9.1-45.77A42,42,0,0,1,896.7,441.7Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M859.91,504.71v4.5c0,3.24-2.14,5.7-6.59,5.7h-2.13v9.36h7.52v15c0,7,5.38,11.26,14.19,11.26a18.45,18.45,0,0,0,6.75-1v-8.87a19.38,19.38,0,0,1-3.42.35c-2.82,0-4.7-.77-4.7-3.66V524.27h8.29v-9.36h-8.29v-10.2Z" transform="translate(-812.57 -357.69)"></path><path fill="#a7aaad" d="M994.39,395.08a17.74,17.74,0,0,1,3.85.35v-8.72a18.83,18.83,0,0,0-6.16-.78c-10.34,0-16.23,5.49-16.23,13.52v3h-6.76v9h6.76v26h13v-26h9.23v-9h-9.23V399.8C988.84,395.93,992.08,395.08,994.39,395.08Z" transform="translate(-812.57 -357.69)"></path></svg>' ), // phpcs:ignore
		);
		register_post_type( 'wpzoom-shortcode', $args );
	}

	/**
	 * Add form to post
	 *
	 * @since 1.1.0
	 *
	 * @param WP_Post $post The post object.
	 * @return void
	 */
	public function add_form_to_post( $post ) {
		if ( 'wpzoom-shortcode' === $post->post_type ) {
			$post_id         = $post->ID;
			$widget_instance = $this->get_data( $post_id );
			$widget_instance['widget']->_set( $post_id );

			?>
			<p>
				<label><strong><?php esc_html_e( 'Shortcode:', 'social-icons-widget-by-wpzoom' ); ?></strong></label>

				<input type="text" id="wpz-social-shortcode" onClick="this.select();" value="<?php $this->display_shortcode_string( $post->ID ); ?>">

			</p>

			<div class="social_shortcode_wrap">

				<?php

					$widget_instance['widget']->form( $widget_instance['instance'] );

				?>
				</div>
			<?php
		}
	}

	/**
	 * Get shortcode data
	 *
	 * @since 1.1.0
	 *
	 * @param int|string $post_id The post ID.
	 * @return array
	 */
	public function get_data( $post_id ) {
		$widget   = ZOOM_Social_Icons_Widget::get_instance();
		$instance = $widget->get_defaults();

		$serialised_data = get_post_meta( $post_id, '_shortcode_item_wpzoom-icons' );

		if ( ! empty( $serialised_data ) ) {
			$unserialised_data = unserialize( $serialised_data[0] ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_unserialize

			if ( ! empty( $unserialised_data['fields'] ) ) {
				return array(
					'widget'   => $widget,
					'instance' => $unserialised_data,
				);
			}
		}

		return array(
			'widget'   => $widget,
			'instance' => $instance,
		);
	}

	/**
	 * Save shortcode data
	 *
	 * @since 1.1.0
	 *
	 * @param int|string $post_id The post ID.
	 * @return void
	 */
	public function save_data( $post_id ) {
		$widget = ZOOM_Social_Icons_Widget::get_instance();
		$data   = isset( $_POST['widget-zoom-social-icons-widget'] ) ? wp_unslash( $_POST['widget-zoom-social-icons-widget'] ) : array(); // phpcs:ignore WordPress.Security.NonceVerification.Missing

		if ( isset( $data[ $post_id ] ) ) {
			$defaults     = $widget->get_defaults();
			$new_instance = wp_parse_args( $data[ $post_id ], $defaults );

			unset( $new_instance['fields'] );

			$data_to_save = $widget->update(
				$new_instance,
				array()
			);
			update_post_meta( $post_id, '_shortcode_item_wpzoom-icons', serialize( $data_to_save ) ); // phpcs:ignore WordPress.PHP.DiscouragedPHPFunctions.serialize_serialize
		}
	}

	/**
	 * Register columns
	 *
	 * @since 1.1.0
	 *
	 * @param array $columns The registered columns.
	 * @return array
	 */
	public function register_columns( array $columns ) {
		$columns['shortcode_wpzoom-icons'] = __( 'Shortcode', 'social-icons-widget-by-wpzoom' );
		return $columns;
	}

	/**
	 * Render column
	 *
	 * @since 1.1.0
	 *
	 * @param string $column_id The column id.
	 * @return mixed
	 */
	public function render_column( $column_id ) {
		if ( 'shortcode_wpzoom-icons' !== $column_id ) {
			return;
		}

		$post = get_post();
		?>
		<input type="text" size="33" id="wpz-social-shortcode" onClick="this.select();" value="<?php $this->display_shortcode_string( $post->ID ); ?>">
		<?php
	}

	/**
	 * Display generated shortcode string
	 *
	 * @since 1.1.0
	 *
	 * @param int|string $post_id The post ID.
	 * @return void
	 */
	public function display_shortcode_string( $post_id ) {
		echo esc_html( '[wpzoom_social_icons id="' . $post_id . '"]' );
	}

	/**
	 * Register shortcode
	 *
	 * @since 1.1.0
	 * @return void
	 */
	public function register_shortcode() {
		add_shortcode( 'wpzoom_social_icons', array( $this, 'shortcode' ) );
	}

	/**
	 * Shortcode
	 *
	 * @since 1.1.0
	 *
	 * @param array $atts The shortcode attributes.
	 * @return string
	 */
	public function shortcode( $atts ) {
		$post_id  = $atts['id'];
		$instance = $this->get_data( $post_id );

		// Remove title from shortcode.
		$instance['instance']['title'] = '';

		ob_start();
		$instance['widget']->widget(
			array(
				'before_widget' => '<section class="zoom-social-icons-shortcode">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			),
			$instance['instance']
		);
		$item_output = ob_get_clean();

		return $item_output;
	}
}

new WPZOOM_Social_Icons_Free_Shortcode();

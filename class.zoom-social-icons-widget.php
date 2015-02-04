<?php

class Zoom_Social_Icons_Widget extends WP_Widget {
	/**
	 * @var array Default widget options.
	 */
	protected $defaults;

	/**
	 * @var string
	 */
	protected $plugin_file;

	public function __construct() {
		parent::__construct(
			'zoom-social-icons-widget',
			esc_html__( 'Social Icons by WPZOOM', 'zoom-social-icons-widget' ),
			array(
				'classname'   => 'zoom-social-icons-widget',
				'description' => __( 'Social Icons Widget.', 'zoom-social-icons-widget' ),
			)
		);

		$this->defaults = apply_filters( 'zoom-social-icons-widget-defaults', array(
			'title'            => esc_html__( 'Social Icons', 'zoom-social-icons-widget' ),
			'show-icon-labels' => false
		) );

		$this->plugin_file = dirname( __FILE__ ) . '/social-icons-widget-by-wpzoom.php';

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'admin_js_templates' ) );
	}

	public function admin_scripts() {
		global $wp_scripts;

		wp_enqueue_script( 'zoom-social-icons-widget', plugin_dir_url( $this->plugin_file ) . 'social-icons-widget.js', array( 'jquery', 'jquery-ui-sortable' ), '20150203' );

		// get registered script object for jquery-ui
		$ui = $wp_scripts->query('jquery-ui-core');

		// tell WordPress to load the Smoothness theme from Google CDN
		$protocol = is_ssl() ? 'https' : 'http';
		$url = "$protocol://ajax.googleapis.com/ajax/libs/jqueryui/{$ui->ver}/themes/smoothness/jquery-ui.min.css";
		wp_enqueue_style('jquery-ui-smoothness', $url, false, null);

		?>
		<style>
			.zoom-social-icons__list--no-labels .zoom-social-icons__field-label { display: none; }
			.zoom-social-icons__field + .zoom-social-icons__field { border-top: 1px solid #ccc; }
			.zoom-social-icons__add-button { margin-bottom: 10px; }
		</style>
		<?php
	}

	public function admin_js_templates() {
		?>
		<script type="text/html" id="tmpl-zoom-social-icons-field">
			<li class="zoom-social-icons__field">
				<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
				<input class="zoom-social-icons__field-url" type="text" placeholder="http://profile-url/..." value="">
				<span class="zoom-social-icons__field-icon">i</span>

				<input class="widefat zoom-social-icons__field-label" type="text" placeholder="Follow me..." value="">
			</li>
		</script>
		<?php
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $args['before_widget'];

		if ( $instance['title'] ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo $args['after_widget'];
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance['title'] = sanitize_text_field( $new_instance['title'] );

		$instance['show-icon-labels'] = (bool) $new_instance['show-icon-labels'];

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @return string|void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'zoom-social-icons-widget' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
		</p>

		<p>
			<input class="checkbox zoom-social-icons-show-icon-labels" type="checkbox" <?php checked( $instance['show-icon-labels'] ); ?> id="<?php echo $this->get_field_id( 'show-icon-labels' ); ?>" name="<?php echo $this->get_field_name( 'show-icon-labels' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show-icon-labels' ); ?>"><?php _e(' Show icon labels? ', 'zoom-social-icons-widget'); ?></label>
		</p>

		<p style="margin-bottom: 0;"><?php _e( 'Icons:', 'zoom-social-icons-widget' ); ?></p>

		<ul class="zoom-social-icons__list <?php echo ($instance['show-icon-labels'] ? '' : 'zoom-social-icons__list--no-labels'); ?>">

		</ul>

		<div class="zoom-social-icons__add-button">
			<button class="button">Add more</button>
		</div>

		<?php
	}
}

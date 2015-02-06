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

	protected $icons = array(
		'twitter', 'facebook', 'google', 'pinterest', 'foursquare', 'yahoo', 'skype', 'yelp', 'feedburner',
		'linkedin', 'viadeo', 'xing', 'myspace', 'soundcloud', 'spotify', 'grooveshark', 'lastfm', 'youtube', 'vimeo',
		'dailymotion', 'vine', 'flickr', '500px', 'instagram', 'wordpress', 'tumblr', 'blogger', 'technorati', 'reddit',
		'dribbble', 'stumbleupon', 'digg', 'envato', 'behance', 'delicious', 'deviantart', 'forrst', 'play', 'zerply',
		'wikipedia', 'apple', 'flattr', 'github', 'chimein', 'friendfeed', 'newsvine', 'identica', 'bebo', 'zynga',
		'steam', 'xbox', 'windows', 'outlook', 'coderwall', 'tripadvisor', 'appnet', 'goodreads', 'tripit', 'lanyrd',
		'slideshare', 'buffer', 'rss', 'vkontakte', 'disqus', 'houzz', 'mail', 'patreon', 'paypal', 'playstation',
		'smugmug', 'swarm', 'triplej', 'yammer', 'stackoverflow', 'drupal', 'odnoklassniki', 'android', 'meetup', 'persona'
	);

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
			'show-icon-labels' => false,
			'fields'           => array()
		) );

		$this->plugin_file = dirname( __FILE__ ) . '/social-icons-widget-by-wpzoom.php';

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'admin_js_templates' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );
	}

	public function admin_scripts() {
		wp_enqueue_script( 'zoom-social-icons-widget', plugin_dir_url( $this->plugin_file ) . 'social-icons-widget.js', array( 'jquery', 'jquery-ui-sortable' ), '20150203' );
		wp_enqueue_style( 'socicon', plugin_dir_url( $this->plugin_file ) . 'css/socicon.css', array(), '20150204' );
		wp_enqueue_style( 'social-icons-widget-admin', plugin_dir_url( $this->plugin_file ) . 'css/social-icons-widget-admin.css', array( 'socicon' ), '20150206' );
	}

	public function admin_js_templates() {
		?>

		<script type="text/html" id="tmpl-zoom-social-icons-field"><?php $this->list_field_template(); ?></script>

		<?php
	}

	public function scripts() {
		wp_enqueue_style( 'socicon', plugin_dir_url( $this->plugin_file ) . 'css/socicon.css', array(), '20150204' );
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

		?>

		<ul class="zoom-social-icons-list <?php echo ( $instance['show-icon-labels'] ? '' : 'zoom-social-icons-list--no-labels' ); ?>">

			<?php foreach ( $instance['fields'] as $field ) : ?>
				<?php $class_list = 'socicon socicon-' . $this->get_icon( $field['url'] ); ?>

				<li class="zoom-social_icons-list__item">
					<a href="<?php echo esc_url( $field['url'] ); ?>">
						<span class="<?php echo esc_attr( $class_list ); ?>"></span>

						<?php if ( $instance['show-icon-labels'] ) : ?>
							<span><?php echo esc_html( $field['label'] ); ?></span>
						<?php endif; ?>
					</a>
				</li>

			<?php endforeach; ?>

		</ul>

		<?php

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

		$field_count = count( $new_instance['url-fields'] );

		$instance['fields'] = array();

		for ( $i = 0; $i < $field_count; $i ++ ) {
			$url   = esc_url( $new_instance['url-fields'][ $i ] );
			$label = esc_html( $new_instance['label-fields'][ $i ] );

			if ( $url ) {
				$instance['fields'][] = array(
					'url'   => $url,
					'label' => $label
				);
			}
		}

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

		<ul class="zoom-social-icons__list <?php echo ($instance['show-icon-labels'] ? '' : 'zoom-social-icons__list--no-labels'); ?>"
		    data-url-field-id="<?php echo $this->get_field_id( 'url-fields' ); ?>"
		    data-url-field-name="<?php echo $this->get_field_name( 'url-fields' ); ?>"
		    data-label-field-id="<?php echo $this->get_field_id( 'label-fields' ); ?>"
		    data-label-field-name="<?php echo $this->get_field_name( 'label-fields' ); ?>">

			<?php
			foreach ( $instance['fields'] as $field ) {
				$this->list_field_template( array(
					'url-field-id'     => $this->get_field_id( 'url-fields' ),
					'url-field-name'   => $this->get_field_name( 'url-fields' ),
					'url-value'        => $field['url'],
					'label-field-id'   => $this->get_field_id( 'label-fields' ),
					'label-field-name' => $this->get_field_name( 'label-fields' ),
					'label-value'      => $field['label'],
				) );
			}
			?>

		</ul>

		<div class="zoom-social-icons__add-button">
			<button class="button"><?php _e( 'Add more', 'zoom-social-icons-widget' ); ?></button>
		</div>

		<?php
	}

	protected function list_field_template( $args = array() ) {
		$defaults = array(
			'url-field-id'     => '',
			'url-field-name'   => '',
			'url-value'        => '',
			'label-field-id'   => '',
			'label-field-name' => '',
			'label-value'      => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$icon_class = 'dashicons dashicons-sort';
		if ( ( $icon = $this->get_icon( $args['url-value'] ) ) ) {
			$icon_class = 'socicon socicon-' . $icon;
		}

		?>

		<li class="zoom-social-icons__field">
			<div class="zoom-social-icons__cw">
				<div class="zoom-social-icons__inputs">

					<?php
					printf('<input class="widefat zoom-social-icons__field-url" id="%1$s" name="%2$s[]" type="text" placeholder="%3$s" value="%4$s">',
						$args['url-field-id'],
						$args['url-field-name'],
						__('URL', 'zoom-social-icons-widget'),
						esc_attr( $args['url-value'] )
					);

					printf('<input class="widefat zoom-social-icons__field-label" id="%1$s" name="%2$s[]" type="text" placeholder="%3$s" value="%4$s">',
						$args['label-field-id'],
						$args['label-field-name'],
						__( 'Label', 'zoom-social-icons-widget' ),
						esc_attr( $args['label-value'] )
					);
					?>

				</div>
			</div>

			<span class="zoom-social-icons__field-handle <?php echo $icon_class; ?>"></span>
			<a class="zoom-social-icons__field-trash" href="#"><span class="dashicons dashicons-trash"></span></a>

			<br style="clear:both">
		</li>

		<?php
	}

	protected function get_icon( $url ) {
		$icon = '';

		if ( $url ) {
			foreach ( $this->icons as $icon_id ) {
				if ( strstr( $url, $icon_id ) ) {
					$icon = $icon_id;
					break;
				}
			}
		}

		return apply_filters( 'zoom-social-icons-widget-icon', $icon, $url );
	}
}

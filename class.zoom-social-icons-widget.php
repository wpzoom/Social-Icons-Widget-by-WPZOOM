<?php

class Zoom_Social_Icons_Widget extends WP_Widget {
	/**
	 * @var array Default widget options.
	 */
	protected $defaults;

	/**
	 * @var string Path to plugin file.
	 */
	protected $plugin_file;

	/**
	 * @var array List of supported icons.
	 */
	protected $icons = array(
	   '500px',
       'airbnb',
       'android',
       'apple',
       'appnet',
       'baidu',
       'bebo',
       'behance',
       'blogger',
       'bloglovin',
       'buffer',
       'coderwall',
       'dailymotion',
       'delicious',
       'deviantart',
       'digg',
       'disqus',
       'dribbble',
       'drupal',
       'ebay',
       'envato',
       'facebook',
       'feedburner',
       'feedly',
       'flattr',
       'flickr',
       'foursquare',
       'friendfeed',
       'github',
       'goodreads',
       'google',
       'grooveshark',
       'houzz',
       'identica',
       'instagram',
       'lanyrd',
       'lastfm',
       'linkedin',
       'lookbook',
       'mail',
       'medium',
       'meetup',
       'myspace',
       'newsvine',
       'odnoklassniki',
       'outlook',
       'patreon',
       'paypal',
       'periscope',
       'persona',
       'pinterest',
       'play',
       'reddit',
       'rss',
       'skype',
       'slideshare',
       'smugmug',
       'snapchat',
       'soundcloud',
       'spotify',
       'stackoverflow',
       'steam',
       'stumbleupon',
       'swarm',
       'technorati',
       'telegram',
       'tripadvisor',
       'tripit',
       'triplej',
       'tumblr',
       'twitter',
       'viadeo',
       'vimeo',
       'vine',
       'vkontakte',
       'wikipedia',
       'windows',
       'wordpress',
       'xbox',
       'xing',
       'yahoo',
       'yammer',
       'yelp',
       'youtube',
       'zerply',
       'zynga'
	);

	/**
	 * Widget constructor.
	 */
	public function __construct() {
		parent::__construct(
			'zoom-social-icons-widget',
			esc_html__( 'Social Icons by WPZOOM', 'zoom-social-icons-widget' ),
			array(
				'classname'   => 'zoom-social-icons-widget',
				'description' => __( 'Sortable widget that supports more than 80+ social networks', 'zoom-social-icons-widget' ),
			)
		);

		$this->defaults = apply_filters( 'zoom-social-icons-widget-defaults', array(
			'title'             => esc_html__( 'Social Icons', 'zoom-social-icons-widget' ),
			'description'       => '',
			'show-icon-labels'  => false,
			'open-new-tab'      => true,
			'icon-style'        => 'with-canvas',
			'icon-canvas-style' => 'rounded',
			'fields'            => array(
				array(
					'url' => 'https://facebook.com/',
					'label' => __( 'Friend me on Facebook', 'zoom-social-icons-widget' )
				),
				array(
					'url' => 'https://twitter.com/',
					'label' => __( 'Follow Me', 'zoom-social-icons-widget' )
				)
			)
		) );

		$this->plugin_file = dirname( __FILE__ ) . '/social-icons-widget-by-wpzoom.php';

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'admin_print_footer_scripts', array( $this, 'admin_js_templates' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );

        add_action('siteorigin_panel_enqueue_admin_scripts', array($this, 'admin_scripts'));
        add_action('siteorigin_panel_enqueue_admin_scripts', array( $this, 'admin_js_templates'));


	}

	/**
	 * Script & styles for back-end widget form.
	 */
	public function admin_scripts() {
		wp_enqueue_script( 'zoom-social-icons-widget', plugin_dir_url( $this->plugin_file ) . 'social-icons-widget.js', array( 'jquery', 'jquery-ui-sortable' ), '20150203' );
		wp_enqueue_style( 'socicon', plugin_dir_url( $this->plugin_file ) . 'css/socicon.css', array(), '20150204' );
		wp_enqueue_style( 'social-icons-widget-admin', plugin_dir_url( $this->plugin_file ) . 'css/social-icons-widget-admin.css', array( 'socicon' ), '20150206' );
	}

	/**
	 * JavaScript templates for back-end widget form.
	 */
	public function admin_js_templates() {
		?>

		<script type="text/html" id="tmpl-zoom-social-icons-field"><?php $this->list_field_template(); ?></script>

		<?php
	}

	/**
	 * Scripts & styles for front-end display of widget.
	 */
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

		$class_list = array();
		$class_list[] = 'zoom-social-icons-list--' . $instance['icon-style'];
		$class_list[] = 'zoom-social-icons-list--' . $instance['icon-canvas-style'];

		if ( ! $instance['show-icon-labels'] ) {
			$class_list[] = 'zoom-social-icons-list--no-labels';
		}
		?>

		<?php if ( ! empty( $instance['description'] ) ) : ?>

			<p><?php echo $instance['description']; ?></p>

		<?php endif; ?>

		<ul class="zoom-social-icons-list <?php echo esc_attr( implode(' ', $class_list) ); ?>">

			<?php foreach ( $instance['fields'] as $field ) : ?>

				<li class="zoom-social_icons-list__item">
					<a class="zoom-social_icons-list__link" href="<?php echo esc_url( $field['url'] ); ?>" <?php echo ( $instance['open-new-tab'] ? 'target="_blank"' : '' ); ?>>
						<span class="socicon socicon-<?php echo esc_attr( $this->get_icon( $field['url'] ) ); ?>"></span>

						<?php if ( $instance['show-icon-labels'] ) : ?>
							<span class="zoom-social_icons-list__label"><?php echo esc_html( $field['label'] ); ?></span>
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

		$instance['description'] = balanceTags( wp_kses( $new_instance['description'], wp_kses_allowed_html() ), true );

		$instance['show-icon-labels'] = (bool) $new_instance['show-icon-labels'];
		$instance['open-new-tab']     = (bool) $new_instance['open-new-tab'];

		$instance['icon-style'] = $this->defaults['icon-style'];
		if ( in_array( $new_instance['icon-style'], array( 'with-canvas', 'without-canvas' ) ) ) {
			$instance['icon-style'] = $new_instance['icon-style'];
		}

		$instance['icon-canvas-style'] = $this->defaults['icon-canvas-style'];
		if ( in_array( $new_instance['icon-canvas-style'], array( 'rounded', 'round', 'square' ) ) ) {
			$instance['icon-canvas-style'] = $new_instance['icon-canvas-style'];
		}

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
			<label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'Description:', 'zoom-social-icons-widget' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" cols="20" rows="3"><?php echo esc_attr( $instance['description'] ); ?></textarea>
			<small><?php _e( 'Short description to be displayed right above the icons. Basic HTML allowed.', 'zoom-social-icons-widget' ); ?></small>
		</p>

		<p>
            <input type="hidden" name="<?php echo $this->get_field_name( 'show-icon-labels' ); ?>" value="0"/>
			<input class="checkbox zoom-social-icons-show-icon-labels" type="checkbox" <?php checked( $instance['show-icon-labels'] ); ?> id="<?php echo $this->get_field_id( 'show-icon-labels' ); ?>" name="<?php echo $this->get_field_name( 'show-icon-labels' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show-icon-labels' ); ?>"><?php _e('Show icon labels? ', 'zoom-social-icons-widget'); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance['open-new-tab'] ); ?> id="<?php echo $this->get_field_id( 'open-new-tab' ); ?>" name="<?php echo $this->get_field_name( 'open-new-tab' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'open-new-tab' ); ?>"><?php _e('Open links in new tab? ', 'zoom-social-icons-widget'); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon-style' ); ?>"><?php _e( 'Icon Style:', 'zoom-social-icons-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'icon-style' ); ?>" id="<?php echo $this->get_field_id( 'icon-style' ); ?>" class="widefat">
				<option value="with-canvas"<?php selected( $instance['icon-style'], 'with-canvas' ); ?>><?php esc_html_e( 'Color Background / White Icon', 'zoom-social-icons-widget' ); ?></option>
				<option value="without-canvas"<?php selected( $instance['icon-style'], 'without-canvas' ); ?>><?php esc_html_e( 'Color Icon / No Background', 'zoom-social-icons-widget' ); ?></option>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'icon-canvas-style' ); ?>"><?php _e( 'Icon Background Style:', 'zoom-social-icons-widget' ); ?></label>
			<select name="<?php echo $this->get_field_name( 'icon-canvas-style' ); ?>" id="<?php echo $this->get_field_id( 'icon-canvas-style' ); ?>" class="widefat">
				<option value="rounded"<?php selected( $instance['icon-canvas-style'], 'rounded' ); ?>><?php esc_html_e( 'Rounded Corners', 'zoom-social-icons-widget' ); ?></option>
				<option value="round"<?php selected( $instance['icon-canvas-style'], 'round' ); ?>><?php esc_html_e( 'Round', 'zoom-social-icons-widget' ); ?></option>
				<option value="square"<?php selected( $instance['icon-canvas-style'], 'square' ); ?>><?php esc_html_e( 'Square', 'zoom-social-icons-widget' ); ?></option>
			</select>
		</p>

		<p>
			<small>
				<?php echo wp_kses_post( __( 'Icon Background Style has no effect on <i>Color Icon / No Background</i> icon style.', 'zoom-social-icons-widget' ) ); ?>
			</small>
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

		<p>
            <small>
                <?php echo wp_kses_post( __( 'To add an icon with an email address, use the <strong><em>mailto:mail@example.com</em></strong> format.', 'zoom-social-icons-widget' ) ); ?>
            </small>
        </p>

        <p>
			<small>
				<?php echo wp_kses_post( __( 'Note that icons above is not how they will look on front-end. This is just for reference.', 'zoom-social-icons-widget' ) ); ?>
			</small>
		</p>

		<?php
	}

	/**
	 * Generates template for field item, used for widget options in wp-admin directly and by javascript.
	 *
	 * @param array $args Template arguments
	 */
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

	/**
	 * Returns an icon identifier for given website url.
	 *
	 * @param $url string Profile URL
	 *
	 * @return string icon id that matches given url
	 */

    protected function get_icon($url)
    {
        $icon = '';

        $parsed_url = $this->extract_domain($url);

        if ($url) {
            if (strstr($url, 'feedburner.google.com')
                or strstr($url, 'mailto:')
            ) {
                $icon = 'mail';
            }

            if (strstr($url, 'feedburner.com')) {
                $icon = 'rss';
            }

            if (!$icon) {
                foreach ($this->icons as $icon_id) {
                    if (strstr($parsed_url, $icon_id)) {
                        $icon = $icon_id;
                        break;
                    }
                }
            }
        }

        return apply_filters('zoom-social-icons-widget-icon', $icon, $url);
    }

    public function extract_domain($url)
    {
        $parsed_url = parse_url(trim($url));
        $path = empty($parsed_url['path']) ? array($url) : explode('/', $parsed_url['path'], 2);
        return empty($parsed_url['host']) ? array_shift($path) : $parsed_url['host'];
    }


}

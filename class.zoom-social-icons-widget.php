<?php

class Zoom_Social_Icons_Widget extends WP_Widget
{

    /**
     * @var string Path to plugin file.
     */
    protected $plugin_file;


    /**
     * @var array $icons
     * Collection of icon kits including socicon, dashicons, fontawesome and genericons
     */
    protected $icons = null;


	/**
     * Settings from database.
	 *
     * @var array
	 */
    protected $settings = [];

    /**
     * @var array protocols that are allowed in esc_url validation function.
     */
    protected $protocols = array(
        'skype',
        'tg',
        'viber',
        'http',
        'https',
        'mailto',
        'news',
        'irc',
        'feed',
        'tel',
        'fax',
        'mms',
        'xmpp'
    );

    /**
     * Zoom_Social_Icons_Widget constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'zoom-social-icons-widget',
            esc_html__('Social Icons by WPZOOM', 'zoom-social-icons-widget'),
            array(
                'classname' => 'zoom-social-icons-widget',
                'description' => __('Sortable widget that supports more than 80+ social networks', 'zoom-social-icons-widget'),
            )
        );

	    add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );


        $this->icons = include WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'icons-data.php';
	    $removed_keys = ['fab', 'fas', 'far'];
	    $this->icons = array_diff_key($this->icons, array_flip($removed_keys));
        $this->icons = apply_filters('zoom_social_icons_filter', $this->icons);
        $this->protocols = apply_filters('zoom_social_protocols_filter', $this->protocols);

        $this->plugin_file = dirname(__FILE__) . '/social-icons-widget-by-wpzoom.php';

        add_action('current_screen', array($this, 'check_current_screen'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));

        //Hooks to enqueue javascript file in SiteOrigin builder.
        add_action('siteorigin_panel_enqueue_admin_scripts', array($this, 'admin_scripts'));
        add_action('siteorigin_panel_enqueue_admin_scripts', array($this, 'admin_js_templates'));

        // Hooks to enqueue javascript for beaver builder.
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts_for_beaver'));
        add_action('wp_footer', array($this, 'admin_js_templates_for_beaver'));

        // Hooks to enqueue admin scripts in Elementor
	    add_action( 'elementor/editor/before_enqueue_scripts', function() {
		    $this->admin_scripts();
		    $this->admin_js_templates();
	    } );

    }

	function admin_js_templates_for_beaver()
    {
        if ((class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active())) {
            $this->admin_js_templates();
        }
    }

    function enqueue_scripts_for_beaver()
    {

        if (!(class_exists('FLBuilderModel') && FLBuilderModel::is_builder_active())) {
            return;
        }

        wp_enqueue_style(
            'social-icons-widget-admin',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/social-icons-widget-admin.css',
            array('wpzoom-social-icons-socicon'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/social-icons-widget-admin.css')
        );

        wp_enqueue_style('wp-color-picker');

        wp_enqueue_script(
            'iris',
            admin_url('js/iris.min.js'),
            array(
                'jquery-ui-draggable',
                'jquery-ui-slider',
                'jquery-touch-punch'
            ),
            false,
            1
        );

        wp_enqueue_script(
            'wp-color-picker',
            admin_url('js/color-picker.min.js'),
            array('iris'),
            false,
            1
        );

        $colorpicker_l10n = array(
            'clear' => __('Clear'),
            'defaultString' => __('Default'),
            'pick' => __('Select Color'),
            'current' => __('Current Color'),
        );
        wp_localize_script(
            'wp-color-picker',
            'wpColorPickerL10n',
            $colorpicker_l10n
        );


        wp_enqueue_media();

        wp_enqueue_script(
            'zoom-social-icons-widget-vue-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/vue.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/vue.min.js'),
            true
        );

        wp_enqueue_script(
            'zoom-social-icons-widget-sortable-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/sortable.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/sortable.min.js'),
            true
        );

        wp_enqueue_script(
            'zoom-social-icons-widget-vue-sortable-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/vue-sortable.js',
            array('zoom-social-icons-widget-sortable-js'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/vue-sortable.js'),
            true
        );

        wp_enqueue_script(
            'zoom-social-icons-widget-uri-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/URI.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/URI.min.js'),
            true
        );

        wp_enqueue_script(
            'zoom-social-icons-widget-scroll-to',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/jquery.scrollTo.min.js',
            array('jquery'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/jquery.scrollTo.min.js'),
            true
        );

        wp_enqueue_script(
            'zoom-social-icons-widget',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-widget-backend.js',
            array(
                'jquery',
                'underscore',
                'wp-util',
                'wp-color-picker'
            ),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-widget-backend.js'),
            true
        );

        wp_localize_script('zoom-social-icons-widget', 'zoom_social_widget_data', array(
            'icons' => $this->get_icons_pack(),
            'categories' => $this->get_icon_categories()
        ));

    }

    /**
     * Enqueue admin javascript only on widgets and customizer pages.
     */
	public function check_current_screen() {
		$current_screen = get_current_screen();

		if ( ! empty( $current_screen->id ) &&
		     ( $current_screen->id === 'widgets' ||
		       $current_screen->id === 'appearance_page_gutenberg-widgets' ||
		       $current_screen->id === 'customize' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
			add_action( 'admin_print_footer_scripts', array( $this, 'admin_js_templates' ) );
		}
	}

    /**
     * JavaScript templates for back-end widget form.
     */
    public function admin_js_templates()
    {
        ?>
        <script type="text/x-template" id="tmpl-zoom-social-modal"><?php $this->get_modal_template(); ?></script>
        <?php
    }

    /**
     * Modal template render function.
     */
    public function get_modal_template()
    {
        ?>
        <div class="modal-mask">
            <div class="media-modal wp-core-ui zoom-social-modal-wrapper">
                <button type="button" class="media-modal-close" @click="$emit('close')"><span
                            class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span>
                </button>
                <div class="media-modal-content" ref="mediaModal">

                    <div class="zoom-social-modal-title">
                        <slot name="header">
                            <h3><?php _e('Select Icon', 'zoom-social-icons-widget') ?></h3>
                        </slot>
                    </div>

                    <div class="zoom-social-modal-content">
                        <slot name="body">

                            <div class="zoom-social-modal-form">
                                <div class="form-group">
                                    <div class="wrap-label">
                                        <label><?php _e('Choose icon color', 'zoom-social-icons-widget') ?></label>

                                    </div>
                                    <div class="wrap-input wrap-input-color-picker">
                                        <input type="text" class="zoom-social-icons__field-color-picker"
                                               name="zoom-social-icons__field-color-picker"
                                               v-model="modal_color_picker" :value="modal_color_picker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-label">
                                        <label><?php _e('Choose hover color', 'zoom-social-icons-widget') ?></label>

                                    </div>
                                    <div class="wrap-input wrap-input-color-picker-hover">
                                        <input type="text" class="zoom-social-icons__field-color-picker"
                                               name="zoom-social-icons__field-color-picker-hover"
                                               v-model="modal_color_picker_hover" :value="modal_color_picker_hover">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="wrap-label">
                                        <label><?php _e('Select Icon Kit', 'zoom-social-icons-widget') ?></label>
                                    </div>
                                    <div class="wrap-input">
                                        <select v-model='modal_icon_kit' class="zoom-social-icons__field-icon-kit"
                                                name="zoom-social-icons__field-icon-kit">
	                                        <?php $icons_kits = zoom_social_icons_kits_categories_list();
	                                        foreach ( $icons_kits as $icon_kit ): ?>
                                                <option value="<?php echo $icon_kit['value'] ?>"><?php echo $icon_kit['label'] ?></option>
	                                        <?php endforeach; ?>
                                        </select>
                                        <select v-model="modal_icon_kit_category">
                                            <option v-for="cat in getIconCategories" :value="cat">{{cat | spacify |
                                                capitalize }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class='modal-icons-wrapper'>
                                    <template v-for="(icons_kit, icon_type) in filterBySocicons">
                                        <p v-show="searchIconsLength && icons_kit.length ">{{ icon_type | humanizeIconType | capitalize }}</p>
                                        <div
                                                v-show=" modal_icon_kit == icon_type || searchIconsLength && icons_kit.length "
                                                class="icon-kit" :class="[icon_type+'-wrapper']">
                                            <span
                                                    :style="normalizeStyle(icon.icon, icon_type)"
                                                    :data-icon="icon.icon"
                                                    :data-kit="icon_type"
                                                    @click="clickOnIcon"
                                                    @mouseover="overOnIcon"
                                                    @mouseleave="leaveOnIcon"
                                                    v-for="(icon, icon_key) in icons_kit"
                                                    :class='["zoom-social-icons__single-element social-icon" ,icon_type , icon_type+"-"+icon.icon, icon_canvas_style, {selected : icon.icon === modal_icon && icon_type === modal_icon_kit }]'
                                            ></span>
                                        </div>
                                    </template>
                                </div>


                                <input type="hidden" v-model="modal_icon" name="zoom-social-icons__field-icon"
                                       class="zoom-social-icons__field-icon"/>
                            </div>
                        </slot>
                    </div>

                    <div class="zoom-social-modal-toolbar">
                        <slot name="footer">
                            <input class="search-action-input" style="width: 50%; float: left;" type="text"
                                   v-model='searchIcons' placeholder="Type to search icon"/>
                            <a href='#' class="button-primary zoom-social-modal-save-btn" @click.prevent="saveModal">Save</a>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * Included styles and js files in the backend part.
     */
    public function admin_scripts()
    {

        wp_enqueue_style(
            'wpzoom-social-icons-socicon',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-socicon.css',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-socicon.css')
        );

	    wp_enqueue_style(
		    'wpzoom-social-icons-styles',
		    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-social-icons-styles.css',
		    array(),
		    filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-social-icons-styles.css')
	    );

        wp_enqueue_style(
            'wpzoom-social-icons-admin',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/social-icons-widget-admin.css',
            array('wpzoom-social-icons-socicon'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/social-icons-widget-admin.css')

        );

        wp_enqueue_style(
            'wpzoom-social-icons-genericons',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/genericons.css',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/genericons.css')

        );

        wp_enqueue_style(
            'wpzoom-social-icons-academicons',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/academicons.min.css',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/academicons.min.css')

        );

        wp_enqueue_style(
            'wpzoom-social-icons-fontawesome-3',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/font-awesome-3.min.css',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/font-awesome-3.min.css')

        );

        wp_enqueue_style('dashicons');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();

        wp_enqueue_script(
            'wpzoom-social-icons-vue-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/vue.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/vue.min.js'),
            true
        );

        wp_enqueue_script(
            'wpzoom-social-icons-sortable-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/sortable.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/sortable.min.js'),
            true
        );

        wp_enqueue_script(
            'wpzoom-social-icons-vue-sortable-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/vue-sortable.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/vue-sortable.js'),
            true
        );

        wp_enqueue_script(
            'wpzoom-social-icons-uri-js',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/URI.min.js',
            array(),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/URI.min.js'),
            true
        );

        wp_enqueue_script(
            'wpzoom-social-icons-scroll-to',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/jquery.scrollTo.min.js',
            array('jquery'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/jquery.scrollTo.min.js'),
            true
        );

        wp_enqueue_script(
            'wpzoom-social-icons-widget',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-widget-backend.js',
            array('jquery', 'underscore', 'wp-util', 'wp-color-picker'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-widget-backend.js'),
            true
        );

        wp_localize_script(
            'wpzoom-social-icons-widget',
            'zoom_social_widget_data',
            [
                'icons' => $this->get_icons_pack(),
                'categories' => $this->get_icon_categories()
            ]
        );

    }

    /**
     * Get icons pack by its name by default return all packs.
     *
     * @param string $type
     *
     * @return array
     */
    public function get_icons_pack($type = 'all')
    {

        return array_key_exists($type, $this->icons) ? $this->icons[$type] : $this->icons;
    }

    /**
     * Get icons pack categories.
     *
     * @return array
     */
    public function get_icon_categories()
    {
        return apply_filters('zoom_social_icons_get_icon_categories',
            array(
                'socicon' =>
                    array(
                        'all',
                        'audio',
                        'blogging',
                        'communication',
                        'design',
                        'ecommerce',
                        'games',
                        'learning',
                        'music',
                        'news',
                        'payment',
                        'photography',
                        'programming',
                        'search-engines',
                        'social-media',
                        'software',
                        'travel',
                        'video',
                        'web-tools'
                    ),
                'dashicons' =>
                    array(
                        'all',
                        'admin-menu',
                        'image-editing',
                        'media',
                        'misc',
                        'notifications',
                        'post-formats',
                        'posts-screen',
                        'products',
                        'social',
                        'sorting',
                        'taxonomies',
                        'tinymce',
                        'welcome-screen',
                        'widgets',
                        'wordpress-specific'
                    ),
                'genericon' =>
                    array(
                        'all',
                    ),
                'academicons' =>
                    array(
                        'all',
                    ),
                'fa' =>
                    array(
                        'accessibility',
                        'all',
                        'brand',
                        'chart',
                        'currency',
                        'directional',
                        'file-type',
                        'form-control',
                        'gender',
                        'hand',
                        'medical',
                        'payment',
                        'spinner',
                        'text-editor',
                        'transportation',
                        'video-player',
                        'web-application',
                    )
            ));
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
    public function update($new_instance, $old_instance)
    {

        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['description'] = balanceTags(wp_kses($new_instance['description'], wp_kses_allowed_html()), true);
        $instance['show_icon_labels'] = (!empty($new_instance['show_icon_labels']) && $new_instance['show_icon_labels'] === 'true') ? 'true' : 'false';
        $instance['open_new_tab'] = (!empty($new_instance['open_new_tab']) && $new_instance['open_new_tab'] === 'true') ? 'true' : 'false';
        $instance['no_follow'] = (!empty($new_instance['no_follow']) && $new_instance['no_follow'] === 'true') ? 'true' : 'false';
        $instance['no_opener'] = (!empty($new_instance['no_opener']) && $new_instance['no_opener'] === 'true') ? 'true' : 'false';
        $instance['no_referrer'] = (!empty($new_instance['no_referrer']) && $new_instance['no_referrer'] === 'true') ? 'true' : 'false';
        $instance['icon_padding_size'] = (int)$new_instance['icon_padding_size'];
        $instance['icon_font_size'] = (int)$new_instance['icon_font_size'];
        $instance['global_color_picker'] = $new_instance['global_color_picker'];
        $instance['global_color_picker_hover'] = $new_instance['global_color_picker_hover'];

        if (in_array($new_instance['icon_style'], array('with-canvas', 'without-canvas'))) {
            $instance['icon_style'] = $new_instance['icon_style'];
        }

        if (in_array($new_instance['icon_alignment'], array('left', 'center', 'right', 'none'))) {
            $instance['icon_alignment'] = $new_instance['icon_alignment'];
        }

        if (in_array($new_instance['icon_canvas_style'], array('round', 'rounded', 'square'))) {
            $instance['icon_canvas_style'] = $new_instance['icon_canvas_style'];
        }

        $field_count = empty($new_instance['url_fields']) ? 0 : count($new_instance['url_fields']);

        $instance['fields'] = array();

        for ($i = 0; $i < $field_count; $i++) {
            $url = esc_url($new_instance['url_fields'][$i], $this->protocols);
            $label = esc_html($new_instance['label_fields'][$i]);

            if ($url) {
                $instance['fields'][] = array(
                    'url' => $url,
                    'label' => $label,
                    'icon' => $new_instance['icon_fields'][$i],
                    'icon_kit' => $new_instance['icon_kit_fields'][$i],
                    'color_picker' => $new_instance['color_picker_fields'][$i],
                    'color_picker_hover' => $new_instance['color_picker_hover_fields'][$i],
                    'aria_label' => !empty($new_instance['aria_label_fields'][$i]) ? $new_instance['aria_label_fields'][$i] : '',
                    // 'is_rel_me'          => ( ! empty( $new_instance['is_rel_me_fields'][ $i ] ) && $new_instance['is_rel_me_fields'][ $i ] === 'true' ) ? 'true' : 'false'
                );
            }

            /**
             * Register strings for translation.
             */
            if (function_exists('icl_register_string')) {
                icl_register_string('zoom-social-icons-widget', 'url-' . $i, $url);
            }
        }

        return $instance;
    }

    /**
     * Render wigdet form in the backend.
     *
     * @param array $instance
     *
     * @return void
     */
    public function form($instance)
    {
        $defaults = $this->get_defaults();

        if (isset($instance['show-icon-labels']) or
            isset($instance['open-new-tab']) or
            isset($instance['no-follow'])
        ) {
            $instance['show-icon-labels'] = !empty($instance['show-icon-labels']) ? "true" : "false";
            $instance['open-new-tab'] = !empty($instance['open-new-tab']) ? "true" : "false";
            $instance['no-follow'] = !empty($instance['no-follow']) ? "true" : "false";
        }

        $instance = $this->normalize_data_array($instance);
        $instance = wp_parse_args($instance, $defaults);

        $this->inject_values($instance);

        $instance['fields'] = $this->inject_fields_with_data($instance['fields']);

        $instance_attr = '';
        $default_field = $this->inject_fields_with_data($this->get_default_field());
        $default_field = array_pop($default_field);

        if (!empty($instance)) {
            $encoded = array(
                'id' => $this->id,
                'instance' => $instance,
                'default_field' => $default_field
            );

            $instance_attr = 'data-instance="' . htmlentities(json_encode($encoded)) . '"';
        }

        ?>
        <div class="form-instance" <?php echo $instance_attr ?> id="<?php echo $this->id ?>">
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'zoom-social-icons-widget'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" v-model="title"
                       name="<?php echo $this->get_field_name('title'); ?>" type="text"/>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id('description'); ?>"><?php esc_html_e('Text above icons:', 'zoom-social-icons-widget'); ?></label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                          name="<?php echo $this->get_field_name('description'); ?>" cols="20" v-model="description"
                          rows="3"></textarea>
            </p>

            <p class="description"><?php _e('You can add here a text above the icons. Basic HTML allowed.', 'zoom-social-icons-widget'); ?></p>


            <p>
                <input class="checkbox zoom-social-icons-show-icon-labels"
                       type="checkbox"
                       v-model="show_icon_labels"
                       :true-value="'true'"
                       :false-value="'false'"
                       :value="show_icon_labels"
                       id="<?php echo $this->get_field_id('show_icon_labels'); ?>"
                       name="<?php echo $this->get_field_name('show_icon_labels'); ?>"/>
                <label
                        for="<?php echo $this->get_field_id('show_icon_labels'); ?>"><?php _e('Show icon labels? ', 'zoom-social-icons-widget'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox"
                       v-model="open_new_tab"
                       :true-value="'true'"
                       :false-value="'false'"
                       :value="open_new_tab"
                       id="<?php echo $this->get_field_id('open_new_tab'); ?>"
                       name="<?php echo $this->get_field_name('open_new_tab'); ?>"/>
                <label for="<?php echo $this->get_field_id('open_new_tab'); ?>"><?php _e('Open links in new tab? ', 'zoom-social-icons-widget'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox"
                       v-model="no_follow"
                       :true-value="'true'"
                       :false-value="'false'"
                       :value="no_follow"
                       id="<?php echo $this->get_field_id('no_follow'); ?>"
                       name="<?php echo $this->get_field_name('no_follow'); ?>"/>
                <label
                        for="<?php echo $this->get_field_id('no_follow'); ?>"><?php _e('Add <code>rel="nofollow"</code> to links', 'zoom-social-icons-widget'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox"
                       v-model="no_referrer"
                       :true-value="'true'"
                       :false-value="'false'"
                       :value="no_referrer"
                       id="<?php echo $this->get_field_id('no_referrer'); ?>"
                       name="<?php echo $this->get_field_name('no_referrer'); ?>"/>
                <label
                        for="<?php echo $this->get_field_id('no_referrer'); ?>"><?php _e('Add <code>rel="noreferrer"</code> to links', 'zoom-social-icons-widget'); ?></label>
            </p>

            <p>
                <input class="checkbox" type="checkbox"
                       v-model="no_opener"
                       :true-value="'true'"
                       :false-value="'false'"
                       :value="no_opener"
                       id="<?php echo $this->get_field_id('no_opener'); ?>"
                       name="<?php echo $this->get_field_name('no_opener'); ?>"/>
                <label
                        for="<?php echo $this->get_field_id('no_opener'); ?>"><?php _e('Add <code>rel="noopener"</code> to links', 'zoom-social-icons-widget'); ?></label>
            </p>

            <p class="description"><?php _e('Recommended if links or icons open in a new tab', 'zoom-social-icons-widget'); ?></p>


            <p>
                <label
                        for="<?php echo $this->get_field_id('icon_alignment'); ?>"><?php _e('Icons Alignment:', 'zoom-social-icons-widget'); ?>
                </label>
                <select name="<?php echo $this->get_field_name('icon_alignment'); ?>"
                        id="<?php echo $this->get_field_id('icon_alignment'); ?>"
                        v-model="icon_alignment"
                        class="widefat">
                    <option
                            value="none"><?php esc_html_e('None', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="left"><?php esc_html_e('Align Left', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="center"><?php esc_html_e('Align Center', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="right"><?php esc_html_e('Align Right', 'zoom-social-icons-widget'); ?></option>
                </select>
            </p>

            <p>
                <label
                        for="<?php echo $this->get_field_id('icon_style'); ?>"><?php _e('Icon Style:', 'zoom-social-icons-widget'); ?>
                </label>
                <select name="<?php echo $this->get_field_name('icon_style'); ?>"
                        id="<?php echo $this->get_field_id('icon_style'); ?>"
                        v-model="icon_style"
                        class="widefat">
                    <option
                            value="with-canvas"><?php esc_html_e('Color Background / White Icon', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="without-canvas"><?php esc_html_e('Color Icon / No Background', 'zoom-social-icons-widget'); ?></option>
                </select>
            </p>

            <p>
                <label
                        :style="iconCanvasStyleLabel()"
                        for="<?php echo $this->get_field_id('icon_canvas_style'); ?>"><?php _e('Icon Background Style:', 'zoom-social-icons-widget'); ?></label>
                <select
                        :disabled="this.icon_style == 'without-canvas'"
                        name="<?php echo $this->get_field_name('icon_canvas_style'); ?>"
                        id="<?php echo $this->get_field_id('icon_canvas_style'); ?>"
                        v-model="icon_canvas_style"
                        class="widefat zoom-social-icons-change-icon-canvas-style">
                    <option
                            value="round"><?php esc_html_e('Round', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="rounded"><?php esc_html_e('Rounded Corners', 'zoom-social-icons-widget'); ?></option>
                    <option
                            value="square"><?php esc_html_e('Square', 'zoom-social-icons-widget'); ?></option>
                </select>
            </p>

            <p class="description">
                <?php echo wp_kses_post(__('This option has no effect if <i>Color Icon / No Background</i> icon style is selected.', 'zoom-social-icons-widget')); ?>
            </p>

            <p>
                <label
                        for="<?php echo $this->get_field_id('icon_padding_size') ?>"><?php _e('Icon Padding (pixels):', 'zoom-social-icons-widget') ?>
                    <input type="number" min="0" max="200"
                           id="<?php echo $this->get_field_id('icon_padding_size') ?>"
                           name="<?php echo $this->get_field_name('icon_padding_size') ?>"
                           v-model="icon_padding_size"
                           class="widefat"/>
                </label>
            </p>

            <p>
                <label
                        for="<?php echo $this->get_field_id('icon_font_size') ?>"><?php _e('Icon Size (pixels):', 'zoom-social-icons-widget') ?>
                    <input type="number" min="0" max="200"
                           id="<?php echo $this->get_field_id('icon_font_size') ?>"
                           name="<?php echo $this->get_field_name('icon_font_size') ?>"
                           v-model="icon_font_size"
                           class="widefat"/>
                </label>
            </p>

            <p>
                <label><?php _e('Set color for all icons') ?></label>
            <div class="wrap-input-color-picker">
                <input
                        v-model="global_color_picker"
                        type="text"
                        class="zoom-social-icons__field-color-picker"
                        id="<?php echo $this->get_field_id('global_color_picker') ?>"
                        name="<?php echo $this->get_field_name('global_color_picker') ?>"
                        :value="global_color_picker"
                >
            </div>
            </p>
            <p>
                <label><?php _e('Set hover color for all icons') ?></label>
            <div class="wrap-input-color-picker">
                <input
                        v-model="global_color_picker_hover"
                        type="text"
                        class="zoom-social-icons__field-color-picker"
                        id="<?php echo $this->get_field_id('global_color_picker_hover') ?>"
                        name="<?php echo $this->get_field_name('global_color_picker_hover') ?>"
                        :value="global_color_picker_hover"
                >
            </div>
            </p>
            <p style="margin-bottom: 0;"><?php _e('Icons:', 'zoom-social-icons-widget'); ?></p>

            <div class="must-remove">
                <input type="hidden" value="<?php echo $defaults['title'] ?>"
                       id="<?php echo $this->get_field_id('title'); ?>"
                       name="<?php echo $this->get_field_name('title'); ?>"/>
                <input type="hidden" value="<?php echo $defaults['description'] ?>"
                       id="<?php echo $this->get_field_id('description'); ?>"
                       name="<?php echo $this->get_field_name('description'); ?>"/>
                <input type='hidden' value="<?php echo $defaults['open_new_tab'] ?>"
                       id="<?php echo $this->get_field_id('open_new_tab'); ?>"
                       name="<?php echo $this->get_field_name('open_new_tab'); ?>"/>
                <input type='hidden' value="<?php echo $defaults['icon_alignment'] ?>"
                       id="<?php echo $this->get_field_id('icon_alignment'); ?>"
                       name="<?php echo $this->get_field_name('icon_alignment'); ?>"/>
                <input type='hidden' value="<?php echo $defaults['no_follow'] ?>"
                       id="<?php echo $this->get_field_id('no_follow'); ?>"
                       name="<?php echo $this->get_field_name('no_follow'); ?>"/>
                <input type='hidden' value="<?php echo $defaults['no_opener'] ?>"
                       id="<?php echo $this->get_field_id('no_opener'); ?>"
                       name="<?php echo $this->get_field_name('no_opener'); ?>"/>
                <input type='hidden' value="<?php echo $defaults['no_referrer'] ?>"
                       id="<?php echo $this->get_field_id('no_referrer'); ?>"
                       name="<?php echo $this->get_field_name('no_referrer'); ?>"/>

                <input type='hidden' value="<?php echo $defaults['show_icon_labels'] ?>"
                       id="<?php echo $this->get_field_id('show_icon_labels'); ?>"
                       name="<?php echo $this->get_field_name('show_icon_labels'); ?>"/>
                <?php

                foreach ($instance['fields'] as $field) {
                    printf('<input  type="hidden" id="%1$s" name="%2$s"  value="%3$s">',
                        $field['url_field_id'],
                        $field['url_field_name'],
                        esc_attr($field['url'])
                    );

                    printf('<input type="hidden" id="%1$s" name="%2$s" value="%3$s">',
                        $field['label_field_id'],
                        $field['label_field_name'],
                        esc_attr($field['label'])
                    );

                    printf('<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
                        $field['color_picker_field_id'],
                        $field['color_picker_field_name'],
                        esc_attr($field['color_picker'])
                    );

                    printf('<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
                        $field['color_picker_hover_field_id'],
                        $field['color_picker_hover_field_name'],
                        esc_attr($field['color_picker_hover'])
                    );

                    printf('<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
                        $field['icon_field_id'],
                        $field['icon_field_name'],
                        esc_attr($field['icon'])
                    );

                    printf('<input type="hidden"   id="%1$s" name="%2$s" value="%3$s">',
                        $field['icon_kit_field_id'],
                        $field['icon_kit_field_name'],
                        esc_attr($field['icon_kit'])
                    );

                }
                ?>
            </div>

            <ul v-sortable="{ handle: '.zoom-social-icons__field-handle', onUpdate : onUpdate  }"
                class="zoom-social-icons__list"
                :class="{ 'zoom-social-icons__list--no-labels' : show_icon_labels !== 'true' }">

                <template v-for="(field, key) in fields">

                    <li class="zoom-social-icons__field">

                        <modal
                                ref="modals"
                                @input='onInputModal'
                                @keyup.esc.stop="closeModal(key)"
                                @close='closeModal(key)'
                                v-if='field.show_modal'
                                :field_key="key"
                                :icon="field.icon"
                                :icon_style="icon_style"
                                :icon_canvas_style="icon_canvas_style"
                                :icon_kit="field.icon_kit"
                                :color_picker="field.color_picker"
                                :color_picker_hover="field.color_picker_hover"
                                :icon_categories='icons.categories'
                                :icons="icons.icons">
                        </modal>

                        <span class="dashicons dashicons-sort zoom-social-icons__field-handle"></span>
                        <span class="zoom-social-icons__field-icon-handler social-icon"
                              :style="normalizeStyle(key)"
                              :class="[ field.icon_kit, field.icon_kit+'-'+field.icon, icon_canvas_style]"
                              @mouseover='mouseoverIcon(key, $event)'
                              @mouseleave='mouseleaveIcon(key, $event)'
                              @click.stop="clickonIconHandler(key)"></span>
                        <div class="zoom-social-icons__cw">
                            <div class="zoom-social-icons__inputs" ref="inputFields">

                                <input class="widefat zoom-social-icons__field-url"
                                       :id="field.url_field_id"
                                       :name="field.url_field_name"
                                       v-model="field.url"
                                       type="text"
                                       :value="field.url_field_name"
                                       @input="urlFieldNameHandler(key)"
                                       @keyup.enter.stop="insertField"
                                       placeholder="<?php _e('Start typing the URL...', 'zoom-social-icons-widget') ?>">
                                <input class="widefat zoom-social-icons__field-label"
                                       :id="field.label_field_id"
                                       :name="field.label_field_name"
                                       v-model="field.label"
                                       type="text"
                                       :value="field.label_field_name"
                                       placeholder="<?php _e('Label', 'zoom-social-icons-widget') ?>">
                                <input type="hidden"
                                       :id="field.color_picker_field_id"
                                       :name="field.color_picker_field_name"
                                       v-model='field.color_picker'
                                       :value="field.color_picker">
                                <input type="hidden"
                                       :id="field.color_picker_hover_field_id"
                                       :name="field.color_picker_hover_field_name"
                                       v-model='field.color_picker_hover'
                                       :value="field.color_picker_hover">
                                <input type="hidden"
                                       :id="field.icon_field_id"
                                       :name="field.icon_field_name"
                                       v-model="field.icon"
                                       :value="field.icon">
                                <input type="hidden"
                                       :id="field.icon_kit_field_id"
                                       :name="field.icon_kit_field_name"
                                       v-model="field.icon_kit"
                                       :value="field.icon_kit">
                            </div>
                        </div>


                        <a v-show='fields.length > 1' class="zoom-social-icons__field-trash" href="#"
                           @click.prevent="clickOnDeleteIconHandler(key)"><span
                                    class="dashicons dashicons-trash"></span></a>
                        <span :class="toggleExtraOptionsClass(key)"
                              @click.prevent='toggleExtraOptions(key, field)'></span>
                        <br style="clear:both">
                        <div class="extra-options" v-show="field.show_extra_options == true">
                            <p>
                                <label :for="field.aria_label_field_id">
                                    <?php _e('<code>"aria-label"</code> description', 'zoom-social-icons-widget'); ?>
                                    <input class="widefat"
                                           :id="field.aria_label_field_id"
                                           :name="field.aria_label_field_name" v-model="field.aria_label" type="text"
                                           :value="field.aria_label_field_name">
                                </label>
                            </p>

                            <p class="description">
                                <?php echo wp_kses_post(__('This is used to provide a description of this icon to screen reader users (for accessibility purposes).', 'zoom-social-icons-widget')); ?>
                            </p>

                            <?php /* <p>
								<input type="hidden"
								       :true-value="'true'"
								       :false-value="'false'"
								       :value="field.is_rel_me"
								       v-model="field.is_rel_me"
								       :name="field.is_rel_me_field_name"/>
								<input class="checkbox" type="checkbox"
								       v-model="field.is_rel_me"
								       :true-value="'true'"
								       :false-value="'false'"
								       :id="field.is_rel_me_field_id"
								       :value="field.is_rel_me"/>
								<label
									:for="field.is_rel_me_field_id"><?php _e( 'Add <code>rel="me"</code>?', 'zoom-social-icons-widget' ); ?></label>
							</p>
                            */ ?>

                        </div>
                    </li>

                </template>

            </ul>

            <div class="zoom-social-icons__add-button">
                <a @click.prevent='insertField'
                   class="button"><?php _e('Add more', 'zoom-social-icons-widget'); ?></a>
            </div>

            <p class="description">
                <?php echo wp_kses_post(__('To add an icon with an email address, use the <strong><em>mailto:mail@example.com</em></strong> format.', 'zoom-social-icons-widget')); ?>
            </p>

            <p class="description">
                <?php echo wp_kses_post(__('Note that icons above is not how they will look on front-end. This is just for reference.', 'zoom-social-icons-widget')); ?>
            </p>
        </div>
        <?php
    }

    /**
     * Get default values for the first render when nothing is saved in databases.
     *
     * @return array
     */
    public function get_defaults()
    {
        return apply_filters('zoom_social_icons_get_defaults', array(
                'title' => esc_html__('Follow us', 'zoom-social-icons-widget'),
                'description' => '',
                'show_icon_labels' => 'false',
                'open_new_tab' => 'true',
                'no_follow' => 'false',
                'no_opener' => 'false',
                'no_referrer' => 'false',
                'icon_style' => 'with-canvas',
                'icon_alignment' => 'none',
                'icon_canvas_style' => 'round',
                'icon_padding_size' => 8,
                'icon_font_size' => 18,
                'global_color_picker' => '#1e73be',
                'global_color_picker_hover' => '#1e73be',
                'fields' => array(
                    array(
                        'url' => 'https://facebook.com/',
                        'label' => 'Facebook',
                        'icon' => 'facebook',
                        'icon_kit' => 'socicon',
                        'color_picker' => '#1877F2',
                        'color_picker_hover' => '#1877F2',
                        'aria_label' => '',
                        // 'is_rel_me'          => 'false'
                    ),
                    array(
                        'url' => 'https://twitter.com/',
                        'label' => 'Twitter',
                        'icon' => 'twitter',
                        'icon_kit' => 'socicon',
                        'color_picker' => '#1da1f2',
                        'color_picker_hover' => '#1da1f2',
                        'aria_label' => '',
                        // 'is_rel_me'          => 'false'

                    ),
                    array(
                        'url' => 'https://instagram.com/',
                        'label' => 'Instagram',
                        'icon' => 'instagram',
                        'icon_kit' => 'socicon',
                        'color_picker' => '#e4405f',
                        'color_picker_hover' => '#e4405f',
                        'aria_label' => '',
                        // 'is_rel_me'          => 'false'
                    ),
                )
            )
        );
    }

    /**
     * Recursive function that replace kebab-case keys with snake_case keys for backward compatibility.
     *
     * @param $value
     *
     * @return array
     */
	public function normalize_data_array( $value ) {

		$collector = [];

		if ( empty( $value ) ) {
			return $collector;
		}

		foreach ( $value as $val_key => $val ) {
			if ( is_array( $val ) ) {
				$val = $this->normalize_data_array( $val );
			}
			$collector[ str_replace( '-', '_', $val_key ) ] = $val;
		}

		return $collector;
	}

    /**
     * It is a function for backward compatibility that normalize data values between old and new version
     * in order to work properly after users will make an update to the new version.
     *
     * @param $data
     */
    public function inject_values(&$data)
    {
        $socicons = wp_list_pluck($this->icons['socicon'], 'color', 'icon');
        foreach ($data['fields'] as &$field) {

            $get_icon = $this->get_icon($field['url']);
            $parsed_icon = empty($get_icon) ? 'wordpress' : $get_icon;

            if (empty($field['icon']) && empty($field['icon_kit'])) {
                $field['icon'] = $parsed_icon;
                $field['icon_kit'] = 'socicon';

                $field['color_picker'] = $socicons[$parsed_icon];
                $field['color_picker_hover'] = $socicons[$parsed_icon];
            }

            if (empty($field['color_picker']) or (strpos($field['color_picker'], 'rgb') !== false)) {

                $color = empty($field['color_picker']) ? $socicons[$parsed_icon] : $this->rgb2hex($field['color_picker']);
                $field['color_picker'] = $color;
                $field['color_picker_hover'] = $color;
            }

            if (empty($field['color_picker_hover'])) {
                $field['color_picker_hover'] = $field['color_picker'];
            }
        }
    }

    /**
     * Parse icon name from an url and return it.
     *
     * @param $url
     *
     * @return mixed|void
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
                $icons = wp_list_pluck($this->icons['socicon'], 'icon');
                foreach ($icons as $icon_id) {
                    if (strstr($parsed_url, $icon_id)) {
                        $icon = $icon_id;
                        break;
                    }
                }
            }
        }

        return apply_filters('zoom-social-icons-widget-icon', $icon, $url);
    }

    /**
     * Extract domain from an url.
     *
     * @param $url
     *
     * @return mixed
     */
    public function extract_domain($url)
    {
        $parsed_url = parse_url(trim($url));
        $path = empty($parsed_url['path']) ? array($url) : explode('/', $parsed_url['path'], 2);

        return empty($parsed_url['host']) ? array_shift($path) : $parsed_url['host'];
    }

    /**
     * Convert rgb string to hex string.
     *
     * @param $rgb
     *
     * @return string
     */
    function rgb2hex($rgb)
    {
        $rgb = $this->parse_rgb($rgb);

        return '#' . sprintf('%02x', $rgb['r']) . sprintf('%02x', $rgb['g']) . sprintf('%02x', $rgb['b']);
    }

    /**
     * Parse rgb string and covert its to an array.
     *
     * @param $rgb_string
     *
     * @return array
     */
    function parse_rgb($rgb_string)
    {
        $rgb = array('r' => 0, 'g' => 1, 'b' => 2);
        $exploded = explode(',', $rgb_string);
        foreach ($rgb as $key => &$value) {
            $value = filter_var($exploded[$value], FILTER_SANITIZE_NUMBER_INT);
        }

        return $rgb;
    }

    /**
     * Inject field with data in order to render the correct names ids and other html attributes in the template.
     *
     * @param $fields
     *
     * @return array
     */
    private function inject_fields_with_data($fields)
    {

        $merged_fields = array();

        $will_be_merged = array(
            'show_modal' => false,
            'show_extra_options' => false,
            'url_field_id' => $this->get_field_id('url_fields'),
            'url_field_name' => $this->get_field_name('url_fields') . '[]',
            'label_field_id' => $this->get_field_id('label_fields'),
            'label_field_name' => $this->get_field_name('label_fields') . '[]',
            'color_picker_field_id' => $this->get_field_id('color_picker_fields'),
            'color_picker_field_name' => $this->get_field_name('color_picker_fields') . '[]',
            'color_picker_hover_field_id' => $this->get_field_id('color_picker_hover_fields'),
            'color_picker_hover_field_name' => $this->get_field_name('color_picker_hover_fields') . '[]',
            'icon_field_id' => $this->get_field_id('icon_fields'),
            'icon_field_name' => $this->get_field_name('icon_fields') . '[]',
            'icon_kit_field_id' => $this->get_field_id('icon_kit_fields'),
            'icon_kit_field_name' => $this->get_field_name('icon_kit_fields') . '[]',
            'aria_label_field_id' => $this->get_field_id('aria_label_fields'),
            'aria_label_field_name' => $this->get_field_name('aria_label_fields') . '[]',
            // 'is_rel_me_field_id'            => $this->get_field_id( 'is_rel_me_fields' ),
            // 'is_rel_me_field_name'          => $this->get_field_name( 'is_rel_me_fields' ) . '[]'

        );

        foreach ($fields as $field) {
            $merged_fields[] = array_merge($field, $will_be_merged);
        }

        return $merged_fields;
    }

    /**
     * Get default field for a new added element.
     *
     * @return array
     */
    public function get_default_field()
    {
        return array(
            array(
                'url' => '',
                'label' => __('Default Label', 'zoom-social-icons-widget'),
                'icon' => 'wordpress',
                'icon_kit' => 'socicon',
                'color_picker' => '#1e73be',
                'color_picker_hover' => '#1e73be',
                // 'is_rel_me'          => 'false',
                'aria_label' => ''
            )
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        $instance = $this->normalize_data_array($instance);
        $instance = wp_parse_args((array)$instance, $this->get_defaults());

        $this->inject_values($instance);

        echo $args['before_widget'];

        if ($instance['title']) {

            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $class_list = array();
        $desc_class = '';
        $class_list[] = 'zoom-social-icons-list--' . $instance['icon_style'];
        $class_list[] = 'zoom-social-icons-list--' . $instance['icon_canvas_style'];

        if (!empty($instance['icon_alignment']) &&
            in_array($instance['icon_alignment'], array('left', 'center', 'right'))
        ) {
            $class_list[] = $desc_class = 'zoom-social-icons-list--align-' . $instance['icon_alignment'];
            $desc_class = "class='" . $desc_class . "'";
        }


        if (is_bool($instance['show_icon_labels'])) {
            $instance['show_icon_labels'] = $instance['show_icon_labels'] === true ? 'true' : 'false';
        }

        if (is_bool($instance['open_new_tab'])) {
            $instance['open_new_tab'] = $instance['open_new_tab'] === true ? 'true' : 'false';
        }

        if (is_bool($instance['no_follow'])) {
            $instance['no_follow'] = $instance['no_follow'] === true ? 'true' : 'false';
        }

        if (is_bool($instance['no_opener'])) {
            $instance['no_opener'] = $instance['no_opener'] === true ? 'true' : 'false';
        }

        if (is_bool($instance['no_referrer'])) {
            $instance['no_referrer'] = $instance['no_referrer'] === true ? 'true' : 'false';
        }

        if ($instance['show_icon_labels'] === 'false') {
            $class_list[] = 'zoom-social-icons-list--no-labels';
        }
        ?>

        <?php if (!empty($instance['description'])) : ?>

        <p <?php echo $desc_class; ?>><?php echo $instance['description']; ?></p>

    <?php endif; ?>

        <ul class="zoom-social-icons-list <?php echo esc_attr(implode(' ', $class_list)); ?>">

            <?php
            foreach ($instance['fields'] as $key => $field) : ?>

                <?php
                $rule = ($instance['icon_style'] === 'with-canvas') ? 'background-color' : 'color';
                $hover_style = empty($field['color_picker_hover']) ? '' : 'data-hover-rule="' . $rule . '" data-hover-color="' . $field['color_picker_hover'] . '"';
                $rel_tag = 'true' == $instance['no_follow'] ? 'nofollow' : '';
                $rel_tag .= 'true' == $instance['no_opener'] ? ' noopener' : '';
                $rel_tag .= 'true' == $instance['no_referrer'] ? ' noreferrer' : '';
                $aria_image_role = '';
                $url = esc_url($field['url'], $this->protocols);

                if (function_exists('icl_t')) {
                    $url = icl_t('zoom-social-icons-widget', 'url-' . $key, $field['url']);
                }

                if (!empty($field['aria_label'])) {
                    $aria_image_role = "role='img' aria-label='" . $field['aria_label'] . "'";
                }
                // if ( ! empty( $field['is_rel_me'] ) && $field['is_rel_me'] == 'true' ) {
                // 	$rel_tag .= " me";
                // }
                ?>
                <li class="zoom-social_icons-list__item">
                    <a class="zoom-social_icons-list__link"
                       href="<?php echo $url; ?>" <?php echo($instance['open_new_tab'] === 'true' ? 'target="_blank"' : ''); ?> <?php echo(strlen($rel_tag) > 0 ? 'rel="' . $rel_tag . '"' : ''); ?>>
                        <?php if (!empty($field['icon']) && !empty($field['icon_kit']) && !empty($field['color_picker'])) {
                            $class = $field['icon_kit'] . ' ' . $field['icon_kit'] . '-' . $field['icon'];
                            $style = $rule . ' : ' . $field['color_picker'];
                        } else {
                            $style = '';

                            $class = 'socicon socicon-' . esc_attr($this->get_icon($field['url']));
                        } ?>
                        <?php if (!empty($instance['icon_font_size'])) {
                            $style .= '; font-size: ' . $instance['icon_font_size'] . 'px';
                        } ?>
                        <?php if (!empty($instance['icon_padding_size'])) {
                            $style .= '; padding:' . $instance['icon_padding_size'] . 'px';
                        } ?>

                        <?php if ($instance['show_icon_labels'] === 'false') : ?>
                            <span class="screen-reader-text"><?php echo esc_html($field['icon']); ?></span>
                        <?php endif; ?>

                        <span class="zoom-social_icons-list-span social-icon <?php echo $class ?>" <?php echo $hover_style ?> style="<?php echo $style ?>" <?php echo $aria_image_role; ?>></span>

                        <?php
                        if ($instance['show_icon_labels'] === 'true') : ?>
                            <span class="zoom-social_icons-list__label"><?php echo esc_html($field['label']); ?></span>
                        <?php endif; ?>
                    </a>
                </li>

            <?php endforeach; ?>

        </ul>

        <?php

        echo $args['after_widget'];
    }

	/**
	 * Register scripts & styles.
	 */
	public function register_scripts()
	{
		wp_register_style(
			'wpzoom-social-icons-socicon',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-socicon.css',
			array(),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-socicon.css')
		);

		wp_register_style(
			'wpzoom-social-icons-styles',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-social-icons-styles.css',
			array(),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-social-icons-styles.css')
		);

		wp_register_style(
			'wpzoom-social-icons-genericons',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/genericons.css',
			array(),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/genericons.css')
		);

		wp_register_style(
			'wpzoom-social-icons-academicons',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/academicons.min.css',
			array(),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/academicons.min.css')
		);

		wp_register_style(
			'wpzoom-social-icons-font-awesome-3',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/font-awesome-3.min.css',
			array(),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/font-awesome-3.min.css')
		);

		wp_register_script(
			'zoom-social-icons-widget-frontend',
			WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-widget-frontend.js',
			array('jquery'),
			filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-widget-frontend.js'),
			true
		);
	}

	/**
     * Scripts & styles for front-end display of widget.
     */
    public function enqueue_scripts()
    {

	    if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-socicons') ) ) {
		    wp_enqueue_style(
			    'wpzoom-social-icons-socicon',
			    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-socicon.css',
			    array(),
			    filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-socicon.css' )
		    );
	    }


	    if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-genericons') ) ) {

		    wp_enqueue_style(
			    'wpzoom-social-icons-genericons',
			    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/genericons.css',
			    array(),
			    filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/genericons.css' )
		    );
	    }

	    if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-academicons') ) ) {

		    wp_enqueue_style(
			    'wpzoom-social-icons-academicons',
			    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/academicons.min.css',
			    array(),
			    filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/academicons.min.css' )
		    );
	    }

	    if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-font-awesome-3') ) ) {

		    wp_enqueue_style(
			    'wpzoom-social-icons-font-awesome-3',
			    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/font-awesome-3.min.css',
			    array(),
			    filemtime( WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/font-awesome-3.min.css' )
		    );
	    }

	    if ( !empty( WPZOOM_Social_Icons_Settings::get_option_key('disable-css-loading-for-dashicons') ) ) {

		    wp_enqueue_style( 'dashicons' );

	    }

	    wp_enqueue_style(
		    'wpzoom-social-icons-styles',
		    WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/css/wpzoom-social-icons-styles.css',
		    array(),
		    filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/css/wpzoom-social-icons-styles.css')
	    );

        wp_enqueue_script(
            'zoom-social-icons-widget-frontend',
            WPZOOM_SOCIAL_ICONS_PLUGIN_URL . 'assets/js/social-icons-widget-frontend.js',
            array('jquery'),
            filemtime(WPZOOM_SOCIAL_ICONS_PLUGIN_PATH . 'assets/js/social-icons-widget-frontend.js'),
            true
        );
    }

}
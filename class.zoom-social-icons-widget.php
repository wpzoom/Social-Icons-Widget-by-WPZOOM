<?php

class Zoom_Social_Icons_Widget extends WP_Widget
{
    /**
     * @var array Default widget options.
     */
    protected $defaults;

    /**
     * @var string Path to plugin file.
     */
    protected $plugin_file;

    /**
      * @var array protocols that are allowed in esc_url validation function.
      */
    protected $protocols = array('skype', 'viber', 'http', 'https', 'mailto', 'news', 'irc', 'feed', 'tel', 'fax', 'mms', 'xmpp');

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
        'bandcamp',
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
        'eyeem',
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
        'hellocoton',
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
        'viber',
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

    protected $genericicons = array(
        'standard',
        'aside',
        'image',
        'gallery',
        'video',
        'status',
        'quote',
        'link',
        'chat',
        'audio',
        'github',
        'dribbble',
        'twitter',
        'facebook',
        'facebook-alt',
        'wordpress',
        'googleplus',
        'googleplus-alt',
        'linkedin',
        'linkedin-alt',
        'pinterest',
        'pinterest-alt',
        'flickr',
        'vimeo',
        'youtube',
        'tumblr',
        'instagram',
        'codepen',
        'polldaddy',
        'path',
        'skype',
        'digg',
        'reddit',
        'stumbleupon',
        'pocket',
        'dropbox',
        'foursquare',
        'comment',
        'category',
        'tag',
        'time',
        'user',
        'day',
        'week',
        'month',
        'pinned',
        'search',
        'unzoom',
        'zoom',
        'show',
        'hide',
        'close',
        'close-alt',
        'trash',
        'star',
        'home',
        'mail',
        'edit',
        'reply',
        'feed',
        'warning',
        'share',
        'attachment',
        'location',
        'checkmark',
        'menu',
        'refresh',
        'minimize',
        'maximize',
        '404',
        'spam',
        'summary',
        'cloud',
        'key',
        'dot',
        'next',
        'previous',
        'expand',
        'collapse',
        'dropdown',
        'dropdown-left',
        'top',
        'draggable',
        'phone',
        'send-to-phone',
        'plugin',
        'cloud-download',
        'cloud-upload',
        'external',
        'document',
        'book',
        'cog',
        'unapprove',
        'cart',
        'pause',
        'stop',
        'skip-back',
        'skip-ahead',
        'play',
        'tablet',
        'send-to-tablet',
        'info',
        'notice',
        'help',
        'fastforward',
        'rewind',
        'portfolio',
        'heart',
        'code',
        'subscribe',
        'unsubscribe',
        'subscribed',
        'reply-alt',
        'reply-single',
        'flag',
        'print',
        'lock',
        'bold',
        'italic',
        'picture',
        'fullscreen',
        'website',
        'ellipsis',
        'uparrow',
        'rightarrow',
        'downarrow',
        'leftarrow',
        'xpost',
        'hierarchy',
        'paintbrush',
        'sitemap',
        'activity',
        'anchor',
        'bug',
        'download',
        'handset',
        'microphone',
        'minus',
        'move',
        'plus',
        'rating-empty',
        'rating-full',
        'rating-half',
        'shuffle',
        'spotify',
        'twitch',
        'videocamera',
    );

    protected $dashicons = array(
        'menu',
        'dashboard',
        'admin-site',
        'admin-media',
        'admin-page',
        'admin-comments',
        'admin-appearance',
        'admin-plugins',
        'admin-users',
        'admin-tools',
        'admin-settings',
        'admin-network',
        'admin-generic',
        'admin-home',
        'admin-collapse',
        'admin-links',
        'admin-post',
        'format-standard',
        'format-image',
        'format-gallery',
        'format-audio',
        'format-video',
        'format-links',
        'format-chat',
        'format-status',
        'format-aside',
        'format-quote',
        'welcome-write-blog',
        'welcome-edit-page',
        'welcome-add-page',
        'welcome-view-site',
        'welcome-widgets-menus',
        'welcome-comments',
        'welcome-learn-more',
        'image-crop',
        'image-rotate-left',
        'image-rotate-right',
        'image-flip-vertical',
        'image-flip-horizontal',
        'undo',
        'redo',
        'editor-bold',
        'editor-italic',
        'editor-ul',
        'editor-ol',
        'editor-quote',
        'editor-alignleft',
        'editor-aligncenter',
        'editor-alignright',
        'editor-insertmore',
        'editor-spellcheck',
        'editor-distractionfree',
        'editor-expand',
        'editor-contract',
        'editor-kitchensink',
        'editor-underline',
        'editor-justify',
        'editor-textcolor',
        'editor-paste-word',
        'editor-paste-text',
        'editor-removeformatting',
        'editor-video',
        'editor-customchar',
        'editor-outdent',
        'editor-indent',
        'editor-help',
        'editor-strikethrough',
        'editor-unlink',
        'editor-rtl',
        'editor-break',
        'editor-code',
        'editor-paragraph',
        'align-left',
        'align-right',
        'align-center',
        'align-none',
        'lock',
        'calendar',
        'visibility',
        'post-status',
        'edit',
        'post-trash',
        'trash',
        'external',
        'arrow-up',
        'arrow-down',
        'arrow-left',
        'arrow-right',
        'arrow-up-alt',
        'arrow-down-alt',
        'arrow-left-alt',
        'arrow-right-alt',
        'arrow-up-alt2',
        'arrow-down-alt2',
        'arrow-left-alt2',
        'arrow-right-alt2',
        'leftright',
        'sort',
        'randomize',
        'list-view',
        'exerpt-view',
        'hammer',
        'art',
        'migrate',
        'performance',
        'universal-access',
        'universal-access-alt',
        'tickets',
        'nametag',
        'clipboard',
        'heart',
        'megaphone',
        'schedule',
        'wordpress',
        'wordpress-alt',
        'pressthis',
        'update',
        'screenoptions',
        'info',
        'cart',
        'feedback',
        'cloud',
        'translation',
        'tag',
        'category',
        'archive',
        'tagcloud',
        'text',
        'media-archive',
        'media-audio',
        'media-code',
        'media-default',
        'media-document',
        'media-interactive',
        'media-spreadsheet',
        'media-text',
        'media-video',
        'playlist-audio',
        'playlist-video',
        'yes',
        'no',
        'no-alt',
        'plus',
        'plus-alt',
        'minus',
        'dismiss',
        'marker',
        'star-filled',
        'star-half',
        'star-empty',
        'flag',
        'share',
        'share1',
        'share-alt',
        'share-alt2',
        'twitter',
        'rss',
        'email',
        'email-alt',
        'facebook',
        'facebook-alt',
        'networking',
        'googleplus',
        'location',
        'location-alt',
        'camera',
        'images-alt',
        'images-alt2',
        'video-alt',
        'video-alt2',
        'video-alt3',
        'vault',
        'shield',
        'shield-alt',
        'sos',
        'search',
        'slides',
        'analytics',
        'chart-pie',
        'chart-bar',
        'chart-line',
        'chart-area',
        'groups',
        'businessman',
        'id',
        'id-alt',
        'products',
        'awards',
        'forms',
        'testimonial',
        'portfolio',
        'book',
        'book-alt',
        'download',
        'upload',
        'backup',
        'clock',
        'lightbulb',
        'microphone',
        'desktop',
        'tablet',
        'smartphone',
        'smiley'
    );

    protected $font_awesome = array (
        'bandcamp',
        'address-book',
        'etsy',
        'linode',
        'quora',
        'bath',
        'meetup',
        'envelope-open',
        'telegram',
        'imdb',
        'glass',
        'music',
        'search',
        'envelope-o',
        'heart',
        'star',
        'star-o',
        'user',
        'film',
        'th-large',
        'th',
        'th-list',
        'check',
        'times',
        'search-plus',
        'search-minus',
        'power-off',
        'signal',
        'cog',
        'trash-o',
        'home',
        'file-o',
        'clock-o',
        'road',
        'download',
        'arrow-circle-o-down',
        'arrow-circle-o-up',
        'inbox',
        'play-circle-o',
        'repeat',
        'refresh',
        'list-alt',
        'lock',
        'flag',
        'headphones',
        'volume-off',
        'volume-down',
        'volume-up',
        'qrcode',
        'barcode',
        'tag',
        'tags',
        'book',
        'bookmark',
        'print',
        'camera',
        'font',
        'bold',
        'italic',
        'text-height',
        'text-width',
        'align-left',
        'align-center',
        'align-right',
        'align-justify',
        'list',
        'outdent',
        'indent',
        'video-camera',
        'picture-o',
        'pencil',
        'map-marker',
        'adjust',
        'tint',
        'pencil-square-o',
        'share-square-o',
        'check-square-o',
        'arrows',
        'step-backward',
        'fast-backward',
        'backward',
        'play',
        'pause',
        'stop',
        'forward',
        'fast-forward',
        'step-forward',
        'eject',
        'chevron-left',
        'chevron-right',
        'plus-circle',
        'minus-circle',
        'times-circle',
        'check-circle',
        'question-circle',
        'info-circle',
        'crosshairs',
        'times-circle-o',
        'check-circle-o',
        'ban',
        'arrow-left',
        'arrow-right',
        'arrow-up',
        'arrow-down',
        'share',
        'expand',
        'compress',
        'plus',
        'minus',
        'asterisk',
        'exclamation-circle',
        'gift',
        'leaf',
        'fire',
        'eye',
        'eye-slash',
        'exclamation-triangle',
        'plane',
        'calendar',
        'random',
        'comment',
        'magnet',
        'chevron-up',
        'chevron-down',
        'retweet',
        'shopping-cart',
        'folder',
        'folder-open',
        'arrows-v',
        'arrows-h',
        'bar-chart',
        'twitter-square',
        'facebook-square',
        'camera-retro',
        'key',
        'cogs',
        'comments',
        'thumbs-o-up',
        'thumbs-o-down',
        'star-half',
        'heart-o',
        'sign-out',
        'linkedin-square',
        'thumb-tack',
        'external-link',
        'sign-in',
        'trophy',
        'github-square',
        'upload',
        'lemon-o',
        'phone',
        'square-o',
        'bookmark-o',
        'phone-square',
        'twitter',
        'facebook',
        'github',
        'unlock',
        'credit-card',
        'rss',
        'hdd-o',
        'bullhorn',
        'bell',
        'certificate',
        'hand-o-right',
        'hand-o-left',
        'hand-o-up',
        'hand-o-down',
        'arrow-circle-left',
        'arrow-circle-right',
        'arrow-circle-up',
        'arrow-circle-down',
        'globe',
        'wrench',
        'tasks',
        'filter',
        'briefcase',
        'arrows-alt',
        'users',
        'link',
        'cloud',
        'flask',
        'scissors',
        'files-o',
        'paperclip',
        'floppy-o',
        'square',
        'bars',
        'list-ul',
        'list-ol',
        'strikethrough',
        'underline',
        'table',
        'magic',
        'truck',
        'pinterest',
        'pinterest-square',
        'google-plus-square',
        'google-plus',
        'money',
        'caret-down',
        'caret-up',
        'caret-left',
        'caret-right',
        'columns',
        'sort',
        'sort-desc',
        'sort-asc',
        'envelope',
        'linkedin',
        'undo',
        'gavel',
        'tachometer',
        'comment-o',
        'comments-o',
        'bolt',
        'sitemap',
        'umbrella',
        'clipboard',
        'lightbulb-o',
        'exchange',
        'cloud-download',
        'cloud-upload',
        'user-md',
        'stethoscope',
        'suitcase',
        'bell-o',
        'coffee',
        'cutlery',
        'file-text-o',
        'building-o',
        'hospital-o',
        'ambulance',
        'medkit',
        'fighter-jet',
        'beer',
        'h-square',
        'plus-square',
        'angle-double-left',
        'angle-double-right',
        'angle-double-up',
        'angle-double-down',
        'angle-left',
        'angle-right',
        'angle-up',
        'angle-down',
        'desktop',
        'laptop',
        'tablet',
        'mobile',
        'circle-o',
        'quote-left',
        'quote-right',
        'spinner',
        'circle',
        'reply',
        'github-alt',
        'folder-o',
        'folder-open-o',
        'smile-o',
        'frown-o',
        'meh-o',
        'gamepad',
        'keyboard-o',
        'flag-o',
        'flag-checkered',
        'terminal',
        'code',
        'reply-all',
        'star-half-o',
        'location-arrow',
        'crop',
        'code-fork',
        'chain-broken',
        'question',
        'info',
        'exclamation',
        'superscript',
        'subscript',
        'eraser',
        'puzzle-piece',
        'microphone',
        'microphone-slash',
        'shield',
        'calendar-o',
        'fire-extinguisher',
        'rocket',
        'maxcdn',
        'chevron-circle-left',
        'chevron-circle-right',
        'chevron-circle-up',
        'chevron-circle-down',
        'html5',
        'css3',
        'anchor',
        'unlock-alt',
        'bullseye',
        'ellipsis-h',
        'ellipsis-v',
        'rss-square',
        'play-circle',
        'ticket',
        'minus-square',
        'minus-square-o',
        'level-up',
        'level-down',
        'check-square',
        'pencil-square',
        'external-link-square',
        'share-square',
        'compass',
        'caret-square-o-down',
        'caret-square-o-up',
        'caret-square-o-right',
        'eur',
        'gbp',
        'usd',
        'inr',
        'jpy',
        'rub',
        'krw',
        'btc',
        'file',
        'file-text',
        'sort-alpha-asc',
        'sort-alpha-desc',
        'sort-amount-asc',
        'sort-amount-desc',
        'sort-numeric-asc',
        'sort-numeric-desc',
        'thumbs-up',
        'thumbs-down',
        'youtube-square',
        'youtube',
        'xing',
        'xing-square',
        'youtube-play',
        'dropbox',
        'stack-overflow',
        'instagram',
        'flickr',
        'adn',
        'bitbucket',
        'bitbucket-square',
        'tumblr',
        'tumblr-square',
        'long-arrow-down',
        'long-arrow-up',
        'long-arrow-left',
        'long-arrow-right',
        'apple',
        'windows',
        'android',
        'linux',
        'dribbble',
        'skype',
        'foursquare',
        'trello',
        'female',
        'male',
        'gratipay',
        'sun-o',
        'moon-o',
        'archive',
        'bug',
        'vk',
        'weibo',
        'renren',
        'pagelines',
        'stack-exchange',
        'arrow-circle-o-right',
        'arrow-circle-o-left',
        'caret-square-o-left',
        'dot-circle-o',
        'wheelchair',
        'vimeo-square',
        'try',
        'plus-square-o',
        'space-shuttle',
        'slack',
        'envelope-square',
        'wordpress',
        'openid',
        'university',
        'graduation-cap',
        'yahoo',
        'google',
        'reddit',
        'reddit-square',
        'stumbleupon-circle',
        'stumbleupon',
        'delicious',
        'digg',
        'pied-piper-pp',
        'pied-piper-alt',
        'drupal',
        'joomla',
        'language',
        'fax',
        'building',
        'child',
        'paw',
        'spoon',
        'cube',
        'cubes',
        'behance',
        'behance-square',
        'steam',
        'steam-square',
        'recycle',
        'car',
        'taxi',
        'tree',
        'spotify',
        'deviantart',
        'soundcloud',
        'database',
        'file-pdf-o',
        'file-word-o',
        'file-excel-o',
        'file-powerpoint-o',
        'file-image-o',
        'file-archive-o',
        'file-audio-o',
        'file-video-o',
        'file-code-o',
        'vine',
        'codepen',
        'jsfiddle',
        'life-ring',
        'circle-o-notch',
        'rebel',
        'empire',
        'git-square',
        'git',
        'hacker-news',
        'tencent-weibo',
        'qq',
        'weixin',
        'paper-plane',
        'paper-plane-o',
        'history',
        'circle-thin',
        'header',
        'paragraph',
        'sliders',
        'share-alt',
        'share-alt-square',
        'bomb',
        'futbol-o',
        'tty',
        'binoculars',
        'plug',
        'slideshare',
        'twitch',
        'yelp',
        'newspaper-o',
        'wifi',
        'calculator',
        'paypal',
        'google-wallet',
        'cc-visa',
        'cc-mastercard',
        'cc-discover',
        'cc-amex',
        'cc-paypal',
        'cc-stripe',
        'bell-slash',
        'bell-slash-o',
        'trash',
        'copyright',
        'at',
        'eyedropper',
        'paint-brush',
        'birthday-cake',
        'area-chart',
        'pie-chart',
        'line-chart',
        'lastfm',
        'lastfm-square',
        'toggle-off',
        'toggle-on',
        'bicycle',
        'bus',
        'ioxhost',
        'angellist',
        'cc',
        'ils',
        'meanpath',
        'buysellads',
        'connectdevelop',
        'dashcube',
        'forumbee',
        'leanpub',
        'sellsy',
        'shirtsinbulk',
        'simplybuilt',
        'skyatlas',
        'cart-plus',
        'cart-arrow-down',
        'diamond',
        'ship',
        'user-secret',
        'motorcycle',
        'street-view',
        'heartbeat',
        'venus',
        'mars',
        'mercury',
        'transgender',
        'transgender-alt',
        'venus-double',
        'mars-double',
        'venus-mars',
        'mars-stroke',
        'mars-stroke-v',
        'mars-stroke-h',
        'neuter',
        'genderless',
        'facebook-official',
        'pinterest-p',
        'whatsapp',
        'server',
        'user-plus',
        'user-times',
        'bed',
        'viacoin',
        'train',
        'subway',
        'medium',
        'y-combinator',
        'optin-monster',
        'opencart',
        'expeditedssl',
        'battery-full',
        'battery-three-quarters',
        'battery-half',
        'battery-quarter',
        'battery-empty',
        'mouse-pointer',
        'i-cursor',
        'object-group',
        'object-ungroup',
        'sticky-note',
        'sticky-note-o',
        'cc-jcb',
        'cc-diners-club',
        'clone',
        'balance-scale',
        'hourglass-o',
        'hourglass-start',
        'hourglass-half',
        'hourglass-end',
        'hourglass',
        'hand-rock-o',
        'hand-paper-o',
        'hand-scissors-o',
        'hand-lizard-o',
        'hand-spock-o',
        'hand-pointer-o',
        'hand-peace-o',
        'trademark',
        'registered',
        'creative-commons',
        'gg',
        'gg-circle',
        'tripadvisor',
        'odnoklassniki',
        'odnoklassniki-square',
        'get-pocket',
        'wikipedia-w',
        'safari',
        'chrome',
        'firefox',
        'opera',
        'internet-explorer',
        'television',
        'contao',
        '500px',
        'amazon',
        'calendar-plus-o',
        'calendar-minus-o',
        'calendar-times-o',
        'calendar-check-o',
        'industry',
        'map-pin',
        'map-signs',
        'map-o',
        'map',
        'commenting',
        'commenting-o',
        'houzz',
        'vimeo',
        'black-tie',
        'fonticons',
        'reddit-alien',
        'edge',
        'credit-card-alt',
        'codiepie',
        'modx',
        'fort-awesome',
        'usb',
        'product-hunt',
        'mixcloud',
        'scribd',
        'pause-circle',
        'pause-circle-o',
        'stop-circle',
        'stop-circle-o',
        'shopping-bag',
        'shopping-basket',
        'hashtag',
        'bluetooth',
        'bluetooth-b',
        'percent',
        'gitlab',
        'wpbeginner',
        'wpforms',
        'envira',
        'universal-access',
        'wheelchair-alt',
        'question-circle-o',
        'blind',
        'audio-description',
        'volume-control-phone',
        'braille',
        'assistive-listening-systems',
        'american-sign-language-interpreting',
        'deaf',
        'glide',
        'glide-g',
        'sign-language',
        'low-vision',
        'viadeo',
        'viadeo-square',
        'snapchat',
        'snapchat-ghost',
        'snapchat-square',
        'pied-piper',
        'first-order',
        'yoast',
        'themeisle',
        'google-plus-official',
        'font-awesome',
);


    /**
     * Widget constructor.
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

        $this->defaults = apply_filters('zoom-social-icons-widget-defaults', array(
            'title' => esc_html__('Follow us', 'zoom-social-icons-widget'),
            'description' => '',
            'show-icon-labels' => false,
            'open-new-tab' => true,
            'icon-style' => 'with-canvas',
            'icon-canvas-style' => 'rounded',
            'icon-padding-size' => 8,
            'icon-font-size' => 18,
            'fields' => array(
                array(
                    'url' => 'https://facebook.com/wpzoom',
                    'label' => __('Friend me on Facebook', 'zoom-social-icons-widget'),
                    'icon' => 'facebook',
                    'icon-kit' => 'socicon',
                    'color-picker' => '#3b5998'

                ),
                array(
                    'url' => 'https://twitter.com/wpzoom',
                    'label' => __('Follow Me', 'zoom-social-icons-widget'),
                    'icon' => 'twitter',
                    'icon-kit' => 'socicon',
                    'color-picker' => '#55ACEC'
                ),
                array(
                    'url' => 'https://instagram.com/wpzoom',
                    'label' => __('Instagram', 'zoom-social-icons-widget'),
                    'icon' => 'instagram',
                    'icon-kit' => 'socicon',
                    'color-picker' => '#E1306C'
                )
            )
        ));

        $this->plugin_file = dirname(__FILE__) . '/social-icons-widget-by-wpzoom.php';

        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('admin_print_footer_scripts', array($this, 'admin_js_templates'));

        add_action('wp_enqueue_scripts', array($this, 'scripts'));

        add_action('siteorigin_panel_enqueue_admin_scripts', array($this, 'admin_scripts'));
        add_action('siteorigin_panel_enqueue_admin_scripts', array($this, 'admin_js_templates'));

    }

    /**
     * Script & styles for back-end widget form.
     */
    public function admin_scripts()
    {
        wp_enqueue_script('zoom-social-icons-widget', plugin_dir_url($this->plugin_file) . 'social-icons-widget.js', array('jquery', 'jquery-ui-sortable', 'underscore', 'wp-color-picker'), '20160621');

        wp_localize_script('zoom-social-icons-widget', 'zoom_social_icons', array(
            array(
                'icons'=> $this->icons,
                'type' =>'socicon',
                'label'=>__('Socicons kit', 'zoom-social-icons-widget')
            ),
            array(
                'type' => 'dashicons',
                'icons' => $this->dashicons,
                'label' => __('Dashicons kit', 'zoom-social-icons-widget')
            ),
            array(
                'type'=>'genericon',
                'icons'=> $this->genericicons,
                'label' => __('Genericons kit', 'zoom-social-icons-widget')
            ),
            array(
                'type'=>'fa',
                'icons'=> array_unique($this->font_awesome),
                'label' => __('Font Awesome kit', 'zoom-social-icons-widget')
            )
        ));
        wp_enqueue_style('socicon', plugin_dir_url($this->plugin_file) . 'css/socicon.css', array(), '20160404');
        wp_enqueue_style('social-icons-widget-admin', plugin_dir_url($this->plugin_file) . 'css/social-icons-widget-admin.css', array('socicon'), '20160404');
        wp_enqueue_style('genericons', plugin_dir_url($this->plugin_file) . 'css/genericons.css', array(), '20160404');
        wp_enqueue_style('fontawesome', plugin_dir_url($this->plugin_file) . 'css/font-awesome.min.css', array(), '20160404');
        wp_enqueue_style('dashicons');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_media();
    }

    /**
     * JavaScript templates for back-end widget form.
     */
    public function admin_js_templates()
    {
        ?>

        <script type="text/html" id="tmpl-zoom-social-icons-field"><?php $this->list_field_template(); ?></script>
        <script type="text/html" id="tmpl-zoom-social-modal"><?php $this->get_modal_template(); ?></script>
        <script type="text/html" id="tmpl-zoom-social-modal-search"><?php $this->get_modal_search_template();?></script>
        <?php
    }
    /**
     * Generate modal search template.
     */
    public function get_modal_search_template(){
        ?>
        <# _.each(data, function(el){ #>
            <# if(el.icons.length){ #>
                <p>{{el.label}}</p>
                    <div>
                        <# _.each(el.icons, function(icon){#>
                            <span class="zoom-social-icons__single-element {{el.type}} {{el.type}}-{{ icon }}" data-value="{{ icon }}" data-type="{{ el.type }}"></span>
                        <# });#>
                    </div>
            <# } #>
        <#});#>
        <?php
    }

    /**
     * Generate modal template.
     */
    public function get_modal_template()
    {
        ?>
        <div class="zoom-social-modal-title"><h3><?php _e('Select Icon', 'zoom-social-icons-widget') ?></h3></div>
        <div class="zoom-social-modal-content">
            <form class="zoom-social-modal-form">
                <div class="form-group">
                    <div class="wrap-label">
                        <label><?php _e('Choose icon background color', 'zoom-social-icons-widget') ?></label>

                    </div>
                    <div class="wrap-input">
                        <input type="text" class="zoom-social-icons__field-color-picker"
                               name="zoom-social-icons__field-color-picker" value="#5A5A59">
                    </div>
                </div>
                <div class="form-group">
                    <div class="wrap-label">
                        <label><?php _e('Select Icon Kit', 'zoom-social-icons-widget') ?></label>
                    </div>
                    <div class="wrap-input">
                        <select class="zoom-social-icons__field-icon-kit" name="zoom-social-icons__field-icon-kit">
                            <option value="socicon"><?php _e('Socicons', 'zoom-social-icons-widget') ?></option>
                            <option value="dashicons"><?php _e('Dashicons', 'zoom-social-icons-widget') ?></option>
                            <option value="genericon"><?php _e('Genericons', 'zoom-social-icons-widget') ?></option>
                            <option value="fa"><?php _e('Font Awesome', 'zoom-social-icons-widget') ?></option>
                        </select>
                    </div>
                </div>
                <div class="icon-kit socicon-wrapper">
                    <?php foreach ($this->icons as $icon): ?>
                        <span class="zoom-social-icons__single-element socicon socicon-<?php echo $icon ?>"
                              data-value="<?php echo $icon ?>"></span>
                    <?php endforeach; ?>
                </div>
                <div class="icon-kit dashicons-wrapper">
                    <?php foreach ($this->dashicons as $icon): ?>
                        <span class="zoom-social-icons__single-element dashicons dashicons-<?php echo $icon ?>"
                              data-value="<?php echo $icon ?>"></span>
                    <?php endforeach; ?>
                </div>
                <div class="icon-kit genericon-wrapper">
                    <?php foreach ($this->genericicons as $icon): ?>
                        <span class="zoom-social-icons__single-element genericon genericon-<?php echo $icon ?>"
                              data-value="<?php echo $icon ?>"></span>
                    <?php endforeach; ?>
                </div>
                <div class="icon-kit fa-wrapper">
                    <?php foreach ($this->font_awesome as $icon): ?>
                        <span class="zoom-social-icons__single-element fa fa-<?php echo $icon ?>"
                              data-value="<?php echo $icon ?>"></span>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="zoom-social-icons__field-icon" class="zoom-social-icons__field-icon"/>
            </form>
            <div class="zoom-social-modal-search-content" style="display: none" data-show="hidden">
                Search Content
            </div>
        </div>
        <div class="zoom-social-modal-toolbar">
            <input class="search-action-input" style="width: 50%; float: left;" type="text" placeholder="Type to search icon"/>
            <button class="button-primary save-action-button"><?php _e('Save', 'zoom-social-icons-widget') ?></button>
        </div>

        <?php
    }

    /**
     * Scripts & styles for front-end display of widget.
     */
    public function scripts()
    {
        wp_enqueue_style('socicon', plugin_dir_url($this->plugin_file) . 'css/socicon.css', array(), '20160404');
        wp_enqueue_style('genericons', plugin_dir_url($this->plugin_file) . 'css/genericons.css', array(), '20160404');
        wp_enqueue_style('fontawesome', plugin_dir_url($this->plugin_file) . 'css/font-awesome.min.css', array(), '20160404');
        wp_enqueue_style('dashicons');
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
        $instance = wp_parse_args((array)$instance, $this->defaults);

        echo $args['before_widget'];

        if ($instance['title']) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $class_list = array();
        $class_list[] = 'zoom-social-icons-list--' . $instance['icon-style'];
        $class_list[] = 'zoom-social-icons-list--' . $instance['icon-canvas-style'];

        if (!$instance['show-icon-labels']) {
            $class_list[] = 'zoom-social-icons-list--no-labels';
        }
        ?>

        <?php if (!empty($instance['description'])) : ?>

        <p><?php echo $instance['description']; ?></p>

    <?php endif; ?>

        <ul class="zoom-social-icons-list <?php echo esc_attr(implode(' ', $class_list)); ?>">

            <?php
             foreach ($instance['fields'] as $field) : ?>

                <li class="zoom-social_icons-list__item">
                    <a class="zoom-social_icons-list__link"
                       href="<?php echo esc_url($field['url'], $this->protocols); ?>" <?php echo($instance['open-new-tab'] ? 'target="_blank"' : ''); ?>>
                        <?php if (!empty($field['icon']) && !empty($field['icon-kit']) && !empty($field['color-picker'])) {
                            $class = $field['icon-kit'] . ' ' . $field['icon-kit'] . '-' . $field['icon'];
                            $style = ($instance['icon-style'] === 'with-canvas') ? 'background-color:' . $field['color-picker'] : 'color:' . $field['color-picker'];
                        } else {
                            $style = '';
                            $class = 'socicon socicon-' . esc_attr($this->get_icon($field['url']));
                        } ?>
                        <?php if (!empty($instance['icon-font-size'])) {
                            $style.='; font-size: '.$instance['icon-font-size'].'px';
                        } ?>
                        <?php if(!empty($instance['icon-padding-size'])){
                            $style.='; padding:'.$instance['icon-padding-size'].'px';
                        }?>
                        <span class="<?php echo $class ?>"
                              style="<?php echo $style ?>"></span>

                        <?php if ($instance['show-icon-labels']) : ?>
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

        $instance['show-icon-labels'] = (bool)$new_instance['show-icon-labels'];
        $instance['open-new-tab'] = (bool)$new_instance['open-new-tab'];

        $instance['icon-padding-size'] = (int) $new_instance['icon-padding-size'];
        $instance['icon-font-size'] = (int) $new_instance['icon-font-size'];

        $instance['icon-style'] = $this->defaults['icon-style'];
        if (in_array($new_instance['icon-style'], array('with-canvas', 'without-canvas'))) {
            $instance['icon-style'] = $new_instance['icon-style'];
        }

        $instance['icon-canvas-style'] = $this->defaults['icon-canvas-style'];
        if (in_array($new_instance['icon-canvas-style'], array('rounded', 'round', 'square'))) {
            $instance['icon-canvas-style'] = $new_instance['icon-canvas-style'];
        }

        $field_count = count($new_instance['url-fields']);

        $instance['fields'] = array();

        for ($i = 0; $i < $field_count; $i++) {
            $url = esc_url($new_instance['url-fields'][$i], $this->protocols);
            $label = esc_html($new_instance['label-fields'][$i]);

            if ($url) {
                $instance['fields'][] = array(
                    'url' => $url,
                    'label' => $label,
                    'icon' => $new_instance['icon-fields'][$i],
                    'icon-kit' => $new_instance['icon-kit-fields'][$i],
                    'color-picker' => $new_instance['color-picker-fields'][$i]
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
    public function form($instance)
    {
        $instance = wp_parse_args((array)$instance, $this->defaults);
        ?>

        <p>
            <label
                for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title:', 'zoom-social-icons-widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('description'); ?>"><?php esc_html_e('Description:', 'zoom-social-icons-widget'); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id('description'); ?>"
                      name="<?php echo $this->get_field_name('description'); ?>" cols="20"
                      rows="3"><?php echo esc_attr($instance['description']); ?></textarea>
            <small><?php _e('Short description to be displayed right above the icons. Basic HTML allowed.', 'zoom-social-icons-widget'); ?></small>
        </p>

        <p>
            <input type="hidden" name="<?php echo $this->get_field_name('show-icon-labels'); ?>" value="0"/>
            <input class="checkbox zoom-social-icons-show-icon-labels"
                   type="checkbox" <?php checked($instance['show-icon-labels']); ?>
                   id="<?php echo $this->get_field_id('show-icon-labels'); ?>"
                   name="<?php echo $this->get_field_name('show-icon-labels'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('show-icon-labels'); ?>"><?php _e('Show icon labels? ', 'zoom-social-icons-widget'); ?></label>
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['open-new-tab']); ?>
                   id="<?php echo $this->get_field_id('open-new-tab'); ?>"
                   name="<?php echo $this->get_field_name('open-new-tab'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('open-new-tab'); ?>"><?php _e('Open links in new tab? ', 'zoom-social-icons-widget'); ?></label>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('icon-style'); ?>"><?php _e('Icon Style:', 'zoom-social-icons-widget'); ?></label>
            <select name="<?php echo $this->get_field_name('icon-style'); ?>"
                    id="<?php echo $this->get_field_id('icon-style'); ?>" class="widefat">
                <option
                    value="with-canvas"<?php selected($instance['icon-style'], 'with-canvas'); ?>><?php esc_html_e('Color Background / White Icon', 'zoom-social-icons-widget'); ?></option>
                <option
                    value="without-canvas"<?php selected($instance['icon-style'], 'without-canvas'); ?>><?php esc_html_e('Color Icon / No Background', 'zoom-social-icons-widget'); ?></option>
            </select>
        </p>

        <p>
            <label
                for="<?php echo $this->get_field_id('icon-canvas-style'); ?>"><?php _e('Icon Background Style:', 'zoom-social-icons-widget'); ?></label>
            <select name="<?php echo $this->get_field_name('icon-canvas-style'); ?>"
                    id="<?php echo $this->get_field_id('icon-canvas-style'); ?>" class="widefat">
                <option
                    value="rounded"<?php selected($instance['icon-canvas-style'], 'rounded'); ?>><?php esc_html_e('Rounded Corners', 'zoom-social-icons-widget'); ?></option>
                <option
                    value="round"<?php selected($instance['icon-canvas-style'], 'round'); ?>><?php esc_html_e('Round', 'zoom-social-icons-widget'); ?></option>
                <option
                    value="square"<?php selected($instance['icon-canvas-style'], 'square'); ?>><?php esc_html_e('Square', 'zoom-social-icons-widget'); ?></option>
            </select>
        </p>

        <p>
            <small>
                <?php echo wp_kses_post(__('Icon Background Style has no effect on <i>Color Icon / No Background</i> icon style.', 'zoom-social-icons-widget')); ?>
            </small>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('icon-padding-size')?>"><?php  _e('Icon Padding (pixels):', 'zoom-social-icons-widget')?>
            <input type="number" min="5" max="200"
            id="<?php echo $this->get_field_id('icon-padding-size')?>"
            name="<?php echo $this->get_field_name('icon-padding-size')?>"
            value="<?php echo esc_attr($instance['icon-padding-size']); ?>"
            class="widefat"/>
            </label>
        </p>

         <p>
            <label for="<?php echo $this->get_field_id('icon-font-size')?>"><?php  _e('Icon Size (pixels):', 'zoom-social-icons-widget')?>
            <input type="number" min="5" max="200"
            id="<?php echo $this->get_field_id('icon-font-size')?>"
            name="<?php echo $this->get_field_name('icon-font-size')?>"
            value="<?php echo esc_attr($instance['icon-font-size']); ?>"
            class="widefat"/>
            </label>
        </p>

        <p style="margin-bottom: 0;"><?php _e('Icons:', 'zoom-social-icons-widget'); ?></p>

        <ul class="zoom-social-icons__list <?php echo($instance['show-icon-labels'] ? '' : 'zoom-social-icons__list--no-labels'); ?>"
            data-url-field-id="<?php echo $this->get_field_id('url-fields'); ?>"
            data-url-field-name="<?php echo $this->get_field_name('url-fields'); ?>"
            data-label-field-id="<?php echo $this->get_field_id('label-fields'); ?>"
            data-label-field-name="<?php echo $this->get_field_name('label-fields'); ?>"
            data-icon-field-id="<?php echo $this->get_field_id('icon-fields'); ?>"
            data-icon-field-name="<?php echo $this->get_field_name('icon-fields'); ?>"
            data-icon-kit-field-id="<?php echo $this->get_field_id('icon-kit-fields'); ?>"
            data-icon-kit-field-name="<?php echo $this->get_field_name('icon-kit-fields'); ?>"
            data-color-picker-field-id="<?php echo $this->get_field_id('color-picker-fields'); ?>"
            data-color-picker-field-name="<?php echo $this->get_field_name('color-picker-fields'); ?>"
        >

            <?php
            foreach ($instance['fields'] as $field) {
                $this->list_field_template(array(
                    'url-field-id' => $this->get_field_id('url-fields'),
                    'url-field-name' => $this->get_field_name('url-fields'),
                    'url-value' => $field['url'],
                    'label-field-id' => $this->get_field_id('label-fields'),
                    'label-field-name' => $this->get_field_name('label-fields'),
                    'label-value' => $field['label'],
                    'color-picker-field-id' => $this->get_field_id('color-picker-fields'),
                    'color-picker-field-name' => $this->get_field_name('color-picker-fields'),
                    'color-picker-value' => isset($field['color-picker']) ? $field['color-picker'] : '',
                    'icon-field-id' => $this->get_field_id('icon-fields'),
                    'icon-field-name' => $this->get_field_name('icon-fields'),
                    'icon-value' => isset($field['icon']) ? $field['icon'] : '',
                    'icon-kit-field-id' => $this->get_field_id('icon-kit-fields'),
                    'icon-kit-field-name' => $this->get_field_name('icon-kit-fields'),
                    'icon-kit-value' => isset($field['icon-kit']) ? $field['icon-kit'] : '',
                ));
            }
            ?>

        </ul>

        <div class="zoom-social-icons__add-button">
            <button class="button"><?php _e('Add more', 'zoom-social-icons-widget'); ?></button>
        </div>

        <p>
            <small>
                <?php echo wp_kses_post(__('To add an icon with an email address, use the <strong><em>mailto:mail@example.com</em></strong> format.', 'zoom-social-icons-widget')); ?>
            </small>
        </p>

        <p>
            <small>
                <?php echo wp_kses_post(__('Note that icons above is not how they will look on front-end. This is just for reference.', 'zoom-social-icons-widget')); ?>
            </small>
        </p>

        <?php
    }

    /**
     * Generates template for field item, used for widget options in wp-admin directly and by javascript.
     *
     * @param array $args Template arguments
     */
    protected function list_field_template($args = array())
    {
        $defaults = array(
            'url-field-id' => '',
            'url-field-name' => '',
            'url-value' => '',
            'label-field-id' => '',
            'label-field-name' => '',
            'label-value' => '',
            'color-picker-field-id' => '',
            'color-picker-field-name' => '',
            'color-picker-value' => '#5A5A59',
            'icon-field-id' => '',
            'icon-field-name' => '',
            'icon-value' => 'plus',
            'icon-kit-field-id' => '',
            'icon-kit-field-name' => '',
            'icon-kit-value' => 'dashicons'
        );

        $args = wp_parse_args($args, $defaults);

        $icon_class = 'dashicons dashicons-sort';
        $background_color = '';

        if (($icon = $this->get_icon($args['url-value']))) {
            $icon_class = 'socicon socicon-' . $icon;
        }

        if (!empty($args['icon-value']) && !empty($args['icon-kit-value'])) {
            $icon_class = $args['icon-kit-value'] . ' ' . $args['icon-kit-value'] . '-' . $args['icon-value'];
        }

        if (!empty($args['color-picker-value'])) {
            $background_color = 'background-color :' . esc_attr($args['color-picker-value']) . ';';
        }
        if (!empty($args['icon-value']) && $args['icon-value'] == 'plus') {
            $background_color .= ' line-height:22px;';
        }

        ?>

        <li class="zoom-social-icons__field">
            <span class="dashicons dashicons-sort zoom-social-icons__field-handle"></span>
            <span class="zoom-social-icons__field-icon-handler <?php echo $icon_class; ?>"
                  style="<?php echo $background_color; ?>"></span>
            <div class="zoom-social-icons__cw">
                <div class="zoom-social-icons__inputs">

                    <?php
                    printf('<input class="widefat zoom-social-icons__field-url" id="%1$s" name="%2$s[]" type="text" placeholder="%3$s" value="%4$s">',
                        $args['url-field-id'],
                        $args['url-field-name'],
                        __('Start typing the URL...', 'zoom-social-icons-widget'),
                        esc_attr($args['url-value'])
                    );

                    printf('<input class="widefat zoom-social-icons__field-label" id="%1$s" name="%2$s[]" type="text" placeholder="%3$s" value="%4$s">',
                        $args['label-field-id'],
                        $args['label-field-name'],
                        __('Label', 'zoom-social-icons-widget'),
                        esc_attr($args['label-value'])
                    );

                    printf('<input type="hidden" class="zoom-social-icons__field-color-picker" id="%1$s" name="%2$s[]" value="%3$s">',
                        $args['color-picker-field-id'],
                        $args['color-picker-field-name'],
                        esc_attr($args['color-picker-value'])
                    );

                    printf('<input type="hidden" class="zoom-social-icons__field-icon" id="%1$s" name="%2$s[]" value="%3$s">',
                        $args['icon-field-id'],
                        $args['icon-field-name'],
                        esc_attr($args['icon-value'])
                    );

                    printf('<input type="hidden"  class="zoom-social-icons__field-icon-kit" id="%1$s" name="%2$s[]" value="%3$s">',
                        $args['icon-kit-field-id'],
                        $args['icon-kit-field-name'],
                        esc_attr($args['icon-kit-value'])
                    );
                    ?>

                </div>
            </div>


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

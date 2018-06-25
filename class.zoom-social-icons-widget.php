<?php

class Zoom_Social_Icons_Widget extends WP_Widget {

	/**
	 * @var string Path to plugin file.
	 */
	protected $plugin_file;


	/**
	 * @var array $icons
	 * Collection of icon kits including socicon, dashicons, fontawesome and genericons
	 */
	protected $icons = array(
		'socicon'   => array(
			array(
				'icon'     => '500px',
				'category' => array( 'photography' ),
				'color'    => '#58a9de'
			),
			array(
				'icon'     => 'airbnb',
				'category' => array( 'travel' ),
				'color'    => '#FF5A5F'
			),
			array(
				'icon'     => 'android',
				'category' => array( 'software' ),
				'color'    => '#8ec047'
			),
            array(
                'icon'     => 'angieslist',
                'category' => array( 'business' ),
                'color'    => '#299F37'
            ),
			array(
				'icon'     => 'apple',
				'category' => array( 'software' ),
				'color'    => '#B9BFC1'
			),
			array(
				'icon'     => 'appnet',
				'category' => array( 'software' ),
				'color'    => '#494949'
			),
            array(
                'icon'     => 'appstore',
                'category' => array( 'software' ),
                'color'    => '#007AFF'
            ),
			array(
				'icon'     => 'baidu',
				'category' => array( 'search-engines' ),
				'color'    => '#2319DC'
			),
			array(
				'icon'     => 'bandcamp',
				'category' => array( 'music' ),
				'color'    => '#619aa9'
			),
			array(
				'icon'     => 'bebo',
				'category' => array( 'software', 'communication' ),
				'color'    => '#EF1011'
			),
			array(
				'icon'     => 'behance',
				'category' => array( 'design' ),
				'color'    => '#1769ff'
			),
			array(
				'icon'     => 'blogger',
				'category' => array( 'blogging' ),
				'color'    => '#ec661c'
			),
			array(
				'icon'     => 'bloglovin',
				'category' => array( 'blogging' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'buffer',
				'category' => array( 'blogging', 'social-media' ),
				'color'    => '#000000'
			),
            array(
                'icon'     => 'codered',
                'category' => array( 'learning', 'programming' ),
                'color'    => '#FF033B'
            ),
			array(
				'icon'     => 'coderwall',
				'category' => array( 'learning', 'programming' ),
				'color'    => '#3E8DCC'
			),
            array(
                'icon'     => 'crunchbase',
                'category' => array( 'business' ),
                'color'    => '#0288d1'
            ),
			array(
				'icon'     => 'dailymotion',
				'category' => array( 'video' ),
				'color'    => '#004e72'
			),
			array(
				'icon'     => 'delicious',
				'category' => array( 'web-tools' ),
				'color'    => '#020202'
			),
			array(
				'icon'     => 'deviantart',
				'category' => array( 'design' ),
				'color'    => '#c5d200'
			),
            array(
                'icon'     => 'deezer',
                'category' => array( 'music' ),
                'color'    => '#32323d'
            ),
			array(
				'icon'     => 'digg',
				'category' => array( 'news' ),
				'color'    => '#1d1d1b'
			),
            array(
                'icon'     => 'discord',
                'category' => array( 'chat' ),
                'color'    => '#7289da'
            ),
            array(
                'icon'     => 'discord2',
                'category' => array( 'chat' ),
                'color'    => '#7289da'
            ),
			array(
				'icon'     => 'disqus',
				'category' => array( 'communication', 'web-tools' ),
				'color'    => '#2e9fff'
			),
			array(
				'icon'     => 'dribbble',
				'category' => array( 'design' ),
				'color'    => '#e84d88'
			),
			array(
				'icon'     => 'drupal',
				'category' => array( 'blogging', 'web-tools', 'programming' ),
				'color'    => '#00598e'
			),
			array(
				'icon'     => 'ebay',
				'category' => array( 'ecommerce' ),
				'color'    => '#E53238'
			),
            array(
                'icon'     => 'ello',
                'category' => array( 'design' ),
                'color'    => '#000'
            ),
			array(
				'icon'     => 'envato',
				'category' => array( 'ecommerce' ),
				'color'    => '#82B540'
			),
			array(
				'icon'     => 'eyeem',
				'category' => array( 'ecommerce', 'photography' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'facebook',
				'category' => array( 'social-media' ),
				'color'    => '#3b5998'
			),
			array(
				'icon'     => 'feedburner',
				'category' => array( 'web-tools', 'news' ),
				'color'    => '#FFCC00'
			),
			array(
				'icon'     => 'feedly',
				'category' => array( 'web-tools' ),
				'color'    => '#34B151'
			),
			array(
				'icon'     => 'flattr',
				'category' => array( 'web-tools', 'payment' ),
				'color'    => '#F67C1A'
			),
            array(
                'icon'     => 'flipboard',
                'category' => array( 'news', 'reader' ),
                'color'    => '#E12828'
            ),
            array(
                'icon'     => 'flipboard2',
                'category' => array( 'news', 'reader' ),
                'color'    => '#E12828'
            ),
			array(
				'icon'     => 'flickr',
				'category' => array( 'web-tools', 'photography' ),
				'color'    => '#ff0084'
			),
			array(
				'icon'     => 'foursquare',
				'category' => array( 'travel' ),
				'color'    => '#F94877'
			),
			array(
				'icon'     => 'friendfeed',
				'category' => array( 'news' ),
				'color'    => '#2F72C4'
			),
			array(
				'icon'     => 'github',
				'category' => array( 'programming' ),
				'color'    => '#221e1b'
			),
			array(
				'icon'     => 'goodreads',
				'category' => array( 'learning' ),
				'color'    => '#463020'
			),
			array(
				'icon'     => 'google',
				'category' => array( 'search-engines' ),
				'color'    => '#d93e2d'
			),
			array(
				'icon'     => 'grooveshark',
				'category' => array( 'music' ),
				'color'    => '#000000'
			),
            array(
                'icon'     => 'hellocoton',
                'category' => array( 'news' ),
                'color'    => '#D50066'
            ),
			array(
				'icon'     => 'houzz',
				'category' => array( 'design' ),
				'color'    => '#7CC04B'
			),
			array(
				'icon'     => 'identica',
				'category' => array( 'blogging', 'social-media' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'instagram',
				'category' => array( 'photography', 'social-media' ),
				'color'    => '#E1306C'
			),
			array(
				'icon'     => 'lanyrd',
				'category' => array( 'learning' ),
				'color'    => '#3c80c9'
			),
			array(
				'icon'     => 'lastfm',
				'category' => array( 'audio' ),
				'color'    => '#d41316'
			),
            array(
                'icon'     => 'line',
                'category' => array( 'communication' ),
                'color'    => '#00BA27'
            ),
			array(
				'icon'     => 'linkedin',
				'category' => array( 'programming', 'social-media' ),
				'color'    => '#3371b7'
			),
			array(
				'icon'     => 'lookbook',
				'category' => array( 'social-media' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'mail',
				'category' => array( 'web-tools', 'communication' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'medium',
				'category' => array( 'blogging' ),
				'color'    => '#01AB6C'
			),
			array(
				'icon'     => 'meetup',
				'category' => array( 'social-media' ),
				'color'    => '#e2373c'
			),
            array(
                'icon'     => 'messenger',
                'category' => array( 'social-media', 'communication' ),
                'color'    => '#0084ff'
            ),
			array(
				'icon'     => 'myspace',
				'category' => array( 'social-media' ),
				'color'    => '#323232'
			),
			array(
				'icon'     => 'newsvine',
				'category' => array( 'news' ),
				'color'    => '#075B2F'
			),
            array(
                'icon'     => 'nextdoor',
                'category' => array( 'business' ),
                'color'    => '#01B247'
            ),
			array(
				'icon'     => 'odnoklassniki',
				'category' => array( 'social-media' ),
				'color'    => '#f48420'
			),
			array(
				'icon'     => 'outlook',
				'category' => array( 'communication', 'web-tools' ),
				'color'    => '#0072C6'
			),
            array(
                'icon'     => 'overwatch',
                'category' => array( 'social-media', 'video', 'games' ),
                'color'    => '#9E9E9E'
            ),
			array(
				'icon'     => 'patreon',
				'category' => array( 'payment', 'web-tools' ),
				'color'    => '#E44727'
			),
			array(
				'icon'     => 'paypal',
				'category' => array( 'payment', 'web-tools' ),
				'color'    => '#009cde'
			),
			array(
				'icon'     => 'periscope',
				'category' => array( 'video', 'social-media' ),
				'color'    => '#40A4C4'
			),
			array(
				'icon'     => 'persona',
				'category' => array( 'web-tools' ),
				'color'    => '#e6753d'
			),
			array(
				'icon'     => 'pinterest',
				'category' => array( 'social-media' ),
				'color'    => '#c92619'
			),
			array(
				'icon'     => 'play',
				'category' => array( 'ecommerce' ),
				'color'    => '#000000'
			),
            array(
                'icon'     => 'playstation',
                'category' => array( 'games', 'video' ),
                'color'    => '#000000'
            ),
			array(
				'icon'     => 'reddit',
				'category' => array( 'news', 'social-media' ),
				'color'    => '#e74a1e'
			),
            array(
                'icon'     => 'researchgate',
                'category' => array( 'education' ),
                'color'    => '#00CCBB'
            ),
			array(
				'icon'     => 'rss',
				'category' => array( 'news', 'communication', 'web-tools' ),
				'color'    => '#f26109'
			),
			array(
				'icon'     => 'skype',
				'category' => array( 'software', 'communication', 'video' ),
				'color'    => '#28abe3'
			),
			array(
				'icon'     => 'slideshare',
				'category' => array( 'web-tools' ),
				'color'    => '#4ba3a6'
			),
			array(
				'icon'     => 'smugmug',
				'category' => array( 'photography', 'web-tools' ),
				'color'    => '#ACFD32'
			),
			array(
				'icon'     => 'snapchat',
				'category' => array( 'communication', 'social-media' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'soundcloud',
				'category' => array( 'audio' ),
				'color'    => '#fe3801'
			),
			array(
				'icon'     => 'spotify',
				'category' => array( 'audio' ),
				'color'    => '#7bb342'
			),
			array(
				'icon'     => 'stackoverflow',
				'category' => array( 'audio' ),
				'color'    => '#FD9827'
			),
			array(
				'icon'     => 'steam',
				'category' => array( 'games' ),
				'color'    => '#8F8D8A'
			),
            array(
                'icon'     => 'strava',
                'category' => array( 'fitness', 'sport'),
                'color'    => '#FC4C02'
            ),
			array(
				'icon'     => 'stumbleupon',
				'category' => array( 'search-engines' ),
				'color'    => '#e64011'
			),
			array(
				'icon'     => 'swarm',
				'category' => array( 'games' ),
				'color'    => '#FC9D3C'
			),
			array(
				'icon'     => 'technorati',
				'category' => array( 'search-engines', 'software' ),
				'color'    => '#5cb030'
			),
			array(
				'icon'     => 'telegram',
				'category' => array( 'communication', 'software' ),
				'color'    => '#0088cc'
			),
            array(
                'icon'     => 'tidal',
                'category' => array( 'music' ),
                'color'    => '#01FFFF'
            ),
			array(
				'icon'     => 'tripadvisor',
				'category' => array( 'travel' ),
				'color'    => '#589442'
			),
			array(
				'icon'     => 'tripit',
				'category' => array( 'travel' ),
				'color'    => '#1982C3'
			),
			array(
				'icon'     => 'triplej',
				'category' => array( 'audio' ),
				'color'    => '#E53531'
			),
			array(
				'icon'     => 'tumblr',
				'category' => array( 'blogging' ),
				'color'    => '#45556c'
			),
			array(
				'icon'     => 'twitter',
				'category' => array( 'social-media' ),
				'color'    => '#55acee'
			),
            array(
                'icon'     => 'unsplash',
                'category' => array( 'photography'),
                'color'    => '#000'
            ),
            array(
                'icon'     => 'udemy',
                'category' => array( 'learning'),
                'color'    => '#17aa1c'
            ),
			array(
				'icon'     => 'viadeo',
				'category' => array( 'social-media' ),
				'color'    => '#e4a000'
			),
			array(
				'icon'     => 'viber',
				'category' => array( 'communication', 'web-tools' ),
				'color'    => '#7b519d'
			),
			array(
				'icon'     => 'vimeo',
				'category' => array( 'video' ),
				'color'    => '#51b5e7'
			),
			array(
				'icon'     => 'vine',
				'category' => array( 'video' ),
				'color'    => '#00b389'
			),
			array(
				'icon'     => 'vkontakte',
				'category' => array( 'social-media' ),
				'color'    => '#5a7fa6'
			),
            array(
                'icon'     => 'whatsapp',
                'category' => array( 'communication' ),
                'color'    => '#20B038'
            ),
			array(
				'icon'     => 'wikipedia',
				'category' => array( 'learning' ),
				'color'    => '#000000'
			),
			array(
				'icon'     => 'windows',
				'category' => array( 'software' ),
				'color'    => '#00BDF6'
			),
			array(
				'icon'     => 'wordpress',
				'category' => array( 'blogging', 'web-tools' ),
				'color'    => '#464646'
			),
			array(
				'icon'     => 'xbox',
				'category' => array( 'games' ),
				'color'    => '#92C83E'
			),
			array(
				'icon'     => 'xing',
				'category' => array( 'social-media' ),
				'color'    => '#005a60'
			),
			array(
				'icon'     => 'yahoo',
				'category' => array( 'search-engines' ),
				'color'    => '#6E2A85'
			),
			array(
				'icon'     => 'yammer',
				'category' => array( 'social-media' ),
				'color'    => '#1175C4'
			),
			array(
				'icon'     => 'yelp',
				'category' => array( 'travel', 'search-engines' ),
				'color'    => '#c83218'
			),
			array(
				'icon'     => 'youtube',
				'category' => array( 'video', 'search-engines' ),
				'color'    => '#e02a20'
			),
			array(
				'icon'     => 'zerply',
				'category' => array( 'video', 'games' ),
				'color'    => '#9DBC7A'
			),
			array(
				'icon'     => 'zynga',
				'category' => array( 'games' ),
				'color'    => '#DC0606'
			),

		),
		'dashicons' => array(

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'menu',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-site',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'dashboard',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-post',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-media',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-links',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-page',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-comments',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-appearance',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-plugins',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-users',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-tools',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-settings',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-network',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-home',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-generic',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-collapse',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'filter',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-customizer',
			),

			array(
				'category' =>
					array(
						'admin-menu',
					),
				'icon'     => 'admin-multisite',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-write-blog',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-add-page',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-view-site',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-widgets-menus',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-comments',
			),

			array(
				'category' =>
					array(
						'welcome-screen',
					),
				'icon'     => 'welcome-learn-more',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-aside',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-image',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-gallery',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-video',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-status',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-quote',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-chat',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'format-audio',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'camera',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'images-alt',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'images-alt2',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'video-alt',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'video-alt2',
			),

			array(
				'category' =>
					array(
						'post-formats',
					),
				'icon'     => 'video-alt3',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-archive',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-audio',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-code',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-default',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-document',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-interactive',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-spreadsheet',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-text',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'media-video',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'playlist-audio',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'playlist-video',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-play',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-pause',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-forward',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-skipforward',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-back',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-skipback',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-repeat',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-volumeon',
			),

			array(
				'category' =>
					array(
						'media',
					),
				'icon'     => 'controls-volumeoff',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-crop',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-rotate',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-rotate-left',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-rotate-right',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-flip-vertical',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-flip-horizontal',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'image-filter',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'undo',
			),

			array(
				'category' =>
					array(
						'image-editing',
					),
				'icon'     => 'redo',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-bold',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-italic',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-ul',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-ol',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-quote',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-alignleft',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-aligncenter',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-alignright',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-insertmore',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-spellcheck',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-expand',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-contract',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-kitchensink',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-underline',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-justify',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-textcolor',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-paste-word',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-paste-text',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-removeformatting',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-video',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-customchar',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-outdent',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-indent',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-help',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-strikethrough',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-unlink',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-rtl',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-break',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-code',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-paragraph',
			),

			array(
				'category' =>
					array(
						'tinymce',
					),
				'icon'     => 'editor-table',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'align-left',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'align-right',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'align-center',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'align-none',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'lock',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'unlock',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'calendar',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'calendar-alt',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'visibility',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'hidden',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'post-status',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'edit',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'trash',
			),

			array(
				'category' =>
					array(
						'posts-screen',
					),
				'icon'     => 'sticky',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'external',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-up',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-down',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-right',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-left',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-up-alt',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-down-alt',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-right-alt',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-left-alt',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-up-alt2',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-down-alt2',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-right-alt2',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'arrow-left-alt2',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'sort',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'leftright',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'randomize',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'list-view',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'exerpt-view',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'grid-view',
			),

			array(
				'category' =>
					array(
						'sorting',
					),
				'icon'     => 'move',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'share',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'share-alt',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'share-alt2',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'twitter',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'rss',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'email',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'email-alt',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'facebook',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'facebook-alt',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'googleplus',
			),

			array(
				'category' =>
					array(
						'social',
					),
				'icon'     => 'networking',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'hammer',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'art',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'migrate',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'performance',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'universal-access',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'universal-access-alt',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'tickets',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'nametag',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'clipboard',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'heart',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'megaphone',
			),

			array(
				'category' =>
					array(
						'wordpress-specific',
					),
				'icon'     => 'schedule',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'wordpress',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'wordpress-alt',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'pressthis',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'update',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'screenoptions',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'info',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'cart',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'feedback',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'cloud',
			),

			array(
				'category' =>
					array(
						'products',
					),
				'icon'     => 'translation',
			),

			array(
				'category' =>
					array(
						'taxonomies',
					),
				'icon'     => 'tag',
			),

			array(
				'category' =>
					array(
						'taxonomies',
					),
				'icon'     => 'category',
			),

			array(
				'category' =>
					array(
						'widgets',
					),
				'icon'     => 'archive',
			),

			array(
				'category' =>
					array(
						'widgets',
					),
				'icon'     => 'tagcloud',
			),

			array(
				'category' =>
					array(
						'widgets',
					),
				'icon'     => 'text',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'yes',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'no',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'no-alt',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'plus',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'plus-alt',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'minus',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'dismiss',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'marker',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'star-filled',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'star-half',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'star-empty',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'flag',
			),

			array(
				'category' =>
					array(
						'notifications',
					),
				'icon'     => 'warning',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'location',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'location-alt',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'vault',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'shield',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'shield-alt',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'sos',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'search',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'slides',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'analytics',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'chart-pie',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'chart-bar',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'chart-line',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'chart-area',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'groups',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'businessman',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'id',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'id-alt',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'products',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'awards',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'forms',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'testimonial',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'portfolio',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'book',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'book-alt',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'download',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'upload',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'backup',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'clock',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'lightbulb',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'microphone',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'desktop',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'laptop',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'tablet',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'smartphone',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'phone',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'index-card',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'carrot',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'building',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'store',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'album',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'palmtree',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'tickets-alt',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'money',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'smiley',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'thumbs-up',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'thumbs-down',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'layout',
			),

			array(
				'category' =>
					array(
						'misc',
					),
				'icon'     => 'paperclip',
			),
		),
		'genericon' => array(
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'standard',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'aside',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'image',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'gallery',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'video',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'status',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'quote',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'link',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'chat',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'audio',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'github',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'dribbble',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'twitter',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'facebook',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'facebook-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'wordpress',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'googleplus',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'googleplus-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'linkedin',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'linkedin-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'pinterest',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'pinterest-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'flickr',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'vimeo',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'youtube',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'tumblr',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'instagram',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'codepen',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'polldaddy',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'path',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'skype',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'digg',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'reddit',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'stumbleupon',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'pocket',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'dropbox',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'foursquare',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'comment',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'category',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'tag',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'time',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'user',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'day',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'week',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'month',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'pinned',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'search',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'unzoom',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'zoom',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'show',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'hide',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'close',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'close-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'trash',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'star',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'home',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'mail',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'edit',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'reply',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'feed',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'warning',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'share',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'attachment',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'location',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'checkmark',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'menu',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'refresh',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'minimize',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'maximize',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => '404',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'spam',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'summary',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'cloud',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'key',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'dot',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'next',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'previous',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'expand',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'collapse',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'dropdown',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'dropdown-left',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'top',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'draggable',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'phone',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'send-to-phone',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'plugin',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'cloud-download',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'cloud-upload',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'external',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'document',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'book',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'cog',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'unapprove',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'cart',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'pause',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'stop',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'skip-back',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'skip-ahead',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'play',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'tablet',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'send-to-tablet',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'info',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'notice',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'help',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'fastforward',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'rewind',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'portfolio',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'heart',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'code',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'subscribe',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'unsubscribe',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'subscribed',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'reply-alt',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'reply-single',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'flag',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'print',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'lock',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'bold',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'italic',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'picture',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'fullscreen',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'website',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'ellipsis',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'uparrow',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'rightarrow',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'downarrow',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'leftarrow',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'xpost',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'hierarchy',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'paintbrush',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'sitemap',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'activity',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'anchor',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'bug',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'download',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'handset',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'microphone',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'minus',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'move',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'plus',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'rating-empty',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'rating-full',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'rating-half',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'shuffle',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'spotify',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'twitch',
			),
			array(
				'category' =>
					array(
						'',
					),
				'icon'     => 'videocamera',
			),
		),
		'fa'        => array(

			array(
				'icon'     => 'address-book',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'address-book-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'address-card',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'address-card-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'adjust',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'american-sign-language-interpreting',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'anchor',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'archive',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'area-chart',
				'category' =>
					array(
						'web-application',
						'chart',
					),
			),

			array(
				'icon'     => 'arrows',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'arrows-h',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'arrows-v',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'assistive-listening-systems',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'asterisk',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'at',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'audio-description',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'balance-scale',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'ban',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bar-chart',
				'category' =>
					array(
						'web-application',
						'chart',
					),
			),

			array(
				'icon'     => 'barcode',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bars',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bath',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'battery-empty',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'battery-full',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'battery-half',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'battery-quarter',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'battery-three-quarters',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bed',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'beer',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bell',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bell-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bell-slash',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bell-slash-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bicycle',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'binoculars',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'birthday-cake',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'blind',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'bluetooth',
				'category' =>
					array(
						'web-application',
						'brand',
					),
			),

			array(
				'icon'     => 'bluetooth-b',
				'category' =>
					array(
						'web-application',
						'brand',
					),
			),

			array(
				'icon'     => 'bolt',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bomb',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'book',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bookmark',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bookmark-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'braille',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'briefcase',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bug',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'building',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'building-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bullhorn',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bullseye',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'bus',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'calculator',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar-check-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar-minus-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar-plus-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'calendar-times-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'camera',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'camera-retro',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'car',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'caret-square-o-down',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'caret-square-o-left',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'caret-square-o-right',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'caret-square-o-up',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'cart-arrow-down',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cart-plus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cc',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'certificate',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'check',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'check-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'check-circle-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'check-square',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'check-square-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'child',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'circle',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'circle-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'circle-o-notch',
				'category' =>
					array(
						'web-application',
						'spinner',
					),
			),

			array(
				'icon'     => 'circle-thin',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'clock-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'clone',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cloud',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cloud-download',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cloud-upload',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'code',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'code-fork',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'coffee',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cog',
				'category' =>
					array(
						'web-application',
						'spinner',
					),
			),

			array(
				'icon'     => 'cogs',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'comment',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'comment-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'commenting',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'commenting-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'comments',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'comments-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'compass',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'copyright',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'creative-commons',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'credit-card',
				'category' =>
					array(
						'web-application',
						'payment',
					),
			),

			array(
				'icon'     => 'credit-card-alt',
				'category' =>
					array(
						'web-application',
						'payment',
					),
			),

			array(
				'icon'     => 'crop',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'crosshairs',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cube',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cubes',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'cutlery',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'database',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'deaf',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'desktop',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'diamond',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'dot-circle-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'download',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'ellipsis-h',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'ellipsis-v',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'envelope',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'envelope-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'envelope-open',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'envelope-open-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'envelope-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'eraser',
				'category' =>
					array(
						'web-application',
						'text-editor',
					),
			),

			array(
				'icon'     => 'exchange',
				'category' =>
					array(
						'web-application',
						'directional',
					),
			),

			array(
				'icon'     => 'exclamation',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'exclamation-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'exclamation-triangle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'external-link',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'external-link-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'eye',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'eye-slash',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'eyedropper',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'fax',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'female',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'fighter-jet',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'file-archive-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-audio-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-code-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-excel-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-image-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-pdf-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-powerpoint-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-video-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'file-word-o',
				'category' =>
					array(
						'web-application',
						'file-type',
					),
			),

			array(
				'icon'     => 'film',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'filter',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'fire',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'fire-extinguisher',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'flag',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'flag-checkered',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'flag-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'flask',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'folder',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'folder-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'folder-open',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'folder-open-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'frown-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'futbol-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'gamepad',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'gavel',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'gift',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'glass',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'globe',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'graduation-cap',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hand-lizard-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-paper-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-peace-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-pointer-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-rock-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-scissors-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'hand-spock-o',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'handshake-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hashtag',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hdd-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'headphones',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'heart',
				'category' =>
					array(
						'web-application',
						'medical',
					),
			),

			array(
				'icon'     => 'heart-o',
				'category' =>
					array(
						'web-application',
						'medical',
					),
			),

			array(
				'icon'     => 'heartbeat',
				'category' =>
					array(
						'web-application',
						'medical',
					),
			),

			array(
				'icon'     => 'history',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'home',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hourglass',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hourglass-end',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hourglass-half',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hourglass-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hourglass-start',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'i-cursor',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'id-badge',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'id-card',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'id-card-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'inbox',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'industry',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'info',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'info-circle',
				'category' =>
					array(
						'web-application',
						'spinner'
					),
			),

			array(
				'icon'     => 'key',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'keyboard-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'language',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'laptop',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'leaf',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'lemon-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'level-down',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'level-up',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'life-ring',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'lightbulb-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'line-chart',
				'category' =>
					array(
						'web-application',
						'chart',
					),
			),

			array(
				'icon'     => 'location-arrow',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'lock',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'low-vision',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'magic',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'magnet',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'male',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'map',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'map-marker',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'map-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'map-pin',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'map-signs',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'meh-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'microchip',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'microphone',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'microphone-slash',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'minus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'minus-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'minus-square',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'minus-square-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'mobile',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'money',
				'category' =>
					array(
						'web-application',
						'currency',
					),
			),

			array(
				'icon'     => 'moon-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'motorcycle',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'mouse-pointer',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'music',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'newspaper-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'object-group',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'object-ungroup',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'paint-brush',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'paper-plane',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'paper-plane-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'paw',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'pencil',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'pencil-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'pencil-square-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'percent',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'phone',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'phone-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'picture-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'pie-chart',
				'category' =>
					array(
						'web-application',
						'chart',
					),
			),

			array(
				'icon'     => 'plane',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'plug',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'plus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'plus-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'plus-square',
				'category' =>
					array(
						'web-application',
						'form-control',
						'medical',
					),
			),

			array(
				'icon'     => 'plus-square-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'podcast',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'power-off',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'print',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'puzzle-piece',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'qrcode',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'question',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'question-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'question-circle-o',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'quote-left',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'quote-right',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'random',
				'category' =>
					array(
						'web-application',
						'video-player',
					),
			),

			array(
				'icon'     => 'recycle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'refresh',
				'category' =>
					array(
						'web-application',
						'spinner',
					),
			),

			array(
				'icon'     => 'registered',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'reply',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'reply-all',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'retweet',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'road',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'rocket',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'rss',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'rss-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'search',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'search-minus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'search-plus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'server',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'share',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'share-alt',
				'category' =>
					array(
						'web-application',
						'brand',
					),
			),

			array(
				'icon'     => 'share-alt-square',
				'category' =>
					array(
						'web-application',
						'brand',
					),
			),

			array(
				'icon'     => 'share-square',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'share-square-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'shield',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'ship',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'shopping-bag',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'shopping-basket',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'shopping-cart',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'shower',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sign-in',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sign-language',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'sign-out',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'signal',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sitemap',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sliders',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'smile-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'snowflake-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-alpha-asc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-alpha-desc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-amount-asc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-amount-desc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-asc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-desc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-numeric-asc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sort-numeric-desc',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'space-shuttle',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'spinner',
				'category' =>
					array(
						'web-application',
						'spinner',
					),
			),

			array(
				'icon'     => 'spoon',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'square',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'square-o',
				'category' =>
					array(
						'web-application',
						'form-control',
					),
			),

			array(
				'icon'     => 'star',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'star-half',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'star-half-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'star-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sticky-note',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sticky-note-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'street-view',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'suitcase',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'sun-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tablet',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tachometer',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tag',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tags',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tasks',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'taxi',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'television',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'terminal',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thermometer-empty',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thermometer-full',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thermometer-half',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thermometer-quarter',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thermometer-three-quarters',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thumb-tack',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'thumbs-down',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'thumbs-o-down',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'thumbs-o-up',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'thumbs-up',
				'category' =>
					array(
						'web-application',
						'hand',
					),
			),

			array(
				'icon'     => 'ticket',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'times',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'times-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'times-circle-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tint',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'toggle-off',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'toggle-on',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'trademark',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'trash',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'trash-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'tree',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'trophy',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'truck',
				'category' =>
					array(
						'web-application',
						'transportation',
					),
			),

			array(
				'icon'     => 'tty',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'umbrella',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'universal-access',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'university',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'unlock',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'unlock-alt',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'upload',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-circle',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-circle-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-plus',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-secret',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'user-times',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'users',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'video-camera',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'volume-control-phone',
				'category' =>
					array(
						'web-application',
						'accessibility',
					),
			),

			array(
				'icon'     => 'volume-down',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'volume-off',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'volume-up',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'wheelchair',
				'category' =>
					array(
						'web-application',
						'accessibility',
						'transportation',
						'medical',
					),
			),

			array(
				'icon'     => 'wheelchair-alt',
				'category' =>
					array(
						'web-application',
						'accessibility',
						'transportation',
						'medical',
					),
			),

			array(
				'icon'     => 'wifi',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'window-close',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'window-close-o',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'window-maximize',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'window-minimize',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'window-restore',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'wrench',
				'category' =>
					array(
						'web-application',
					),
			),

			array(
				'icon'     => 'hand-o-down',
				'category' =>
					array(
						'hand',
						'directional',
					),
			),

			array(
				'icon'     => 'hand-o-left',
				'category' =>
					array(
						'hand',
						'directional',
					),
			),

			array(
				'icon'     => 'hand-o-right',
				'category' =>
					array(
						'hand',
						'directional',
					),
			),

			array(
				'icon'     => 'hand-o-up',
				'category' =>
					array(
						'hand',
						'directional',
					),
			),

			array(
				'icon'     => 'ambulance',
				'category' =>
					array(
						'transportation',
						'medical',
					),
			),

			array(
				'icon'     => 'subway',
				'category' =>
					array(
						'transportation',
					),
			),

			array(
				'icon'     => 'train',
				'category' =>
					array(
						'transportation',
					),
			),

			array(
				'icon'     => 'genderless',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mars',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mars-double',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mars-stroke',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mars-stroke-h',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mars-stroke-v',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'mercury',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'neuter',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'transgender',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'transgender-alt',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'venus',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'venus-double',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'venus-mars',
				'category' =>
					array(
						'gender',
					),
			),

			array(
				'icon'     => 'file',
				'category' =>
					array(
						'file-type',
						'text-editor',
					),
			),

			array(
				'icon'     => 'file-o',
				'category' =>
					array(
						'file-type',
						'text-editor',
					),
			),

			array(
				'icon'     => 'file-text',
				'category' =>
					array(
						'file-type',
						'text-editor',
					),
			),

			array(
				'icon'     => 'file-text-o',
				'category' =>
					array(
						'file-type',
						'text-editor',
					),
			),

			array(
				'icon'     => 'cc-amex',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-diners-club',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-discover',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-jcb',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-mastercard',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-paypal',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-stripe',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'cc-visa',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'google-wallet',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'paypal',
				'category' =>
					array(
						'payment',
						'brand',
					),
			),

			array(
				'icon'     => 'btc',
				'category' =>
					array(
						'currency',
						'brand',
					),
			),

			array(
				'icon'     => 'eur',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'gbp',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'gg',
				'category' =>
					array(
						'currency',
						'brand',
					),
			),

			array(
				'icon'     => 'gg-circle',
				'category' =>
					array(
						'currency',
						'brand',
					),
			),

			array(
				'icon'     => 'ils',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'inr',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'jpy',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'krw',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'rub',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'try',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'usd',
				'category' =>
					array(
						'currency',
					),
			),

			array(
				'icon'     => 'align-center',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'align-justify',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'align-left',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'align-right',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'bold',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'chain-broken',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'clipboard',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'columns',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'files-o',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'floppy-o',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'font',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'header',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'indent',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'italic',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'link',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'list',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'list-alt',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'list-ol',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'list-ul',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'outdent',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'paperclip',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'paragraph',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'repeat',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'scissors',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'strikethrough',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'subscript',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'superscript',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'table',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'text-height',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'text-width',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'th',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'th-large',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'th-list',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'underline',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'undo',
				'category' =>
					array(
						'text-editor',
					),
			),

			array(
				'icon'     => 'angle-double-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-double-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-double-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-double-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'angle-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-o-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-o-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-o-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-o-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-circle-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrow-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'arrows-alt',
				'category' =>
					array(
						'directional',
						'video-player',
					),
			),

			array(
				'icon'     => 'caret-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'caret-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'caret-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'caret-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-circle-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-circle-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-circle-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-circle-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'chevron-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'long-arrow-down',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'long-arrow-left',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'long-arrow-right',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'long-arrow-up',
				'category' =>
					array(
						'directional',
					),
			),

			array(
				'icon'     => 'backward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'compress',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'eject',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'expand',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'fast-backward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'fast-forward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'forward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'pause',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'pause-circle',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'pause-circle-o',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'play',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'play-circle',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'play-circle-o',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'step-backward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'step-forward',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'stop',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'stop-circle',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'stop-circle-o',
				'category' =>
					array(
						'video-player',
					),
			),

			array(
				'icon'     => 'youtube-play',
				'category' =>
					array(
						'video-player',
						'brand',
					),
			),

			array(
				'icon'     => '500px',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'adn',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'amazon',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'android',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'angellist',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'apple',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'bandcamp',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'behance',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'behance-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'bitbucket',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'bitbucket-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'black-tie',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'buysellads',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'chrome',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'codepen',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'codiepie',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'connectdevelop',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'contao',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'css3',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'dashcube',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'delicious',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'deviantart',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'digg',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'dribbble',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'dropbox',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'drupal',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'edge',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'eercast',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'empire',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'envira',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'etsy',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'expeditedssl',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'facebook',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'facebook-official',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'facebook-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'firefox',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'first-order',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'flickr',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'font-awesome',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'fonticons',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'fort-awesome',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'forumbee',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'foursquare',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'free-code-camp',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'get-pocket',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'git',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'git-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'github',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'github-alt',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'github-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'gitlab',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'glide',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'glide-g',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'google',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'google-plus',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'google-plus-official',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'google-plus-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'gratipay',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'grav',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'hacker-news',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'houzz',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'html5',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'imdb',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'instagram',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'internet-explorer',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'ioxhost',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'joomla',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'jsfiddle',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'lastfm',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'lastfm-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'leanpub',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'linkedin',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'linkedin-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'linode',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'linux',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'maxcdn',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'meanpath',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'medium',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'meetup',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'mixcloud',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'modx',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'odnoklassniki',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'odnoklassniki-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'opencart',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'openid',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'opera',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'optin-monster',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pagelines',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pied-piper',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pied-piper-alt',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pied-piper-pp',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pinterest',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pinterest-p',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'pinterest-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'product-hunt',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'qq',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'quora',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'ravelry',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'rebel',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'reddit',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'reddit-alien',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'reddit-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'renren',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'safari',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'scribd',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'sellsy',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'shirtsinbulk',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'simplybuilt',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'skyatlas',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'skype',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'slack',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'slideshare',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'snapchat',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'snapchat-ghost',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'snapchat-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'soundcloud',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'spotify',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'stack-exchange',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'stack-overflow',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'steam',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'steam-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'stumbleupon',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'stumbleupon-circle',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'superpowers',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'telegram',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'tencent-weibo',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'themeisle',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'trello',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'tripadvisor',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'tumblr',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'tumblr-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'twitch',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'twitter',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'twitter-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'usb',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'viacoin',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'viadeo',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'viadeo-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'vimeo',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'vimeo-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'vine',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'vk',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'weibo',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'weixin',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'whatsapp',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'wikipedia-w',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'windows',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'wordpress',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'wpbeginner',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'wpexplorer',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'wpforms',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'xing',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'xing-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'y-combinator',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'yahoo',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'yelp',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'yoast',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'youtube',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'youtube-square',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'warning',
				'category' =>
					array(
						'brand',
					),
			),

			array(
				'icon'     => 'h-square',
				'category' =>
					array(
						'medical',
					),
			),

			array(
				'icon'     => 'hospital-o',
				'category' =>
					array(
						'medical',
					),
			),

			array(
				'icon'     => 'medkit',
				'category' =>
					array(
						'medical',
					),
			),

			array(
				'icon'     => 'stethoscope',
				'category' =>
					array(
						'medical',
					),
			),

			array(
				'icon'     => 'user-md',
				'category' =>
					array(
						'medical',
					),
			),
		)
	);


	/**
	 * @var array protocols that are allowed in esc_url validation function.
	 */
	protected $protocols = array(
		'skype',
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
	public function __construct() {
		parent::__construct(
			'zoom-social-icons-widget',
			esc_html__( 'Social Icons by WPZOOM', 'zoom-social-icons-widget' ),
			array(
				'classname'   => 'zoom-social-icons-widget',
				'description' => __( 'Sortable widget that supports more than 80+ social networks', 'zoom-social-icons-widget' ),
			)
		);

		$this->icons     = apply_filters( 'zoom_social_icons_filter', $this->icons );
		$this->protocols = apply_filters( 'zoom_social_protocols_filter', $this->protocols );

		$this->plugin_file = dirname( __FILE__ ) . '/social-icons-widget-by-wpzoom.php';

		add_action('current_screen', array($this, 'check_current_screen'));
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts' ) );

		//Hooks to enqueue javascript file in SiteOrigin builder.
		add_action( 'siteorigin_panel_enqueue_admin_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'siteorigin_panel_enqueue_admin_scripts', array( $this, 'admin_js_templates' ) );

	}

	/**
	 * Enqueue admin javascript only on widgets and customizer pages.
	 */
	public function check_current_screen() {
		$current_screen = get_current_screen();

		if ( ! empty( $current_screen->id ) && ( $current_screen->id === 'widgets' || $current_screen->id === 'customize' ) ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
			add_action( 'admin_print_footer_scripts', array( $this, 'admin_js_templates' ) );
		}
	}

	/**
	 * JavaScript templates for back-end widget form.
	 */
	public function admin_js_templates() {
		?>
		<script type="text/x-template" id="tmpl-zoom-social-modal"><?php $this->get_modal_template(); ?></script>
		<?php
	}

	/**
	 * Modal template render function.
	 */
	public function get_modal_template() {
		?>
		<div class="modal-mask">
			<div class="media-modal wp-core-ui zoom-social-modal-wrapper">
				<button type="button" class="media-modal-close" @click="$emit('close')"><span
						class="media-modal-icon"><span class="screen-reader-text">Close media panel</span></span>
				</button>
				<div class="media-modal-content">

					<div class="zoom-social-modal-title">
						<slot name="header">
							<h3><?php _e( 'Select Icon', 'zoom-social-icons-widget' ) ?></h3>
						</slot>
					</div>

					<div class="zoom-social-modal-content">
						<slot name="body">

							<div class="zoom-social-modal-form">
								<div class="form-group">
									<div class="wrap-label">
										<label><?php _e( 'Choose icon color', 'zoom-social-icons-widget' ) ?></label>

									</div>
									<div class="wrap-input wrap-input-color-picker">
										<input type="text" class="zoom-social-icons__field-color-picker"
										       name="zoom-social-icons__field-color-picker"
										       v-model="modal_color_picker" :value="modal_color_picker">
									</div>
								</div>
								<div class="form-group">
									<div class="wrap-label">
										<label><?php _e( 'Choose hover color', 'zoom-social-icons-widget' ) ?></label>

									</div>
									<div class="wrap-input wrap-input-color-picker-hover">
										<input type="text" class="zoom-social-icons__field-color-picker"
										       name="zoom-social-icons__field-color-picker-hover"
										       v-model="modal_color_picker_hover" :value="modal_color_picker_hover">
									</div>
								</div>
								<div class="form-group">
									<div class="wrap-label">
										<label><?php _e( 'Select Icon Kit', 'zoom-social-icons-widget' ) ?></label>
									</div>
									<div class="wrap-input">
										<select v-model='modal_icon_kit' class="zoom-social-icons__field-icon-kit"
										        name="zoom-social-icons__field-icon-kit">
											<option
												value="socicon"><?php _e( 'Socicons', 'zoom-social-icons-widget' ) ?></option>
											<option
												value="dashicons"><?php _e( 'Dashicons', 'zoom-social-icons-widget' ) ?></option>
											<option
												value="genericon"><?php _e( 'Genericons', 'zoom-social-icons-widget' ) ?></option>
											<option
												value="fa"><?php _e( 'Font Awesome', 'zoom-social-icons-widget' ) ?></option>
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
										<p v-show="searchIconsLength && icons_kit.length ">{{ icon_type |
											humanizeIconType | capitalize
											}}</p>
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
	                                            :class='["zoom-social-icons__single-element" ,icon_type , icon_type+"-"+icon.icon, icon_canvas_style, {selected : icon.icon === modal_icon && icon_type === modal_icon_kit }]'
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
	public function admin_scripts() {

		wp_enqueue_style( 'socicon', plugin_dir_url( $this->plugin_file ) . 'assets/css/socicon.css', array(), '20180625' );
		wp_enqueue_style( 'social-icons-widget-admin', plugin_dir_url( $this->plugin_file ) . 'assets/css/social-icons-widget-admin.css', array( 'socicon' ), '20180625' );
		wp_enqueue_style( 'genericons', plugin_dir_url( $this->plugin_file ) . 'assets/css/genericons.css', array(), '20180625' );
		wp_enqueue_style( 'fontawesome', plugin_dir_url( $this->plugin_file ) . 'assets/css/font-awesome.min.css', array(), '20180625' );
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_media();

		wp_enqueue_script(
			'zoom-social-icons-widget-vue-js',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/vue.js',
			array(),
			'20170209',
			true
		);
		wp_enqueue_script(
			'zoom-social-icons-widget-sortable-js',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/sortable.min.js',
			array(),
			'20170209',
			true
		);

		wp_enqueue_script(
			'zoom-social-icons-widget-vue-sortable-js',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/vue-sortable.js',
			array(),
			'20170209',
			true
		);

		wp_enqueue_script(
			'zoom-social-icons-widget-uri-js',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/URI.min.js',
			array(),
			'20170209',
			true
		);

		wp_enqueue_script(
			'zoom-social-icons-widget-scroll-to',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/jquery.scrollTo.min.js',
			array( 'jquery' ),
			'20170209',
			true
		);

		wp_enqueue_script(
			'zoom-social-icons-widget',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/social-icons-widget-backend.js',
			array( 'jquery', 'underscore', 'wp-util', 'wp-color-picker' ),
			'20170913',
			true
		);

		wp_localize_script( 'zoom-social-icons-widget', 'zoom_social_widget_data', array(
			'icons'      => $this->get_icons_pack(),
			'categories' => $this->get_icon_categories()
		) );

	}

	/**
	 * Get icons pack by its name by default return all packs.
	 *
	 * @param string $type
	 *
	 * @return array
	 */
	public function get_icons_pack( $type = 'all' ) {

		return array_key_exists( $type, $this->icons ) ? $this->icons[ $type ] : $this->icons;
	}

	/**
	 * Get icons pack categories.
	 *
	 * @return array
	 */
	public function get_icon_categories() {
		return apply_filters( 'zoom_social_icons_get_icon_categories',
			array(
				'socicon'   =>
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
				'fa'        =>
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
			) );
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

		$instance['title']                     = sanitize_text_field( $new_instance['title'] );
		$instance['description']               = balanceTags( wp_kses( $new_instance['description'], wp_kses_allowed_html() ), true );
		$instance['show_icon_labels']          = (! empty( $new_instance['show_icon_labels'] ) && $new_instance['show_icon_labels'] === 'true' ) ? 'true' : 'false';
		$instance['open_new_tab']              = (! empty( $new_instance['open_new_tab']) && $new_instance['open_new_tab'] === 'true')  ? 'true' : 'false';
		$instance['no_follow']              = (! empty( $new_instance['no_follow']) && $new_instance['no_follow'] === 'true')  ? 'true' : 'false';
		$instance['icon_padding_size']         = (int) $new_instance['icon_padding_size'];
		$instance['icon_font_size']            = (int) $new_instance['icon_font_size'];
		$instance['global_color_picker']       = $new_instance['global_color_picker'];
		$instance['global_color_picker_hover'] = $new_instance['global_color_picker_hover'];

		if ( in_array( $new_instance['icon_style'], array( 'with-canvas', 'without-canvas' ) ) ) {
			$instance['icon_style'] = $new_instance['icon_style'];
		}

		if ( in_array( $new_instance['icon_canvas_style'], array( 'rounded', 'round', 'square' ) ) ) {
			$instance['icon_canvas_style'] = $new_instance['icon_canvas_style'];
		}

		$field_count = empty( $new_instance['url_fields'] ) ? 0 : count( $new_instance['url_fields'] );

		$instance['fields'] = array();

		for ( $i = 0; $i < $field_count; $i ++ ) {
			$url   = esc_url( $new_instance['url_fields'][ $i ], $this->protocols );
			$label = esc_html( $new_instance['label_fields'][ $i ] );

			if ( $url ) {
				$instance['fields'][] = array(
					'url'                => $url,
					'label'              => $label,
					'icon'               => $new_instance['icon_fields'][ $i ],
					'icon_kit'           => $new_instance['icon_kit_fields'][ $i ],
					'color_picker'       => $new_instance['color_picker_fields'][ $i ],
					'color_picker_hover' => $new_instance['color_picker_hover_fields'][ $i ]
				);
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
	public function form( $instance ) {
		$defaults = $this->get_defaults();

		if ( isset( $instance['show-icon-labels'] ) or
		     isset( $instance['open-new-tab'] ) or
		     isset( $instance['no-follow'] )
		) {
			$instance['show-icon-labels'] = ! empty( $instance['show-icon-labels'] ) ? "true" : "false";
			$instance['open-new-tab']     = ! empty( $instance['open-new-tab'] ) ? "true" : "false";
			$instance['no-follow']        = ! empty( $instance['no-follow'] ) ? "true" : "false";
		}

		$instance = $this->normalize_data_array( $instance );
		$instance = wp_parse_args( $instance, $defaults );

		$this->inject_values( $instance );

		$instance['fields'] = $this->inject_fields_with_data( $instance['fields'] );

		$instance_attr = '';
		$default_field = $this->inject_fields_with_data( $this->get_default_field() );
		$default_field = array_pop( $default_field );
		if ( ! empty( $instance ) ) {
			$encoded = array(
				'id'            => $this->id,
				'instance'      => $instance,
				'default_field' => $default_field
			);

			$instance_attr = 'data-instance="' . htmlentities( json_encode( $encoded ) ) . '"';
		}

		?>
		<div class="form-instance" <?php echo $instance_attr ?> id="<?php echo $this->id ?>">
			<p>

				<label
					for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'zoom-social-icons-widget' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" v-model="title"
				       name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"/>
			</p>

			<p>
				<label
					for="<?php echo $this->get_field_id( 'description' ); ?>"><?php esc_html_e( 'Description:', 'zoom-social-icons-widget' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>"
                      name="<?php echo $this->get_field_name( 'description' ); ?>" cols="20" v-model="description"
                      rows="3"></textarea>
				<small><?php _e( 'Short description to be displayed right above the icons. Basic HTML allowed.', 'zoom-social-icons-widget' ); ?></small>
			</p>

			<p>
				<input class="checkbox zoom-social-icons-show-icon-labels"
				       type="checkbox"
				       v-model="show_icon_labels"
				       :true-value="'true'"
				       :false-value="'false'"
				       :value="show_icon_labels"
				       id="<?php echo $this->get_field_id( 'show_icon_labels' ); ?>"
				       name="<?php echo $this->get_field_name( 'show_icon_labels' ); ?>"/>
				<label
					for="<?php echo $this->get_field_id( 'show_icon_labels' ); ?>"><?php _e( 'Show icon labels? ', 'zoom-social-icons-widget' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox"
				       v-model="open_new_tab"
				       :true-value="'true'"
				       :false-value="'false'"
				       :value="open_new_tab"
				       id="<?php echo $this->get_field_id( 'open_new_tab' ); ?>"
				       name="<?php echo $this->get_field_name( 'open_new_tab' ); ?>"/>
				<label
					for="<?php echo $this->get_field_id( 'open_new_tab' ); ?>"><?php _e( 'Open links in new tab? ', 'zoom-social-icons-widget' ); ?></label>
			</p>

			<p>
				<input class="checkbox" type="checkbox"
				       v-model="no_follow"
				       :true-value="'true'"
				       :false-value="'false'"
				       :value="no_follow"
				       id="<?php echo $this->get_field_id( 'no_follow' ); ?>"
				       name="<?php echo $this->get_field_name( 'no_follow' ); ?>"/>
				<label
					for="<?php echo $this->get_field_id( 'no_follow' ); ?>"><?php _e( 'Add <code>rel="nofollow"</code> to links', 'zoom-social-icons-widget' ); ?></label>
			</p>

			<p>
				<label
					for="<?php echo $this->get_field_id( 'icon_style' ); ?>"><?php _e( 'Icon Style:', 'zoom-social-icons-widget' ); ?>
				</label>
				<select name="<?php echo $this->get_field_name( 'icon_style' ); ?>"
				        id="<?php echo $this->get_field_id( 'icon_style' ); ?>"
				        v-model="icon_style"
				        class="widefat">
					<option
						value="with-canvas"><?php esc_html_e( 'Color Background / White Icon', 'zoom-social-icons-widget' ); ?></option>
					<option
						value="without-canvas"><?php esc_html_e( 'Color Icon / No Background', 'zoom-social-icons-widget' ); ?></option>
				</select>
			</p>

			<p>
				<label
					:style="iconCanvasStyleLabel()"
					for="<?php echo $this->get_field_id( 'icon_canvas_style' ); ?>"><?php _e( 'Icon Background Style:', 'zoom-social-icons-widget' ); ?></label>
				<select
					:disabled="this.icon_style == 'without-canvas'"
					name="<?php echo $this->get_field_name( 'icon_canvas_style' ); ?>"
					id="<?php echo $this->get_field_id( 'icon_canvas_style' ); ?>"
					v-model="icon_canvas_style"
					class="widefat zoom-social-icons-change-icon-canvas-style">
					<option
						value="rounded"><?php esc_html_e( 'Rounded Corners', 'zoom-social-icons-widget' ); ?></option>
					<option
						value="round"><?php esc_html_e( 'Round', 'zoom-social-icons-widget' ); ?></option>
					<option
						value="square"><?php esc_html_e( 'Square', 'zoom-social-icons-widget' ); ?></option>
				</select>
			</p>

			<p>
				<small>
					<?php echo wp_kses_post( __( 'Icon Background Style has no effect on <i>Color Icon / No Background</i> icon style.', 'zoom-social-icons-widget' ) ); ?>
				</small>
			</p>

			<p>
				<label
					for="<?php echo $this->get_field_id( 'icon_padding_size' ) ?>"><?php _e( 'Icon Padding (pixels):', 'zoom-social-icons-widget' ) ?>
					<input type="number" min="0" max="200"
					       id="<?php echo $this->get_field_id( 'icon_padding_size' ) ?>"
					       name="<?php echo $this->get_field_name( 'icon_padding_size' ) ?>"
					       v-model="icon_padding_size"
					       class="widefat"/>
				</label>
			</p>

			<p>
				<label
					for="<?php echo $this->get_field_id( 'icon_font_size' ) ?>"><?php _e( 'Icon Size (pixels):', 'zoom-social-icons-widget' ) ?>
					<input type="number" min="0" max="200"
					       id="<?php echo $this->get_field_id( 'icon_font_size' ) ?>"
					       name="<?php echo $this->get_field_name( 'icon_font_size' ) ?>"
					       v-model="icon_font_size"
					       class="widefat"/>
				</label>
			</p>

			<p>
				<label><?php _e( 'Set color for all icons' ) ?></label>
			<div class="wrap-input-color-picker">
				<input
					v-model="global_color_picker"
					type="text"
					class="zoom-social-icons__field-color-picker"
					id="<?php echo $this->get_field_id( 'global_color_picker' ) ?>"
					name="<?php echo $this->get_field_name( 'global_color_picker' ) ?>"
					:value="global_color_picker"
				>
			</div>
			</p>
			<p>
				<label><?php _e( 'Set hover color for all icons' ) ?></label>
			<div class="wrap-input-color-picker">
				<input
					v-model="global_color_picker_hover"
					type="text"
					class="zoom-social-icons__field-color-picker"
					id="<?php echo $this->get_field_id( 'global_color_picker_hover' ) ?>"
					name="<?php echo $this->get_field_name( 'global_color_picker_hover' ) ?>"
					:value="global_color_picker_hover"
				>
			</div>
			</p>
			<p style="margin-bottom: 0;"><?php _e( 'Icons:', 'zoom-social-icons-widget' ); ?></p>

			<div class="must-remove">
				<input type="hidden" value="<?php echo $defaults['title'] ?>"
				       id="<?php echo $this->get_field_id( 'title' ); ?>"
				       name="<?php echo $this->get_field_name( 'title' ); ?>"/>
				<input type="hidden" value="<?php echo $defaults['description'] ?>"
				       id="<?php echo $this->get_field_id( 'description' ); ?>"
				       name="<?php echo $this->get_field_name( 'description' ); ?>"/>
				<input type='hidden' value="<?php echo $defaults['open_new_tab'] ?>"
				       id="<?php echo $this->get_field_id( 'open_new_tab' ); ?>"
				       name="<?php echo $this->get_field_name( 'open_new_tab' ); ?>"/>
				<input type='hidden' value="<?php echo $defaults['no_follow'] ?>"
				       id="<?php echo $this->get_field_id( 'no_follow' ); ?>"
				       name="<?php echo $this->get_field_name( 'no_follow' ); ?>"/>
				<input type='hidden' value="<?php echo $defaults['show_icon_labels'] ?>"
				       id="<?php echo $this->get_field_id( 'show_icon_labels' ); ?>"
				       name="<?php echo $this->get_field_name( 'show_icon_labels' ); ?>"/>
				<?php

				foreach ( $instance['fields'] as $field ) {
					printf( '<input  type="hidden" id="%1$s" name="%2$s"  value="%3$s">',
						$field['url_field_id'],
						$field['url_field_name'],
						esc_attr( $field['url'] )
					);

					printf( '<input type="hidden" id="%1$s" name="%2$s" value="%3$s">',
						$field['label_field_id'],
						$field['label_field_name'],
						esc_attr( $field['label'] )
					);

					printf( '<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
						$field['color_picker_field_id'],
						$field['color_picker_field_name'],
						esc_attr( $field['color_picker'] )
					);

					printf( '<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
						$field['color_picker_hover_field_id'],
						$field['color_picker_hover_field_name'],
						esc_attr( $field['color_picker_hover'] )
					);

					printf( '<input type="hidden"  id="%1$s" name="%2$s" value="%3$s">',
						$field['icon_field_id'],
						$field['icon_field_name'],
						esc_attr( $field['icon'] )
					);

					printf( '<input type="hidden"   id="%1$s" name="%2$s" value="%3$s">',
						$field['icon_kit_field_id'],
						$field['icon_kit_field_name'],
						esc_attr( $field['icon_kit'] )
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
							@input='field.color_picker = arguments[0];field.icon_kit = arguments[1];field.icon = arguments[2];field.color_picker_hover=arguments[3]'
							@keyup.esc.stop="closeModal(key)"
							@close='closeModal(key)'
							v-if='field.show_modal'
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
            <span class="zoom-social-icons__field-icon-handler "
                  :style="normalizeStyle(key)"
                  :class="[ field.icon_kit, field.icon_kit+'-'+field.icon, icon_canvas_style]"
                  @mouseover='mouseoverIcon(key, $event)'
                  @mouseleave='mouseleaveIcon(key, $event)'
                  @click="clickonIconHandler(key)"></span>
						<div class="zoom-social-icons__cw">
							<div class="zoom-social-icons__inputs">

								<input class="widefat zoom-social-icons__field-url"
								       :id="field.url_field_id"
								       :name="field.url_field_name"
								       v-model="field.url"
								       type="text"
								       :value="field.url_field_name"
								       @input="urlFieldNameHandler(key)"
								       @keyup.enter.stop="insertField"
								       placeholder="<?php _e( 'Start typing the URL...', 'zoom-social-icons-widget' ) ?>">
								<input class="widefat zoom-social-icons__field-label"
								       :id="field.label_field_id"
								       :name="field.label_field_name" v-model="field.label" type="text"
								       :value="field.label_field_name"
								       placeholder="<?php _e( 'Label', 'zoom-social-icons-widget' ) ?>">
								<input type="hidden"
								       :id="field.color_picker_field_id"
								       :name="field.color_picker_field_name"
								       v-model='field.color_picker'
								       :value="field.color_picker">
								<input type="hidden"
								       :id="field.color_picker_hover_field_id"
								       :name="field.color_picker_hover_field_name"
								       v-model='field.color_picker_hover' :value="field.color_picker_hover">
								<input type="hidden"
								       :id="field.icon_field_id"
								       :name="field.icon_field_name" v-model="field.icon" :value="field.icon">
								<input type="hidden"
								       :id="field.icon_kit_field_id"
								       :name="field.icon_kit_field_name" v-model="field.icon_kit"
								       :value="field.icon_kit">
							</div>
						</div>


						<a v-show='fields.length > 1' class="zoom-social-icons__field-trash" href="#"
						   @click.prevent="clickOnDeleteIconHandler(key)"><span
								class="dashicons dashicons-trash"></span></a>

						<br style="clear:both">
					</li>

				</template>

			</ul>

			<div class="zoom-social-icons__add-button">
				<a @click.prevent='insertField'
				   class="button"><?php _e( 'Add more', 'zoom-social-icons-widget' ); ?></a>
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
		</div>
		<?php
	}

	/**
	 * Get default values for the first render when nothing is saved in databases.
	 *
	 * @return array
	 */
	public function get_defaults() {
		return apply_filters( 'zoom_social_icons_get_defaults', array(
				'title'                     => esc_html__('Follow us', 'zoom-social-icons-widget'),
				'description'               => '',
				'show_icon_labels'          => 'false',
				'open_new_tab'              => 'true',
				'no_follow'              => 'false',
				'icon_style'                => 'with-canvas',
				'icon_canvas_style'         => 'rounded',
				'icon_padding_size'         => 8,
				'icon_font_size'            => 18,
				'global_color_picker'       => '#1e73be',
				'global_color_picker_hover' => '#1e73be',
				'fields'                    => array(
					array(
						'url'                => 'https://facebook.com/wpzoom',
						'label'              => 'Facebook',
						'icon'               => 'facebook',
						'icon_kit'           => 'socicon',
						'color_picker'       => '#3b5998',
						'color_picker_hover' => '#3b5998'
					),
					array(
						'url'                => 'https://twitter.com/wpzoom',
						'label'              => 'Twitter',
						'icon'               => 'twitter',
						'icon_kit'           => 'socicon',
						'color_picker'       => '#55acee',
						'color_picker_hover' => '#55acee'
					),
					array(
						'url'                => 'https://instagram.com/wpzoom',
						'label'              => 'Instagram',
						'icon'               => 'instagram',
						'icon_kit'           => 'socicon',
						'color_picker'       => '#E1306C',
						'color_picker_hover' => '#E1306C'
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
		$collector = array();
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
	public function inject_values( &$data ) {
		$socicons = wp_list_pluck( $this->icons['socicon'], 'color', 'icon' );
		foreach ( $data['fields'] as &$field ) {

			$get_icon    = $this->get_icon( $field['url'] );
			$parsed_icon = empty( $get_icon ) ? 'wordpress' : $get_icon;

			if ( empty( $field['icon'] ) && empty( $field['icon_kit'] ) ) {
				$field['icon']     = $parsed_icon;
				$field['icon_kit'] = 'socicon';

				$field['color_picker']       = $socicons[ $parsed_icon ];
				$field['color_picker_hover'] = $socicons[ $parsed_icon ];
			}

			if ( empty( $field['color_picker'] ) or ( strpos( $field['color_picker'], 'rgb' ) !== false ) ) {

				$color                       = empty( $field['color_picker'] ) ? $socicons[ $parsed_icon ] : $this->rgb2hex( $field['color_picker'] );
				$field['color_picker']       = $color;
				$field['color_picker_hover'] = $color;
			}

			if ( empty( $field['color_picker_hover'] ) ) {
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
	protected function get_icon( $url ) {
		$icon       = '';
		$parsed_url = $this->extract_domain( $url );
		if ( $url ) {
			if ( strstr( $url, 'feedburner.google.com' )
			     or strstr( $url, 'mailto:' )
			) {
				$icon = 'mail';
			}
			if ( strstr( $url, 'feedburner.com' ) ) {
				$icon = 'rss';
			}
			if ( ! $icon ) {
				$icons = wp_list_pluck( $this->icons['socicon'], 'icon' );
				foreach ( $icons as $icon_id ) {
					if ( strstr( $parsed_url, $icon_id ) ) {
						$icon = $icon_id;
						break;
					}
				}
			}
		}

		return apply_filters( 'zoom-social-icons-widget-icon', $icon, $url );
	}

	/**
	 * Extract domain from an url.
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	public function extract_domain( $url ) {
		$parsed_url = parse_url( trim( $url ) );
		$path       = empty( $parsed_url['path'] ) ? array( $url ) : explode( '/', $parsed_url['path'], 2 );

		return empty( $parsed_url['host'] ) ? array_shift( $path ) : $parsed_url['host'];
	}

	/**
	 * Convert rgb string to hex string.
	 *
	 * @param $rgb
	 *
	 * @return string
	 */
	function rgb2hex( $rgb ) {
		$rgb = $this->parse_rgb( $rgb );

		return '#' . sprintf( '%02x', $rgb['r'] ) . sprintf( '%02x', $rgb['g'] ) . sprintf( '%02x', $rgb['b'] );
	}

	/**
	 * Parse rgb string and covert its to an array.
	 *
	 * @param $rgb_string
	 *
	 * @return array
	 */
	function parse_rgb( $rgb_string ) {
		$rgb      = array( 'r' => 0, 'g' => 1, 'b' => 2 );
		$exploded = explode( ',', $rgb_string );
		foreach ( $rgb as $key => &$value ) {
			$value = filter_var( $exploded[ $value ], FILTER_SANITIZE_NUMBER_INT );
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
	private function inject_fields_with_data( $fields ) {

		$merged_fields = array();

		$will_be_merged = array(
			'show_modal'                    => false,
			'url_field_id'                  => $this->get_field_id( 'url_fields' ),
			'url_field_name'                => $this->get_field_name( 'url_fields' ) . '[]',
			'label_field_id'                => $this->get_field_id( 'label_fields' ),
			'label_field_name'              => $this->get_field_name( 'label_fields' ) . '[]',
			'color_picker_field_id'         => $this->get_field_id( 'color_picker_fields' ),
			'color_picker_field_name'       => $this->get_field_name( 'color_picker_fields' ) . '[]',
			'color_picker_hover_field_id'   => $this->get_field_id( 'color_picker_hover_fields' ),
			'color_picker_hover_field_name' => $this->get_field_name( 'color_picker_hover_fields' ) . '[]',
			'icon_field_id'                 => $this->get_field_id( 'icon_fields' ),
			'icon_field_name'               => $this->get_field_name( 'icon_fields' ) . '[]',
			'icon_kit_field_id'             => $this->get_field_id( 'icon_kit_fields' ),
			'icon_kit_field_name'           => $this->get_field_name( 'icon_kit_fields' ) . '[]',
		);

		foreach ( $fields as $field ) {

			$merged_fields[] = array_merge( $field, $will_be_merged );
		}

		return $merged_fields;
	}

	/**
	 * Get default field for a new added element.
	 *
	 * @return array
	 */
	public function get_default_field() {
		return array(
			array(
				'url'                => '',
				'label'              => __( 'Default Label', 'zoom-social-icon-widget' ),
				'icon'               => 'wordpress',
				'icon_kit'           => 'socicon',
				'color_picker'       => '#1e73be',
				'color_picker_hover' => '#1e73be'
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
	public function widget( $args, $instance ) {
		$instance = $this->normalize_data_array( $instance );
		$instance = wp_parse_args( (array) $instance, $this->get_defaults() );

		$this->inject_values( $instance );

		echo $args['before_widget'];

		if ( $instance['title'] ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		$class_list   = array();
		$class_list[] = 'zoom-social-icons-list--' . $instance['icon_style'];
		$class_list[] = 'zoom-social-icons-list--' . $instance['icon_canvas_style'];

		if ( is_bool( $instance['show_icon_labels'] ) ) {
			$instance['show_icon_labels'] = $instance['show_icon_labels'] === true ? 'true' : 'false';
		}

		if ( is_bool( $instance['open_new_tab'] ) ) {
			$instance['open_new_tab'] = $instance['open_new_tab'] === true ? 'true' : 'false';
		}

		if ( is_bool( $instance['no_follow'] ) ) {
			$instance['no_follow'] = $instance['no_follow'] === true ? 'true' : 'false';
		}

		if ( $instance['show_icon_labels'] === 'false' ) {
			$class_list[] = 'zoom-social-icons-list--no-labels';
		}
		?>

		<?php if ( ! empty( $instance['description'] ) ) : ?>

			<p><?php echo $instance['description']; ?></p>

		<?php endif; ?>

		<ul class="zoom-social-icons-list <?php echo esc_attr( implode( ' ', $class_list ) ); ?>">

			<?php
			foreach ( $instance['fields'] as $field ) : ?>

				<?php
				$rule        = ( $instance['icon_style'] === 'with-canvas' ) ? 'background-color' : 'color';
				$hover_style = empty( $field['color_picker_hover'] ) ? '' : 'data-hover-rule="' . $rule . '" data-hover-color="' . $field['color_picker_hover'] . '"'; ?>
				<li class="zoom-social_icons-list__item">
					<a class="zoom-social_icons-list__link"
					   href="<?php echo esc_url( $field['url'], $this->protocols ); ?>"
						<?php echo( $instance['open_new_tab'] === 'true' ? 'target="_blank"' : '' ); ?>
						<?php echo( $instance['no_follow'] === 'true' ? 'rel="nofollow"' : '' ); ?>
					>
						<?php if ( ! empty( $field['icon'] ) && ! empty( $field['icon_kit'] ) && ! empty( $field['color_picker'] ) ) {
							$class = $field['icon_kit'] . ' ' . $field['icon_kit'] . '-' . $field['icon'];
							$style = $rule . ' : ' . $field['color_picker'];
						} else {
							$style = '';

							$class = 'socicon socicon-' . esc_attr( $this->get_icon( $field['url'] ) );
						} ?>
						<?php if ( ! empty( $instance['icon_font_size'] ) ) {
							$style .= '; font-size: ' . $instance['icon_font_size'] . 'px';
						} ?>
						<?php if ( ! empty( $instance['icon_padding_size'] ) ) {
							$style .= '; padding:' . $instance['icon_padding_size'] . 'px';
						} ?>

                        <?php if ( $instance['show_icon_labels'] === 'false' ) : ?>
                            <span
                                class="screen-reader-text"><?php echo esc_html( $field['icon'] ); ?></span>
                        <?php endif; ?>

						<span class="zoom-social_icons-list-span <?php echo $class ?>"
							<?php echo $hover_style ?>
							  style="<?php echo $style ?>"
						></span>

						<?php
						if ( $instance['show_icon_labels'] === 'true' ) : ?>
							<span
								class="zoom-social_icons-list__label"><?php echo esc_html( $field['label'] ); ?></span>
						<?php endif; ?>
					</a>
				</li>

			<?php endforeach; ?>

		</ul>

		<?php

		echo $args['after_widget'];
	}

	/**
	 * Scripts & styles for front-end display of widget.
	 */
	public function scripts() {
		wp_enqueue_style( 'socicon', plugin_dir_url( $this->plugin_file ) . 'assets/css/socicon.css', array(), '20180625' );
		wp_enqueue_style( 'genericons', plugin_dir_url( $this->plugin_file ) . 'assets/css/genericons.css', array(), '20180625' );
		wp_enqueue_style( 'fontawesome', plugin_dir_url( $this->plugin_file ) . 'assets/css/font-awesome.min.css', array(), '20180625' );
		wp_enqueue_style( 'dashicons' );

		wp_enqueue_script(
			'zoom-social-icons-widget-frontend',
			plugin_dir_url( $this->plugin_file ) . 'assets/js/social-icons-widget-frontend.js',
			array( 'jquery' ),
			'20170209',
			true
		);
	}

}
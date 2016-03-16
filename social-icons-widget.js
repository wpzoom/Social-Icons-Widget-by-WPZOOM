(function ($) {
    var icons = [
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
    ];

    $(document).ready(function () {
        $(document).on('click', '.zoom-social-icons__add-button button', function (event) {
            event.preventDefault();

            var $tmpl = $($.trim($('#tmpl-zoom-social-icons-field').html()));

            var url_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('url-field-id');
            var url_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('url-field-name');

            var label_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('label-field-id');
            var label_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('label-field-name');

            $tmpl.find('.zoom-social-icons__field-url').attr('id', url_field_id).attr('name', url_field_name + '[]');
            $tmpl.find('.zoom-social-icons__field-label').attr('id', label_field_id).attr('name', label_field_name + '[]');

            $(this).parents('.widget-content').find('.zoom-social-icons__list').append($tmpl);
            $(this).parents('.widget-content').find('.zoom-social-icons__list:last input:first-child').trigger('focus');
        });

        $(document).on('keyup', '.zoom-social-icons__field-url', function () {
            var url = extractDomain($(this).val());

            var $this = $(this);

            var found = false;

            if (url.indexOf('feedburner.com') !== -1) {
                $this.parents('.zoom-social-icons__field').find('.zoom-social-icons__field-handle').attr('class', 'zoom-social-icons__field-handle socicon socicon-rss');
                found = true;
            } else if (url.indexOf('feedburner.google.com') !== -1) {
                $this.parents('.zoom-social-icons__field').find('.zoom-social-icons__field-handle').attr('class', 'zoom-social-icons__field-handle socicon socicon-mail');
                found = true;
            } else {
                $(icons).each(function (ix, icon) {
                    if (url.indexOf(icon) !== -1) {
                        $this.parents('.zoom-social-icons__field').find('.zoom-social-icons__field-handle').attr('class', 'zoom-social-icons__field-handle socicon socicon-' + icon);
                        found = true;
                        return;
                    }
                });
            }

            if (!found) {
                $this.parents('.zoom-social-icons__field').find('.zoom-social-icons__field-handle').attr('class', 'zoom-social-icons__field-handle dashicons dashicons-sort');
            }
        });

        $(document).on('change', '.zoom-social-icons-show-icon-labels', function () {
            if ($(this).is(':checked')) {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').removeClass('zoom-social-icons__list--no-labels');
            } else {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').addClass('zoom-social-icons__list--no-labels');
            }
        });

        $(document).on('click', '.zoom-social-icons__field-trash', function (event) {
            event.preventDefault();
            var $widget = $(this).parents('.widget[id*=zoom-social-icons-widget]');
            $(this).parents('.zoom-social-icons__field').remove();
            triggerFakeChange($widget);
        });

        // Event handler for widget open button
        $(document).on('click', 'div.widget[id*=zoom-social-icons-widget] .widget-title, div.widget[id*=zoom-social-icons-widget] .widget-action', function () {
            if ($(this).parents('#available-widgets').length) return;

            initWidget($(this).parents('.widget[id*=zoom-social-icons-widget]'));
        });

        // Event handler for widget added
        $(document).on('widget-added', function (event, $widget) {
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                event.preventDefault();
                initWidget($widget);
            }
        });

        // Event handler for widget updated
        $(document).on('widget-updated', function (event, $widget) {
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                event.preventDefault();
                initWidget($widget);
            }
        });

        function initWidget($widget) {
            $widget.find('.zoom-social-icons__list').sortable({
                update: function () {
                    triggerFakeChange($widget);
                }
            });
        }

        function triggerFakeChange($widget) {
            $widget.find('.zoom-social-icons-show-icon-labels').trigger('change');
        }


        function extractDomain(url) {
            var domain;
            //find & remove protocol (http, ftp, etc.) and get domain
            domain = (url.indexOf("://") > -1) ? url.split('/')[2] : url.split('/')[0];

            //find & remove port number
            domain = domain.split(':')[0];

            return domain;
        }

        $(document).on('panelsopen', function(e) {
           var dialog = $(e.target);

           if( !dialog.has('.zoom-social-icons__list') ) return;

           dialog.addClass('widget-content');
           initWidget(dialog);
       });
    });
})(jQuery);

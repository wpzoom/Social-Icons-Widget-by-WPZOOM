(function ($, _, social_icons) {
    var icons = [
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
    ];

    $(document).ready(function () {

        var socialModal = {
            init: _.once(function () {
                var modal = new wp.media.view.Modal({
                    controller: {
                        trigger: function () {
                        }
                    }
                });
                // Create a modal content view.
                var ModalContentView = wp.Backbone.View.extend({
                    template: wp.template('zoom-social-modal')
                });

                modal.on('open', function () {

                    modal.$el.find('.media-modal').addClass('zoom-social-modal-wrapper');

                    var $container = modal.$el.find('.zoom-social-modal-wrapper');
                    var targetData = $(modal.target).data('form');
                    var $button = $container.find('.zoom-social-modal-toolbar .save-action-button');
                    var $form = $container.find('.zoom-social-modal-form');
                    var $iconKit = $container.find('.zoom-social-icons__field-icon-kit');
                    var $icon = $container.find('.zoom-social-icons__field-icon');
                    var $colorPicker = $container.find('.zoom-social-icons__field-color-picker');
                    var $searchContent = $container.find('.zoom-social-modal-search-content');
                    var $searchInput = $container.find('.search-action-input');

                    $searchInput.on('input', function (e) {
                        e.preventDefault();
                        var $inputVal = $(this).val();

                        if ($searchContent.data('show') === 'hidden') {
                            $searchContent.toggle();
                            $form.toggle();
                            $searchContent.data('show', 'visible');
                        }

                        var socialIcons = _.map(social_icons, function (iconPack) {
                            var icons = _.filter(iconPack['icons'], function (icon) {
                                return (icon.indexOf($inputVal) !== -1);
                            });
                            return _.extend({}, iconPack, {icons: icons});
                        });

                        $searchContent.html(wp.template('zoom-social-modal-search')(socialIcons));

                        $searchContent.find('.zoom-social-icons__single-element').on('mouseenter mouseleave', function(e){
                            e.preventDefault();
                            $searchContent.find('.zoom-social-icons__single-element').removeAttr('style');

                            $(this).css({
                                'backgroundColor': Color($colorPicker.val()).toString(),
                                'color': Color().getReadableContrastingColor(Color($colorPicker.val()), 50).toString()
                            });
                        });
                    });

                    $searchContent.on('click', '.zoom-social-icons__single-element', function(e){
                        e.preventDefault();

                        $searchContent.data('show', 'hidden');
                        $searchInput.val('');
                        $iconKit.val($(this).data('type')).trigger('change');
                        var $active = $form.find('.icon-kit .'+$(this).data('type')+'-'+$(this).data('value'));
                        $active.trigger('click');
                        $form.find('.icon-kit.'+$(this).data('type')+'-wrapper').prepend($active);
                        $searchContent.toggle();
                        $form.toggle();
                    });

                    _.each(targetData, function (el) {
                        $form.find('.' + el.name).val(el.value);
                    });

                    $container.find('.' + $iconKit.val() + '-' + $icon.val()).addClass('selected').css({
                        'backgroundColor': Color($colorPicker.val()).toString(),
                        'color': Color().getReadableContrastingColor(Color($colorPicker.val()), 50).toString()
                    });

                    $colorPicker.css({
                        'backgroundColor': Color($colorPicker.val()).toString(),
                        'color': Color().getReadableContrastingColor(Color($colorPicker.val()), 50).toString()
                    });
                    $container.find('.icon-kit').hide();
                    $container.find('.' + $iconKit.val() + '-wrapper').show();

                    $colorPicker.one('click', function (e) {
                        e.preventDefault();
                        $(this).on('click', function (e) {
                            e.preventDefault();
                            $(this).iris('toggle');
                        });
                    });

                    $container.mouseup(function (e) {
                        var container = $(".wrap-input");

                        if (!container.is(e.target) && container.has(e.target).length === 0) {
                            if ($colorPicker.data('a8cIris')) {
                                $colorPicker.data('a8cIris').hide();
                            }
                        }
                    });

                    $colorPicker.iris({
                        palettes: true,
                        hide: true,
                        change: function (event, ui) {
                            $(event.target).css({
                                'backgroundColor': ui.color.toString(),
                                'color': Color().getReadableContrastingColor(ui.color, 50).toString()
                            });

                            $container.find('.icon-kit span.selected').css({
                                'backgroundColor': ui.color.toString(),
                                'color': Color().getReadableContrastingColor(ui.color, 50).toString()
                            });
                        }
                    });

                    $iconKit.on('change', function () {
                        $container.find('.icon-kit').hide();
                        $container.find('.' + $iconKit.val() + '-wrapper').show();
                    });

                    $container.find('.icon-kit span').on('mouseenter', function (e) {
                        e.preventDefault();
                        $(this).css({
                            'backgroundColor': Color($colorPicker.val()).toString(),
                            'color': Color().getReadableContrastingColor(Color($colorPicker.val()), 50).toString()
                        });
                    });
                    $container.find('.icon-kit span').on('mouseleave', function (e) {
                        e.preventDefault();
                        $(this).siblings(':not(.selected)').removeAttr('style');
                        if (!$(this).hasClass('selected')) {
                            $(this).removeAttr('style');
                        }
                    });

                    $container.find('.icon-kit').on('click', 'span', function (e) {
                        e.preventDefault();
                        $(this).siblings().removeClass('selected').removeAttr('style');
                        $(this).addClass('selected');
                        $(this).css({
                            'backgroundColor': Color($colorPicker.val()).toString(),
                            'color': Color().getReadableContrastingColor(Color($colorPicker.val()), 50).toString()
                        });

                        $icon.val($(this).data('value'));
                    });

                    $button.on('click', function (e) {
                        e.preventDefault();
                        $(modal.target).data('dynamic-icon', true);
                        $form.trigger('submit');
                        triggerFakeChange($(modal.target).parents('.widget[id*=zoom-social-icons-widget]'));
                    });

                    $form.on('submit', function (e) {
                        e.preventDefault();
                        var $targetElement = $(modal.target);
                        var data = $(this).serializeArray();
                        $targetElement.data('form', data);
                        $targetElement.removeClass();
                        var indexedByName = _.indexBy(data, 'name');
                        $targetElement.addClass('zoom-social-icons__field-icon-handler ' + indexedByName['zoom-social-icons__field-icon-kit'].value + ' ' + indexedByName['zoom-social-icons__field-icon-kit'].value + '-' + indexedByName['zoom-social-icons__field-icon'].value).css('background-color', indexedByName['zoom-social-icons__field-color-picker'].value);


                        _.each(data, function (el) {
                            $targetElement.closest('.zoom-social-icons__field').find('.' + el.name).val(el.value);
                        });

                        modal.close();
                    })

                });

                $(document).on('click', '.zoom-social-icons__field-icon-handler', function (e) {
                    e.preventDefault();

                    var $liWrapper = $(this).closest('li');
                    var $classes = $liWrapper.find('.zoom-social-icons__field-icon-handler').attr('class').split(' ');
                    var $filteredClasses = _.filter($classes, function (el) {
                        return !(el.indexOf('socicon-') === -1);
                    });

                    var $defaultIcon = ($filteredClasses.length) ? _.first($filteredClasses).replace('socicon-', '') : '';
                    var $defaultColor = $liWrapper.find('.zoom-social-icons__field-icon-handler').css('background-color');

                    fieldsData = [
                        {
                            name: 'zoom-social-icons__field-color-picker',
                            value: $liWrapper.find('.zoom-social-icons__field-color-picker').val(
                                function (index, value) {
                                    if (!value) {
                                        value = $defaultColor;
                                    }

                                    return value;
                                }
                            ).val()
                        },
                        {
                            name: 'zoom-social-icons__field-icon',
                            value: $liWrapper.find('.zoom-social-icons__field-icon').val(
                                function (index, value) {
                                    if (!value) {
                                        value = $defaultIcon;
                                    }

                                    return value;
                                }
                            ).val()
                        },
                        {
                            name: 'zoom-social-icons__field-icon-kit',
                            value: $liWrapper.find('.zoom-social-icons__field-icon-kit').val(
                                function (index, value) {
                                    if (!value) {
                                        value = 'socicon';
                                    }
                                    return value;
                                }
                            ).val()
                        },
                    ];

                    $(this).data('form', fieldsData);
                    modal.target = $(this);
                    modal.content(new ModalContentView());
                    modal.open();
                });
            })
        };


        $(document).on('click', '.zoom-social-icons__add-button button', function (event) {
            event.preventDefault();

            var $tmpl = $($.trim($('#tmpl-zoom-social-icons-field').html()));

            var url_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('url-field-id');
            var url_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('url-field-name');

            var label_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('label-field-id');
            var label_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('label-field-name');

            var icon_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('icon-field-id');
            var icon_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('icon-field-name');

            var icon_kit_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('icon-kit-field-id');
            var icon_kit_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('icon-kit-field-name');

            var color_picker_field_id = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('color-picker-field-id');
            var color_picker_field_name = $(this).parents('.widget-content').find('.zoom-social-icons__list').data('color-picker-field-name');

            $tmpl.find('.zoom-social-icons__field-url').attr('id', url_field_id).attr('name', url_field_name + '[]');
            $tmpl.find('.zoom-social-icons__field-label').attr('id', label_field_id).attr('name', label_field_name + '[]');
            $tmpl.find('.zoom-social-icons__field-icon').attr('id', icon_field_id).attr('name', icon_field_name + '[]');
            $tmpl.find('.zoom-social-icons__field-icon-kit').attr('id', icon_kit_field_id).attr('name', icon_kit_field_name + '[]');
            $tmpl.find('.zoom-social-icons__field-color-picker').attr('id', color_picker_field_id).attr('name', color_picker_field_name + '[]');

            $(this).parents('.widget-content').find('.zoom-social-icons__list').append($tmpl);
            $(this).parents('.widget-content').find('.zoom-social-icons__list:last input:first-child').trigger('focus');
        });

        $(document).on('input', '.zoom-social-icons__field-url', _.debounce(function () {

                var url = extractDomain($(this).val());

                var setChangedValues = function (icon, iconKit, color, found) {

                    var $fieldHandle = $iconsWrapper.find('.zoom-social-icons__field-icon-handler');

                    if ($(this).find('.zoom-social-icons__field-icon-handler').data('dynamic-icon')) {

                        var oldValueIcon = $(this).find('.zoom-social-icons__field-icon').val();
                        var oldValueIconKit = $(this).find('.zoom-social-icons__field-icon-kit').val();
                        var oldValueColorPicker = $(this).find('.zoom-social-icons__field-color-picker').val();


                        if (!found || (found && (oldValueIcon.indexOf(icon) !== -1 ))) {
                            icon = oldValueIcon;
                            iconKit = oldValueIconKit;
                            color = oldValueColorPicker;
                        }
                    }

                    if (color === 'rgba(0, 0, 0, 0)') {
                        color = $('<div>').addClass(iconKit + ' ' + iconKit + '-' + icon).css('backgroundColor');
                    }

                    $(this).find('.zoom-social-icons__field-icon').val(icon);
                    $(this).find('.zoom-social-icons__field-icon-kit').val(iconKit);
                    $(this).find('.zoom-social-icons__field-color-picker').val(color);


                    $fieldHandle.attr('class', 'zoom-social-icons__field-icon-handler ' + iconKit + ' ' + iconKit + '-' + icon);

                    if (!found) {
                        $fieldHandle.css('background-color', color);
                    }
                };

                var $this = $(this);
                var $iconsWrapper = $this.parents('.zoom-social-icons__field');
                var $fieldHandle = $iconsWrapper.find('.zoom-social-icons__field-icon-handler');

                if (!$fieldHandle.data('dynamic-icon')) {
                    $fieldHandle.removeAttr('style');

                }

                var found = false;
                var applyArr = [];

                if (url.indexOf('feedburner.com') !== -1) {
                    found = true;
                    applyArr = ['rss', 'socicon', $fieldHandle.css('background-color'), found];
                } else if (url.indexOf('feedburner.google.com') !== -1) {
                    found = true;
                    applyArr = ['mail', 'socicon', $fieldHandle.css('background-color'), found];

                } else {
                    $(icons).each(function (ix, icon) {
                        if (url.indexOf(icon) !== -1) {
                            found = true;
                            applyArr = [icon, 'socicon', $fieldHandle.css('background-color'), found];
                            return;
                        }
                    });
                }

                if (!found) {
                    applyArr = ['editor-help', 'dashicons', '#5a5a59', found];
                }

                setChangedValues.apply($iconsWrapper, applyArr);

            }, 200)
        );

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

            socialModal.init.call($widget);

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

        $(document).on('panelsopen', function (e) {
            var dialog = $(e.target);

            if (!dialog.has('.zoom-social-icons__list')) return;

            dialog.addClass('widget-content');
            initWidget(dialog);
        });
    });
})(jQuery, _, zoom_social_icons);

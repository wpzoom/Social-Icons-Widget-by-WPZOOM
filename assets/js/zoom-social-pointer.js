jQuery(document).ready(function ($) {
    wptuts_open_pointer(0);
    function wptuts_open_pointer(i) {
        pointer = zoom_social_pointer.pointers[i];
        options = $.extend(pointer.options, {
            close: function () {
                $.post(ajaxurl, {
                    pointer: pointer.pointer_id,
                    action: 'dismiss-wp-pointer'
                });
            }
        });

        var $instance = $(pointer.target).pointer(options);
        var $activePointer = $instance.pointer('widget');
        $instance.pointer('open');

        $activePointer.find('.zoom-social-remind-me-later').on('click', function (e) {
            e.preventDefault();
            $.post(ajaxurl, {
                lifetime: pointer.lifetime,
                transient_name: pointer.transient_name,
                action: 'zoom_ajax_set_pointer_transient'
            }).done(function (response) {
                if (response.success) {
                    $activePointer.hide();
                }
            });

        });
    }
});

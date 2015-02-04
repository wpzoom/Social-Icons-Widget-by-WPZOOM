(function ($) {
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
        });

        $(document).on('change', '.zoom-social-icons-show-icon-labels', function () {
            if ($(this).is(':checked')) {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').removeClass('zoom-social-icons__list--no-labels');
            } else {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').addClass('zoom-social-icons__list--no-labels');
            }
        });

        $(document).on('click', '.zoom-social-icons__field-trash', function () {
            $(this).parents('.zoom-social-icons__field').remove();
        });

        // Event handler for widget open button
        $(document).on('click', 'div.widget[id*=zoom-social-icons-widget] .widget-title, div.widget[id*=zoom-social-icons-widget] .widget-action', function () {
            if ($(this).parents('#available-widgets').length) return;

            $(this).parents('.widget[id*=zoom-social-icons-widget]').find('.zoom-social-icons__list').sortable();
        });

        // Event handler for widget added
        $(document).on('widget-added', function (event, $widget) {
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                event.preventDefault();
                $widget.find('.zoom-social-icons__list').sortable();
            }
        });

        // Event handler for widget updated
        $(document).on('widget-updated', function (event, $widget) {
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                event.preventDefault();
                $widget.find('.zoom-social-icons__list').sortable();
            }
        });
    });
})(jQuery);

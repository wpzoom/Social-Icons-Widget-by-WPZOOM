(function ($) {
    $(document).ready(function () {
        $(document).on('click', '.zoom-social-icons__add-button button', function (event) {
            event.preventDefault();

            var tmpl = $('#tmpl-zoom-social-icons-field').html();

            $(this).parents('.widget-content').find('.zoom-social-icons__list').append(tmpl);
        });

        $(document).on('change', '.zoom-social-icons__field input', function () {
            if ($(this).val() === '') {
                $(this).parents('.zoom-social-icons__field').remove();
            }
        });

        $(document).on('change', '.zoom-social-icons-show-icon-labels', function () {
            if ($(this).is(':checked')) {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').removeClass('zoom-social-icons__list--no-labels');
            } else {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').addClass('zoom-social-icons__list--no-labels');
            }
        });

        // Event handler for widget open button
        $(document).on('click', 'div.widget[id*=zoom-social-icons-widget] .widget-title, div.widget[id*=zoom-social-icons-widget] .widget-action', function () {
            if ($(this).parents('#available-widgets').length) return;

            $(this).parents('.widget[id*=zoom-social-icons-widget]').find('.zoom-social-icons__list').sortable();
        });

        // Event handler for widget added
        $(document).on('widget-added', function (event, $widget) {
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                console.log('add');
                event.preventDefault();
                $widget.find('.zoom-social-icons__list').sortable();
            }
        });

        // Event handler for widget updated
        $(document).on('widget-updated', function (event, $widget) {
            console.log('update');
            if ($widget.is('[id*=zoom-social-icons-widget]')) {
                event.preventDefault();
                $widget.find('.zoom-social-icons__list').sortable();
            }
        });
    });
})(jQuery);

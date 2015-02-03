(function($) {
    $(document).ready(function() {
        $(document).on('click', '.zoom-social-icons__add-button button', function(event) {
            event.preventDefault();

            var tmpl = $('#tmpl-zoom-social-icons-field').html();

            $(this).parents('.widget-content').find('.zoom-social-icons__list').append(tmpl);
        });

        $(document).on('change', '.zoom-social-icons__field input', function() {
            if ($(this).val() === '') {
                $(this).parents('.zoom-social-icons__field').remove();
            }
        });

        $(document).on('change', '.zoom-social-icons-show-icon-labels', function() {
            if ($(this).is(':checked')) {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').removeClass('zoom-social-icons__list--no-labels');
            } else {
                $(this).parents('.widget-content').find('.zoom-social-icons__list').addClass('zoom-social-icons__list--no-labels');
            }
        });
    });
})(jQuery);
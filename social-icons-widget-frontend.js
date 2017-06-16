jQuery(document).ready(function ($) {
    $('.zoom-social_icons-list__link').on({
        'mouseenter': function (e) {
            e.preventDefault();

            var $this = $(this).find('.zoom-social_icons-list-span');
            var $rule = $this.data('hover-rule');
            var $color = $this.data('hover-color');
            if ($color !== undefined) {
                $this.attr('data-old-color', $this.css($rule));
                $this.css($rule, $color);
            }
        },
        'mouseleave': function (e) {
            e.preventDefault();
            var $this = $(this).find('.zoom-social_icons-list-span');
            var $rule = $this.data('hover-rule');
            var $oldColor = $this.data('old-color');
            if ($oldColor !== undefined) {
                $this.css($rule, $oldColor);
            }
        }
    });
});
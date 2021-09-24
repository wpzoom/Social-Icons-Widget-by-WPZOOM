jQuery(function ($) {
    $(".wpzoom-social-icons-settings-inner").tabs({
        classes: {"ui-tabs-active": "current"},
        active: localStorage.getItem("socialIconsCurrentSettingsTab"),
        activate: function (event, ui) {
            localStorage.setItem("socialIconsCurrentSettingsTab", $(this).tabs('option', 'active'));
        }
    });
});
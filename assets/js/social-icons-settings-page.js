jQuery(function ($) {
    $(".zoom-social-icons-settings").tabs({
        classes: {"ui-tabs-active": "current"},
        active: localStorage.getItem("socialIconsCurrentSettingsTab"),
        activate: function (event, ui) {
            localStorage.setItem("socialIconsCurrentSettingsTab", $(this).tabs('option', 'active'));
        }
    });
});
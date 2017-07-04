jQuery.noConflict();
jQuery(document).ready(function () {
    jQuery("[url]").each(function () {
        jQuery("#Center").load(jQuery(this).attr("url"));
    });
    jQuery("[url]").on("load", function () {
        jQuery(this).load(jQuery(this).attr("url"))
    });
});
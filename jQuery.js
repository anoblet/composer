jQuery.noConflict();
jQuery(document).ready(function () {
    jQuery("[url]").each(function () {
        jQuery(this).load(jQuery(this).attr("url"));
    })
});
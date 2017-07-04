/**
 * Created by Andy Noblet on 7/4/2017.
 */
jQuery.noConflict();
jQuery(document).ready(function () {
    jQuery("div[src]").each(function () {
        jQuery(this).load(jQuery(this).attr("src"));
    });
    jQuery("a").on("click", function (e) {
        e.preventDefault();
        jQuery("#center").load(jQuery(this).attr("href"));

    });
});
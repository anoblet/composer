function style(element) {
    styleSelect(element);
    styleButton(element);
}
function styleSelect(element) {
    jQuery(element).find("select").each(function () {
        jQuery(this).selectmenu({
            change: function () {
                jQuery("#center").load(jQuery(this).val(), function () {
                    style(this);
                });
            }
        });
    });
}
function styleButton(element) {
    jQuery(element).find("input[type='submit']").each(function () {
        jQuery(this).button();
    });
}
function loadURLs(elements) {
    elements.each(function () {
        jQuery(this).load(jQuery(this).attr("src"), function () {
            var elements = jQuery(this).find("div[src]");
            loadURLs(elements);
            style(this);
        });

    })
}

jQuery.noConflict();
jQuery(document).ready(function () {
    var elements = jQuery("body").find("div[src]");
    loadURLs(elements);
    jQuery("a").on("click", function (e) {
        e.preventDefault();
        jQuery("#center").load(jQuery(this).attr("href"));
    });
    jQuery("select").on("change,", function () {
        jQuery("#center").load(jQuery(this).attr("href"));
    });
    jQuery(document).on("submit", "form", function (e) {
        var form = this;
        e.preventDefault();
        jQuery.ajax({
            url: jQuery(this).attr("action"),
            method: "POST",
            data: jQuery(this).serialize()
        }).done(function (response) {
            jQuery(form).replaceWith(response);
        });
    })
})
;
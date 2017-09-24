function load(element) {
    jQuery(element).load(jQuery(element).attr("src"), function () {
        refresh(this);
        style(this);
    });
}
function refresh(element) {
    var elements = jQuery(element).find("div[src]");
    elements.each(function () {
        jQuery(this).load(jQuery(this).attr("src"), function () {
            refresh(this);
            style(this);
        });

    })
}

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

jQuery.noConflict();
jQuery(document).ready(function () {
    refresh(document);
    // All on functions which are triggered on dynamic content
    jQuery(document).on("click", "#center a", function (e) {
        e.preventDefault();
        jQuery("#center").load(jQuery(this).attr("href"));
    });
    jQuery(document).on("click", "nav .dropdown a", function (e) {
        e.preventDefault();
        if(jQuery(this).attr("href") !== "#") {
            jQuery("#center").load(jQuery(this).attr("href"));
        }
    });
    jQuery("select").on("change,", function () {
        jQuery("#center").load(jQuery(this).attr("href"));
    });
    /*
    jQuery(document).on("submit", "#center form", function (e) {
        var form = this;
        e.preventDefault();
        jQuery.ajax({
            url: jQuery(this).attr("action"),
            method: "POST",
            data: jQuery(this).serialize()
        }).done(function (response) {
            jQuery(form).replaceWith(response);
            // refresh("#Container");
        });
    });*/
    jQuery(document).on("submit", "form", function (e) {
        var form = this;
        e.preventDefault();
        jQuery.ajax({
            url: jQuery(this).attr("action"),
            method: "POST",
            data: jQuery(this).serialize()
        }).done(function (response) {
            jQuery("#center").html(response);
        });
    })
})
;

function redirect(url) {
    jQuery.ajax({
        url: url,
        method: "GET",
    }).done(function (response) {
        jQuery("#center").html(response);
    });
}
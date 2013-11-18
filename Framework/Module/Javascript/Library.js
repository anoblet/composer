jQuery.noConflict();
function Reload_Page() {
	setTimeout(function() {
		location.reload(true)
	});
}




jQuery(document).ready
(
	function()
	{  		
	  var Form_Data;
	  var Forms = jQuery("form");
	  Forms.find('input[type="submit"]').live('click', function(event) {
	  /* Parent Form */ //var Form_Data = jQuery(jQuery(this).parents('form')[0]);
	  });

	  Forms.live('submit', function(event) {
	    // Prevent form-submission. You can do this conditionally later, of course
	    /* event.preventDefault();*/
	    
	    // The form that was submitted
	    var Form = jQuery(this);
	    jQuery.ajax
	    ({
	        url: jQuery(this).attr("Action"),
	        data:
	        ({
	            Type: "Sub_User_Interface",
	            Data: jQuery(this).serialize()
	        }),
	        success: function(response)
	        {

	    		jQuery(this).closest(".Content_2").html(response);
	    		jQuery(this).append(response);
	    		alert(response);
	        }
	    });
	  });

		/*jQuery(".Window").dialog
		({
			/* open: function(event, ui){jQuery(".ui-dialog-titlebar").hide()} */
		/*});*/
			jQuery( ".Column" ).sortable
			({
				connectWith: ".Column",
				handle: ".Title",
				containment: ".User_Interface",
				tolerance: 'pointer',
				fit: true,
				start: function(event, ui) {/* If it's open hide */jQuery(this).toggleClass("On_Top")},
				stop: function(event, ui) {jQuery(this).toggleClass("On_Top");/* If it was open and was hidden for the drop reopen it */}
				/* start: function(event, ui) {jQuery(".Window").css({"z-index": '1000'})} */

			});
			jQuery( ".Window" ).addClass( "ui-widget ui-widget-Content ui-helper-clearfix ui-corner-all" )
				.find( ".Title" )
					.addClass( "ui-widget-Header" )
					.prepend( "<span class='ui-icon ui-icon-minusthick'></span>")
					.prepend('<span class="Maximize_Window ui-icon ui-icon-arrowthick-1-ne"></span>')
					.prepend("<span class=\"ui-icon ui-icon-close\">")
					.end()
				.find( ".Content" );
			
			// Toggle
			jQuery( ".Title .ui-icon-minusthick" ).click(function() {
				jQuery( this ).toggleClass( "ui-icon-plusthick" ).toggleClass( "ui-icon-minusthick" );
				jQuery( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
				jQuery( this ).parents( ".Window:first" ).find( ".Content" ).toggle();
			});
			jQuery( ".Title .ui-icon-plusthick" ).click(function() {
				jQuery( this ).toggleClass( "ui-icon-minusthick" ).toggleClass( "ui-icon-plusthick" );
				jQuery( this ).toggleClass( "ui-icon-plusthick" ).toggleClass( "ui-icon-minusthick" );
				jQuery( this ).parents( ".Window:first" ).find( ".Content" ).toggle();
			});
			jQuery( ".Maximize_Window" ).click(function() {
				jQuery(this).parents( ".Window:first" ).toggleClass("Maximized_Window");
			});
			jQuery( ".Title .ui-icon-close" ).click(function() {
				jQuery( this ).parents( ".Window:first" ).remove();
			});
			// Maximize

		jQuery(".Accordion").accordion();
		})
	/*
		jQueryjQuery(".Window").dialog
	({
		position: "center",
		width: 'auto',
		resizable: false,
		title: "Login",
		closeOnEscape: false,
		open: function(event, ui){jQueryjQuery(".ui-dialog-titlebar").hide()}
	});
	jQuery('a').each(function() {
		jQuery(this).click(function() {
			alert(jQuery(this).attr('href') + ' is not available');
			return false;
		});
	});

 jQuery(".Columns .Window").resizeable()
	jQuery( "#Window" ).resizable(); 

});*/
		

		

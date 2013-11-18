$jQuery(document).ready(function() {
	$jQuery("#Login").dialog
	({
		position: "center",
		width: 'auto',
		resizable: false,
		title: "Login",
		closeOnEscape: false,
		open: function(event, ui) {$jQuery(".ui-dialog-titlebar").hide()}
	});
	
	$jQuery(window).resize(function() {
	    $jQuery("#Login").dialog("option", "position", "center");
	});

  // Handler for .ready() called.
});
function Login(Form_Data)
{           
    /*
    $("form").submit(function() {
    if ($("input:first").val() == "correct") {
    $("span").text("Validated...").show();
    return true;
    }
    $("span").text("Not valid!").show().fadeOut(1000);
    return false;
    });
    */
    $.ajax
    ({
        url: "/Security/Authentication/Login/Process",
        data: 
        ({
            /*Type:    "Object",
            Target:                   
            {                          
                Class:      encodeURI("\\SYSTEM\\Module\\Security\\Authentication\\Audit\\Login\\Login"),
                Function:   encodeURI("Process_Login")
            },*/
            Username:   Form_Data.Username.value,
            Password:   Form_Data.Password.value/*,
            Object:     encodeURI("/SYSTEM/Module/Security/Authentication/Audit/Login/Routines/Process_Login.xml"),
            User_Interface:     encodeURI("/SYSTEM/Module/Security/Authentication/Audit/Login/Routines/Process_Login.xml") */
        }),
        success: function(Response)
        {
            $j("#Login").html(Response);
            /* window.location = "http://www.thefreeintellectual.com/";                     */
        }
    });
}
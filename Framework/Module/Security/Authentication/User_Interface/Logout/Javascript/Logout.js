function Logout()
{
    $.ajax
    ({
        url: "index.php",
        data: 
        ({
            Type:    "Function",
            Target:
            {
                Class:      encodeURI("\\SYSTEM\\Module\\Security\\Authentication\\Objects\\Logout\\Logout"),
                Function:   encodeURI("Process_Logout")
            }
        }),
        success: function(msg)
        {
            $("#AJAXResponse").append(msg);
            Reload_Page();
            
        }
    });
}
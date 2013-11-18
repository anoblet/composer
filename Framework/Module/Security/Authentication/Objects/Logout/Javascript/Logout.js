function Logout()
{
    $.ajax
    ({
        url: "/SYSTEM/Module/Security/Authentication/Objects/Logout/Process",
        /*data: 
        ({
            Type:    "Function",
            Target:
            {
                Class:      encodeURI("\\SYSTEM\\Module\\Security\\Authentication\\Objects\\Logout\\Logout"),
                Function:   encodeURI("Process")
            }
        }),*/
        success: function(msg)
        {                                        
            $("#AJAXResponse").append(msg);
            Reload_Page();            
        }
    });
}
function Login(Form_Data)
{           
    $.ajax
    ({
        url: "index.php",
        data: 
        ({
            Type:    "Function",
            Target:
            {
                Class:      encodeURI("\\SYSTEM\\Module\\Security\\Authentication\\Objects\\Login\\Login"),
                Function:   encodeURI("Process_Login")
            },
            Username: Form_Data.Username.value,
            Password: Form_Data.Password.value
        }),
        success: function(msg)
        {
            $("#AJAXResponse").append(msg);
            /*Reload_Page();*/
                     
        }
    });
}
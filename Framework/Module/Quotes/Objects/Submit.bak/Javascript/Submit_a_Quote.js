function Submit_a_Quote(Form_Data)
{           
    $.ajax
    ({
        url: "index.php",
        data: 
        ({
            Type:    "Function",
            Target:
            {
                Class:      encodeURI("\\SYSTEM\\Module\\Quotes\\Objects\\Submit_a_Quote"),
                Function:   encodeURI("Submit_a_Quote")
            },
            Username: Form_Data.Username.value,
            Password: Form_Data.Password.value
        }),
        success: function(msg)
        {
            $("#AJAXResponse").append(msg);
            Reload_Page();
                     
        }
    });
}
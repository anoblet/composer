function Login(Form_Data)
{           
    $.ajax
    ({
        url: "/SYSTEM/Module/Security/Authentication/Audit/Login/Process.xml/",
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
            $("#Login").html(Response);
            /*indow.location = "http://www.thefreeintellectual.com/";                    */
        }
    });
}
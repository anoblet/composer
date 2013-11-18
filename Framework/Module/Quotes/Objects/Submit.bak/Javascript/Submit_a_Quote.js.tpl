$.ajax
    ({
        url: "index.php",
        data: 
        ({
            Type:    "Sub_User_Interface",
            Template: "<?=$this->User_Interface?>"
        }),
        success: function(msg)
        {
            $("#AJAXResponse").append(msg);           
        }
    });
}
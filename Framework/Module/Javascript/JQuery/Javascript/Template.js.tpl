<Script>
function Sub_User_Interface()
{
jQuery.ajax
    ({
        url: "<?=$this->URL;?>",
        data:
        ({
            Type: "Sub_User_Interface",
        }),
        success: function(msg)
        {
        	jQuery("<?=$this->Target;?>").html(msg);
            jQuery("#<?=$this->Target;?>").html(msg);

        }
    });


}
Sub_User_Interface();
</Script>

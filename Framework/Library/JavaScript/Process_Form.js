    function Process_Form(Form_Data)
    {
        var Parameters = "";
        for (i=0; i<Form_Data.childNodes.length; i++)
        {  
            if (Form_Data    .childNodes[i].tagName == "INPUT")
            {
                if (Form_Data    .childNodes[i].type == "text")
                {
                    Parameters += Form_Data    .childNodes[i].name + "=" + Form_Data    .childNodes[i].value + "&";
                }
                if (Form_Data    .childNodes[i].type == "checkbox")
                {
                    if (Form_Data    .childNodes[i].checked)
                    {
                        Parameters += Form_Data    .childNodes[i].name + "=" + Form_Data    .childNodes[i].value + "&";
                    }
                    else
                    {
                        Parameters += Form_Data    .childNodes[i].name + "=&";
                    }
                }
                if (Form_Data    .childNodes[i].type == "radio")
                {
                    if (Form_Data    .childNodes[i].checked)
                    {
                        Parameters += Form_Data    .childNodes[i].name + "=" + Form_Data    .childNodes[i].value + "&";
                    }
                }                                      
                if (Form_Data    .childNodes[i].name == "Form_Data    ")
                {
                    Parameters += Form_Data    .childNodes[i].name + "=" + Form_Data    .childNodes[i].value + "&";
                }
            }   
            if (Form_Data    .childNodes[i].tagName == "SELECT")
            {
                var sel = Form_Data    .childNodes[i];
                Parameters += sel.name + "=" + sel.options[sel.selectedIndex].value + "&";
            }
        }
        return Parameters;
     }
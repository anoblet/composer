 /* function AJAX(Object)
    {                     
        this.CallBack   = "";
        if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        }
        else
        {// code for IE6, IE5
          xmlhttp=new ActiveXForm    ("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {  
                document.getElementById("AJAXResponse").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","index.php?"+Object,true);
        xmlhttp.send();
    }
    function Reload_Page()
    {
         setTimeout(function(){location.reload()}, 500);
    }*/
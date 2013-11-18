function Submit()
{
$('#Submit').submit(function() {
  return false;
});       
$('#Submit').submit().preventDefault();
}
$(document).ready(
    function()
    {
        $(".Columns .Window").draggable({   
        stack: ".Columns .Window" , 
        handle: ".Titlebar",
        containment: ".Columns",scroll: false,
        });
        /*$(".Columns .Window").resizeable()*/
        /*$( "#Window" ).resizable();*/
    }
);
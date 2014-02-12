dojo.ready(function()
{
	dojo.query("Tooltip").forEach(function(Tooltip){
		var HREF = dojo.attr(Tooltip, "href");
	    var Tooltip_Dialog = new dijit.TooltipDialog({
	    	href: HREF
	    }, Tooltip);
	    dojo.connect(dojo.query("Tooltip").parent(), 'onmouseenter', function(){
	        dijit.popup.open({
	            popup: Tooltip_Dialog,
	            around: Tooltip
	        });
	    });
	});
});
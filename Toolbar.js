dojo.ready(function()
{
	dojo.query("Toolbar").forEach(function(Toolbar){
		new dijit.MenuBar({}, Toolbar);
	});
});
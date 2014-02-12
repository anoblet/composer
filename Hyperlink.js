dojo.ready(function()
{
	dojo.query("Hyperlink").forEach(function(Hyperlink){
    	dojo.connect(Hyperlink, "onclick", function(evt){
    		var HREF = dojo.attr(Hyperlink, "href");
    		dojo.query("Breadcrumbs").forEach(function(Breadcrumbs)
    		{
    			dojo.html.set(Breadcrumbs, HREF);
    		});
    		
    		dojo.xhrGet({
    		    url: HREF,
    		    load: function(Data){
    		    	// dojo.html.set(dojo.byId("Center"), Data)
    		    	dijit.byId("Center").setContent(Data).startup();
    		    	dojo.ready();
    		    	dojo.parser.parse(dojo.byId("Center"));
    		    }
    		});
    	});
	});
});
dojo.ready(function() {
	alert("Here");
	dojo.query("form").forEach(function(Form) {
		alert("Here");
		var Action = dojo.attr(Form, "action");
		dojo.query("[type='submit']", this).forEach(function(Button) {
			dojo.connect(Button, "onclick", function(Event) {
				dojo.stopEvent(Event);
				alert("Here");
				/*
				dojo.xhrGet({
					url : HREF,
					load : function(Data) {
						dojo.html.set(dojo.byId("Center"), Data)
					}
				});
				*/
			});
		});
	});
});
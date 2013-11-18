require([ "dojo/_base/declare", "dojox/layout/ExpandoPane", ], function(
		declare, ExpandoPane) {
	declare("dojox.layout.Expando_Pane", [ ExpandoPane ], {
		postCreate : function() {
			this.inherited(arguments);
			var Widget = this;
			dojo.connect(window, "onresize", function() {
				if (Widget._showing) {
					Widget.set({
						"style" : Widget.params.style
					});
					Widget._container.resize();
				}
			});
		}
	});
});
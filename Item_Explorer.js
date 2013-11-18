require([ "dojo/_base/declare", "dojox/data/ItemExplorer", ], function(
		declare, ItemExplorer) {
	declare("Item_Explorer", [ ItemExplorer ], {
		Reset_Style: function()
		{
			this.set({"style": this.params.style});
			this._container.resize();
		},
	    _expandNode: function(node){
	    	this.Reset_Style();
	        return this.inherited(arguments)
	    },
		setItem: function(){
			this.inherited(arguments);
			this.Reset_Style();
		},
		constructor: function(options){
			this.inherited(arguments);
			this.model = new dijit.tree.ForestStoreModel
			({
			    	store: this.store,
			    	identifier: "Identifier",
			    	childrenAttrs: ["childNodes"]
			});
		}
	})
});

var djConfig = {

	isDebug : true,

	debugAtAllCosts : true,
};

dojo.require("dijit.layout.BorderContainer");
dojo.require("dijit.layout.ContentPane");
dojo.require("dijit.TitlePane");
dojo.require("dojo.mouse");
dojo.require("dojo.on");
dojo.require("dojox.data.XmlStore");
dojo.require("dijit.tree");
dijit._TreeNode.prototype.setLabelNode = function(label) {
	this.labelNode.innerHTML = label;
};
dijit._TreeNode.prototype._setLabelAttr = {
	node : "labelNode",
	type : "innerHTML"
};
dojo.require("dojo._base.window");
dojo.require("dijit.tree.dndSource");
dojo.require("dojox.layout.ExpandoPane");
dojo.require("dojo.data.ItemFileWriteStore");
dojo.require("dojox.data.StoreExplorer");
dojo.require("dojox.grid.DataGrid");
dojo.require("dojox.grid.TreeGrid");
dojo.require("dijit.registry");
dojo.require("dojo._base.array");
dojo.require("dijit.tree.TreeStoreModel");
dojo.require("dijit.tree.ForestStoreModel");
dojo.require("dojo.data.ObjectStore");
dojo.require("dojo.store.JsonRest");
dojo.require("dijit.tree");

dojo.ready(function() {

	var Store = new dojox.data.XmlStore({
		url : "/?Format=XML",
		label: "@label",
		attributeMap: {"Label": "@label" },

	});

	var Model = new dijit.tree.ForestStoreModel({
		store : Store,
		labelAttrs : [ "@Label", "Label", "tagName" ],
		childrenAttrs : [ "childNodes" ]
	});

	var Structure = [ {} ];

	var Grid = new Tree_Grid({
		identifier : "ID",
		treeModel : Model,
		structure : Structure,
		defaultOpen: true,
		style: "height: 100%;"
	});	
	
	dojo.place(Grid.domNode, "Center");

	/*
	 * dojo.query("Application").forEach(function(Application){ new
	 * dijit.layout.BorderContainer({gutters: true},Application); });
	 */

	var User_Interface = dojo.query("User_Interface").forEach(
			function(User_Interface) {
				var User_Interface = new dijit.layout.BorderContainer({
					gutters : false,
					"liveSplitters" : "true"
				}, User_Interface);

				dojo.query("Top").forEach(function(Top) {
					var Top = new dojox.layout.Expando_Pane({
						'region' : 'top',
						// "splitter" : "true",
						'style' : 'height: 10%'
					}, Top);
					var Content = new dijit.layout.ContentPane({
						'region' : 'Content'
					});
					dojo.query("Logo").forEach(function(Logo) {
						dojo.place(Logo, Content.containerNode)
					});

					Top.addChild(Content);

					dojo.place(Top.cwrapper, Top.titleWrapper, "before");

					User_Interface.addChild(Top);
				});

				dojo.query("Left").forEach(function(Left) {
					var Left = new dojox.layout.Expando_Pane({
						'region' : 'left',
						// "splitter" : "true",
						'style' : 'width: 10%',
					/*
					 * _setupAnims:function(){ // summary: create the show and
					 * hide animations
					 * dojo.forEach(this._animConnects,dojo.disconnect);
					 * 
					 * var _common = { node:this.domNode, duration:this.duration };
					 * 
					 * var isHorizontal = this._isHorizontal; var showProps =
					 * {}; var hideProps = {};
					 * 
					 * var dimension = isHorizontal ? "height" : "width";
					 * showProps[dimension] = { end: this._showSize, unit:"%" };
					 * hideProps[dimension] = { end: this._closedSize, unit:"%" };
					 * alert("here"); this._showAnim =
					 * dojo.animateProperty(dojo.mixin(_common,{
					 * easing:this.easeIn, properties: showProps }));
					 * this._hideAnim =
					 * dojo.animateProperty(dojo.mixin(_common,{
					 * easing:this.easeOut, properties: hideProps }));
					 * 
					 * this._animConnects = [
					 * dojo.connect(this._showAnim,"onEnd",this,"_showEnd"),
					 * dojo.connect(this._hideAnim,"onEnd",this,"_hideEnd") ]; },
					 * resize: function() { this.inherited("resize", arguments);
					 * //logic here }, _afterResize: function() { alert("Me");
					 * console.log(this); // this.inherited("resize",
					 * arguments); //logic here }
					 */
					}, Left);
					var Navigation = dojo.query("Navigation");
					// var Navigation = new dijit.TitlePane({'title':
					// 'Navigation',
					// 'open': false}, Navigation);
					// Left.addChild(Navigation);

					// var Content_Pane = new
					// dijit.layout.ContentPane({innerHTML:
					// "Test"});

					// Content_Pane.addChild(Navigation);
					// Left.addChild(Content_Pane);
					User_Interface.addChild(Left);
				});

				dojo.query("Center").forEach(function(Center) {
					var Center = new dijit.layout.ContentPane({
						'region' : 'center'
					}, Center);
					User_Interface.addChild(Center);
				});

				dojo.query("Right").forEach(function(Right) {
					var Right = new dojox.layout.Expando_Pane({
						'region' : 'right',
						// "splitter" : "true",
						'style' : 'width: 10%;'
					}, Right);
					User_Interface.addChild(Right);
				});

				dojo.query("Bottom").forEach(function(Bottom) {
					var Bottom = new dojox.layout.Expando_Pane({
						'region' : 'bottom',
						// "splitter" : "true",
						'style' : 'height: 10%'
					}, Bottom);
					User_Interface.addChild(Bottom);
				});

				/*
				 * dojo.query("Toolbar").forEach(function(Toolbar){ var Toolbar =
				 * new dijit.layout.ContentPane({'region': 'top'}, Toolbar);
				 * User_Interface.addChild(Toolbar); });
				 * 
				 * dojo.query("Logo").forEach(function(Logo){ var Toolbar = new
				 * dijit.layout.ContentPane({'region': 'bottom'}, Logo);
				 * User_Interface.addChild(Toolbar); });
				 */

				User_Interface.startup();

			})

	var Store = new dojox.data.XmlStore({
		"url" : "Application.xml",
	});

	/*
	 * 
	 * var Model = new dijit.tree.ForestStoreModel({ store : Store,
	 * childrenAttrs : [ "childNodes" ] });
	 * 
	 * 
	 * var Tree = new dijit.Tree ({ model: Model, rootLabel: "Me",
	 * defaultOpened: false, openOnClick: "true", getLabel: function(Object){
	 * if(Object.element) { console.log(dojo.create("label", {innerHtml:
	 * dojo.query(Object)})); Label = Object.element.nodeName + ": " + Object; //
	 * Label = dojo.create("label",{'innerHTML': Object.element.nodeName + ":
	 * "}); } else { Label = "Root"; }
	 * 
	 * return Label; }, dndController: dijit.tree.dndSource });
	 * 
	 * Tree.startup(); dojo.place(Tree.domNode,"Center");
	 * 
	 * var Store2 = new dojox.data.XmlStore ({ url: "/?Format=JSON", });
	 * 
	 * var Model2 = new dijit.tree.ForestStoreModel ({ store: Store,
	 * childrenAttrs: ["childNodes"] });
	 * 
	 * var Tree2 = new dijit.Tree ({ model: Model, rootLabel: "Me",
	 * defaultOpened: false, openOnClick: "true", getLabel: function(Object){
	 * if(Object.element) { Label = Object.element.nodeName; } else { Label =
	 * "Root"; }
	 * 
	 * return Label; }, dndController: dijit.tree.dndSource });
	 * 
	 * Tree.startup(); dojo.place(Tree2.domNode,"Navigation");
	 * 
	 * 
	 * var Store = new dojo.data.ItemFileWriteStore({ url : "/?Format=JSON", });
	 * var Model = new dijit.tree.ForestStoreModel({ store : Store });
	 * 
	 * Store_Explorer = new dojox.data.Store_Explorer({ store : Store, "style" :
	 * "width: 100%; height: 100%;" });
	 * 
	 * dojo.place(Store_Explorer.domNode, "Center"); Store_Explorer.startup();
	 * dijit.byId("User_Interface").resize();
	 * 
	 */

	/*
	 * 
	 * require(["dojox/grid/EnhancedGrid"], function(EnhancedGrid) { var Store =
	 * new dojo.data.ItemFileReadStore ({ url: "/?Format=JSON", });
	 * 
	 * var Model = new dijit.tree.ForestStoreModel ({ store: Store });
	 * 
	 * 
	 * var Tree = new dijit.tree ({ model: Model });
	 * 
	 * 
	 * dojo.place(Tree.domNode,"Center");
	 * 
	 * Store._itemsByIdentity.foreach();
	 * 
	 * var Object_Store = new dojo.data.ObjectStore({objectStore: Store});
	 * 
	 * 
	 * var Grid = new Enhanced_Grid ({ store: Store, query: {"ID": "*"},
	 * "style": "width: 100%; height: 100%;" });
	 * 
	 * dojo.place(Grid.domNode,"Center"); Grid.startup(); console.log(Grid);
	 * 
	 * 
	 * });
	 * 
	 */

	// var Grid = new dojox.grid.DataGrid({store: Store, model: Model});
	// dojo.place(Grid.domNode,"Center");
	// Resize expando panes whenever the window is resized
	dojo._base.array.forEach(dijit.registry.toArray(), function(Widget) {

		if (Widget.declaredClass == "dojox.layout.ExpandoPane") {
			/*
			 * if(Widget) dojo.connect(window,"onresize" , Widget,
			 * function(event){ dijit.byId("User_Interface").layout();
			 * Widget._currentSize = dojo.marginBox(Widget.domNode); var Size =
			 * Widget._currentSize[(Widget._isHorizontal ? "h" : "w")];
			 * Widget.resize(); Widget._container.resize(); });
			 */
		}
	});

	var Friends = dojo.query("Friends").forEach(function(Friends) {
		new dijit.layout.ContentPane({
			"innerHTML" : "Friends"
		}, Friends);
	});
});
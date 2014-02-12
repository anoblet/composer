dojo.ready(function() {
	var User_Interface = dojo.query("User_Interface").forEach(function(User_Interface) {
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

			User_Interface.addChild(Left);
		});

		dojo.query("Center").forEach(function(Center) {
			var Center = new dojox.layout.ContentPane({
				"region" : "center",
				"parseOnLoad": true
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

		User_Interface.startup();
	})
});

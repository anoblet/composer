require([ "dojo/_base/declare", "dojox/grid/TreeGrid", ], function(declare, TreeGrid) {
	declare("Tree_Grid", [ TreeGrid ], {
		_onFetchComplete : function(Items) 
		{
			this.structure = [];
			
			this.structure.push
			({
				"field": "tagName",
				"name": "tagName"
			});
			
			this.structure.push
			({
				"field": "text()",
				"name": "text()"
			});
			
			for (Item_Key in Items) {
				var Item = Items[Item_Key];
				this.Create_Field(Item);
			}

			this.structure = [ {
				defaultCell:
				{
					"editable": true
				},
				cells : [this.structure]
			} ];
			
			this.setStructure(this.structure);
			// this.setStructure(Structure);
			this.inherited(arguments);
		},

		Create_Field : function(Item) {
			if(this.store.isItem(Item))
			{				
				var Label = this.store.getLabel(Item);
				if(Label);
				else
				{
					Label = this.store.getValue(Item, "tagName");
				}
				var Identity = this.store.getIdentity(Item);
				
				if(Item.element)
				{	
					if(Item.element.childElementCount)
					{
						this.structure.push
						({
							"field": Label,
							"name": Label
						});
						
						var Attributes = this.store.getAttributes(Item);
						
						for(Attribute_Key in Attributes)
						{
							var Attribute = Attributes[Attribute_Key];
							var Attribute_Value = this.store.getValue(Item, Attribute);
							
							if(this.store.isItem(Attribute_Value))
							{
								if(Attribute == "childNodes");
								else
								{
									this.Create_Field(Attribute_Value);
								}
							}
						}
					}
					else
					{
						this.structure.push
						({
							"field": Label,
							"name": Label,
						});
					}
				}
			}
			return;
		}
		
		
	});
});
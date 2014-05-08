define([
	"dojo/_base/declare",
	"dijit/_Widget",
	"dijit/_TemplatedMixin",
	"dijit/_WidgetsInTemplateMixin",
	"dgrid/OnDemandList",
	"dgrid/Selection",
	"dgrid/Keyboard",
	"dojo/dom-construct",
	"dojo/text!my/TransferBox.html",/*from the project root / */
	"dijit/form/Button"
], function(declare, _Widget, _TemplatedMixin, _WidgetsInTemplateMixin,
			List, Selection, Keyboard, domConstruct, template){
	var TBList = declare([List, Selection, Keyboard]);

	function selectionToDisable(list, button){
		var selected = 0;
		list.on("dgrid-select", function(e){
			selected += e.rows.length;
			button.set("disabled", !selected);
		});
		list.on("dgrid-deselect", function(e){
			selected -= e.rows.length;
			button.set("disabled", !selected);
		});
	}

	return declare([_Widget, _TemplatedMixin, _WidgetsInTemplateMixin], {
		templateString: template,
		baseClass: "myTransferBox",

		sortProperty: "id",
		selectionMode: "extended",

		postCreate: function(){
			this.inherited(arguments);

			this.addButton.set("disabled", true);
			this.removeButton.set("disabled", true);

			var from = this.from = new TBList({
				store: this.store,
				selectionMode: this.selectionMode,
				query: function(item){
					return !item.__selected;
				},
				sort: this.sortProperty,
				renderRow: this.renderItem
			}, this.fromNode);
			selectionToDisable(from, this.addButton);

			var to = this.to = new TBList({
				store: this.store,
				selectionMode: this.selectionMode,
				query: function(item){
					return item.__selected;
				},
				sort: this.sortProperty,
				renderRow: this.renderItem
			}, this.toNode);
			selectionToDisable(to, this.removeButton);
		},
		_setValueAttr: function(value){
			var notify  = !this.from || !this.from._started;
			for(var i=0; i<value.length; i++){
				var item = this.store.get(value[i]);
				if(!item){ continue; }
				item.__selected = true;
				notify && this.store.put(item);
			}
		},
		_getValueAttr: function(){
			var store = this.store;
			return store.query(function(item){
				return item.__selected;
			}).map(function(item){
				return store.getIdentity(item);
			});
		},
		add: function(){
			for(var id in this.from.selection){
				var row = this.from.row(id);
				row.data.__selected = true;
				this.store.put(row.data);
			}
		},
		remove: function(){
			for(var id in this.to.selection){
				var row = this.to.row(id);
				row.data.__selected = false;
				this.store.put(row.data);
			}
		},
		renderItem: function(item){
			return domConstruct.create("div", {
				innerHTML: item.name
			});
		}
	});
});

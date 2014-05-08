define([
	"dojo/_base/declare",
	"dojo/_base/Deferred",
	"dojo/on",
	"dijit/_Widget",
	"dijit/_TemplatedMixin",
	"dgrid/OnDemandList",
	"dgrid/Selection",
	"dgrid/Keyboard",
	"dojo/dom",
	"dojo/dom-construct",
	"dojo/dom-class"
], function(declare, Deferred, on, _Widget, _TemplatedMixin,
			List, Selection, Keyboard, dom, domConstruct, domClass){
	var DropDown = declare([List, Selection, Keyboard]);

	return declare([_Widget, _TemplatedMixin], {
		baseClass: "mySelect",

		query: null,
		queryOptions: null,
		value: null,

		templateString: "<div>" +
			"<div class='label button' " +
				"data-dojo-attach-point='labelNode'></div>" +
			"<div class='arrow button' " +
				"data-dojo-attach-point='arrowNode'></div>" +
			"<div data-dojo-attach-point='listNode'></div>" +
		"</div>",

		postCreate: function(){
			this.inherited(arguments);

			this.list = new DropDown({
				selectionMode: "single",
				showHeader: false,
				store: this.store,
				query: this.query,
				renderRow: this.renderItem
			}, this.listNode);
		},
		
		startup: function(){
			if(this._started){ return; }

			this.inherited(arguments);

			var results;
			if(!this._value){
				results = this.store.query(this.query, this.queryOptions);
			}else{
				results = [this._value];
			}
			if(results && results.length){
				this.set("value", results[0]);
			}

			var self = this;
			on(this.domNode, ".button:click", function(e){
				self.toggle(!self.opened);
			});

			this.list.on("dgrid-select", function(e){
				self.set("value", e.rows[0].data);
				self.toggle(false);
			});
		},

		_setValueAttr: function(item){
			this._value = item;

			if(!this.list){ return; }

			var node = this.renderItem(item);
			domConstruct.place(node, this.labelNode, "only");
		},
		_getValueAttr: function(){
			return this._value;
		},

		toggle: function(state){
			this.opened = state;
			if(!this.list._started){
				this.list.startup();
			}
			domClass[this.opened ? "add" : "remove"](this.list.domNode, "opened");
		},
		renderItem: function(value, options){
			var textNode = document.createTextNode(value.name);
			var divNode = domConstruct.create("div", { "class": value.name });
			domConstruct.place(textNode, divNode);
			return divNode;
		}
	});
});

define([
    "dojo/_base/declare",
    "dijit/form/Button"
], function(declare, Button){
    return declare("mynamespace.Button", Button, {
        label: "My Button",
        onClick: function(evt){
            console.log(evt);
            console.log("I was clicked!");
            this.inherited(arguments);
        }
    });
});
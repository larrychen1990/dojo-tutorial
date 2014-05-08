define([
    "../../dojo/_base/declare",
    "../../dojo/dom"
], function(declare, dom){
    return declare(null, {
        showDate: function(id, date){
            dom.byId(id).innerHTML = date;
        }
    });
});
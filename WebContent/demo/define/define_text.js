define([
    "../../dojo/_base/declare",
    "../../dijit/_WidgetBase",
    "../../dijit/_TemplatedMixin",
    "../../dojo/text!../../AMD_Modules.html"
], function(declare, _WidgetBase, _TemplatedMixin, template){
    return declare([_WidgetBase, _TemplatedMixin], {
        // template contains the content of the file "AMD_Modules.html"
        templateString: template
    });
});
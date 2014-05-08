define([
    "../../dojo/_base/declare",
    "../../dijit/Dialog",
    "../../dojo/i18n!../../dijit/nls/common"
], function(declare, Dialog, i18n){
    return declare(Dialog, {
        title: i18n.dialogTitle,
        content:"This is the Dialog's content."
    });
});
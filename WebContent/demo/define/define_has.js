// in "my/events.js"
define([
    "../../dojo/dom",
    "../../dojo/has!dom-addeventlistener?../../dojo/Evented"
], function(dom, events){
    // events is "my/events/w3c" if the "dom-addeventlistener" test was true, "my/events/ie" otherwise
//    events.addEvent(dom.byId("foo"), "click", function(){
//        console.log("Foo clicked!");
//    });
        console.log("has loaded!");
});
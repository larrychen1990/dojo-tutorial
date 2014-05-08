<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Demo: dojox/form/Manager</title>
		<link rel="stylesheet" href="../style/style.css" media="screen">
		<link rel="stylesheet" href="../style/demo.css" media="screen">
		<link rel="stylesheet" href="../dijit/themes/claro/claro.css" media="screen">
	</head>
	<body class="claro">
		<div data-dojo-type="dijit/layout/BorderContainer" id="borderContainer" data-dojo-props="design:'sidebar',gutters:false,liveSplitters:false">
			<div data-dojo-type="dijit/layout/ContentPane" id="resultsContainer" data-dojo-props="region:'left',splitter:true">
				<table id="result" border="1">
					<thead>
						<tr>
							<th>Name</th>
							<th>Value</th>
						</tr>
					</thead>
					<tbody id="table"></tbody>
				</table>
				<p id="controls">
					<input type="checkbox" id="c01" name="c01" value="c01" checked="checked">
					&nbsp;<label for="c01">enable the form elements</label>
					<br>
					<input type="checkbox" id="c02" name="c02" value="c02">
					&nbsp;<label for="c02">add/remove background</label>
					<br>
					<input type="checkbox" id="c03" name="c03" value="c03" checked="checked">
					&nbsp;<label for="c03">show form elements</label>
					<br>
					<input type="checkbox" id="c04" name="c04" value="c04" checked="checked">
					&nbsp;<label for="c04">show form widgets</label>
				</p>
			</div>
			<div data-dojo-type="dijit/layout/ContentPane" id="formContainer" data-dojo-props="region:'center',splitter:true">
				<h1>Demo: dojox/form/Manager</h1>
				<p>
					Make sure you open the script console to see all of the form values change!
				</p>
				<form data-dojo-type="dojox/form/Manager" id="form">
					<fieldset data-dojo-attach-point="part1">
						<legend>HTML form elements</legend>
						<div>
							<input type="checkbox" id="e01" name="e01" value="e01" data-dojo-observer="showValues, logRadio">
							&nbsp;<label for="e01">e01 input/checkbox</label>
						</div>
						<div>
							<input type="radio" id="e021" name="e02" value="e02-1" data-dojo-observer="showValues">
							&nbsp;<label for="e021">e02-1 input/radio</label>
							&nbsp;
							<input type="radio" id="e022" name="e02" value="e02-2" checked="checked" data-dojo-observer="showValues">
							&nbsp;<label for="e022">e02-2 input/radio</label>
						</div>
						<div>
							<input type="text" id="e03" name="e03" value="e03" data-dojo-observer="showValues">
							&nbsp;<label for="e03">e03 input/text</label>
						</div>
						<div>
							<input type="password" id="e04" name="e04" value="e04" data-dojo-observer="showValues">
							&nbsp;<label for="e04">e04 input/password</label>
						</div>
						<div>
							<input type="hidden" id="e05" name="e05" value="e05" data-dojo-observer="showValues">
							&nbsp;<label for="e05">e05 input/hidden</label>
						</div>
						<div>
							<select id="e06" name="e06" data-dojo-observer="showValues">
								<option value="e06-1">e06-1 first</option>
								<option value="e06-2" selected="selected">e06-2 second</option>
							</select>
							&nbsp;<label for="e06">e06 select</label>
						</div>
						<div>
							<label for="e07">e07 textarea</label><br>
							<textarea id="e07" name="e07"
								rows="3" cols="15" style="width: 15em;" data-dojo-observer="showValues">e07</textarea>
						</div>
						<div>
							<button name="e08" data-dojo-observer="showValues">e08 button</button>&nbsp;
							<input type="button" name="e09" value="e09 input/button" data-dojo-observer="showValues">&nbsp;
							<input type="reset" name="e10" value="e10 input/reset" data-dojo-observer="showValues">&nbsp;
							<input type="submit" name="e11" value="e11 input/submit" data-dojo-observer="showValues">
						</div>
					</fieldset>
					<fieldset data-dojo-attach-point="part2">
						<legend>Dijit form widgets</legend>
						<div>
							<input type="checkbox" data-dojo-type="dijit/form/CheckBox" id="w01" name="w01" value="w01" data-dojo-observer="showValues">
							&nbsp;<label for="w01">w01 input/checkbox dijit/form/CheckBox</label>
						</div>
						<div>
							<input type="radio" data-dojo-type="dijit/form/RadioButton" id="w021" name="w02" value="w02-1" data-dojo-observer="showValues">
							&nbsp;<label for="w021">w02-1 input/radio dijit/form/RadioButton</label>
							&nbsp;
							<input type="radio" data-dojo-type="dijit/form/RadioButton" id="w022" name="w02" value="w02-2" checked="checked" data-dojo-observer="showValues, logRadio">
							&nbsp;<label for="w022">w02-2 input/radio dijit/form/RadioButton</label>
						</div>
						<div>
							<input type="text" data-dojo-type="dijit/form/TextBox" id="w03" name="w03" value="w03" data-dojo-props="intermediateChanges:true" data-dojo-observer="showValues">
							&nbsp;<label for="w03">w03 input/text dijit/form/TextBox with intermediateChanges set to true</label>
						</div>
						<div>
							<input type="password" data-dojo-type="dijit/form/TextBox" id="w04" name="w04" value="w04" data-dojo-props="intermediateChanges:false" data-dojo-observer="showValues">
							&nbsp;<label for="w04">w04 input/password dijit/form/TextBox with intermediateChanges set to false</label>
						</div>
						<div>
							<select data-dojo-type="dijit/form/Select" id="w06" name="w06" data-dojo-observer="showValues">
								<option value="w06-1">w06-1 first</option>
								<option value="w06-2" selected="selected">w06-2 second</option>
							</select>
							&nbsp;<label for="w06">w06 select dijit/form/Select</label>
						</div>
						<div>
							<label for="w07">w07 textarea dijit/form/SimpleTextarea with intermediateChanges set to true</label><br>
							<textarea data-dojo-type="dijit/form/SimpleTextarea" id="w07" name="w07" data-dojo-observer="showValues"
								rows="3" cols="15" style="width: 15em;" data-dojo-props="intermediateChanges:true">w07</textarea>
						</div>
						<div>
							<button data-dojo-type="dijit/form/Button" name="w08" value="w08" data-dojo-observer="showValues">w08 button</button>&nbsp;
							<button type="button" data-dojo-type="dijit/form/Button" name="w09" value="w09 Button/button" data-dojo-observer="showValues">w09 type=button</button>&nbsp;
							<button type="reset" data-dojo-type="dijit/form/Button" name="w10" value="w10 Button/reset" data-dojo-observer="showValues">w10 type=reset</button>&nbsp;
							<button type="submit" data-dojo-type="dijit/form/Button" name="w11" value="w11 Button/submit" data-dojo-observer="showValues">w11 type=submit</button>
						</div>
					</fieldset>

					<script type="dojo/method" data-dojo-event="logRadio">
						// sample observer: logs radio buttons by name
						var values = this.gatherFormValues(["e02", "w02"]);
						console.log("e02: " + values.e02 + ", w02: " + values.w02);
					</script>
					<script type="dojo/method" data-dojo-event="showValues" data-dojo-args="value,name">
						if(name){
							// first time this method is called with no parameters
							// show the name and the value otherwise
							console.log("name = ", name, " value = ", value);
						}
						require(["dijit/registry", "dojo/query", "dojo/dom-class", "dojo/dom-construct", "dojo/dom", "dojo/domReady!"],
						function(registry, query, domClass, domConstruct, dom){
							// clear any hilited cells
							query("tr.hilite", dom.byId("table")).forEach(function(node){
								domClass.remove(node, "hilite");
							});
							// get the node of the table row used to display the value for this input
							var rowNode = dom.byId("tr" + name);
							// hilite the node
							domClass.add(rowNode, "hilite");
							// update the value displayed
							query("td.value", rowNode).forEach(function(node){
								var textNode = document.createTextNode(value.toString());
								domConstruct.place(textNode, node, "only");
							});
						});
					</script>
				</form>
			</div>
		</div>
		<!-- load dojo and provide config via data attribute -->
		<script src="//ajax.googleapis.com/ajax/libs/dojo/1.9.2/dojo/dojo.js" data-dojo-config="async:true"></script>
		<script>
			require([
				"dijit/registry",
				"dojo/parser",
				"dojo/on",
				"dojo/query",
				"dojo/dom-construct",
				"dojo/_base/lang",
				"dojo/_base/array",
				"dojo/dom",
				"dijit/layout/ContentPane",
				"dijit/layout/BorderContainer",
				"dojox/form/Manager",
				"dijit/form/Button",
				"dijit/form/CheckBox",
				"dijit/form/RadioButton",
				"dijit/form/TextBox",
				"dijit/form/ComboBox",
				"dijit/form/SimpleTextarea",
				"dijit/form/Select",
				"dojo/domReady!"],
			function(registry, parser, on, query, domConstruct, lang, arrayUtil, dom){
				// parse the page to render the Dojo elements
				parser.parse();

				// get the form widget
				var form = registry.byId("form");
				window.formManager = form;

				// query for all the inputs whose name begins with e (for element) or w (for widget)
				var names = [];
				query("[name^=e], [name^=w]", dom.byId("form")).forEach(function(node){
					if(arrayUtil.lastIndexOf(names, node.name, names.length - 1) === -1){
						names.push(node.name);
					}
				});
				// gather the values in the form for all the inputs named in the name array
				var values = form.gatherFormValues(names),
					table = dom.byId("table");
				// sort the name array and create a table to display the names and values
				names.sort();
				arrayUtil.forEach(names, function(name){
					// Note: This is just a quick way to create a table, and is
					// not the most performant way to create a table using Dojo,
					// but is sufficient for this example
					domConstruct.place('<tr id="tr' + name + '"><td>' + name + '</td><td class="value">' + values[name] + '</td>',table);
					});
				// attach the event handlers to the control checkboxes
				query("input[id^=c0]", dom.byId("controls")).on("click", function(event){
					switch (event.target.id){
						case "c01":
							form[this.checked ? "enable" : "disable"]();
							break;
						case "c02":
							form[this.checked ? "addClass" : "removeClass"]("makeYellow", ["part1", "part2"]);
							break;
						case "c03":
							form[this.checked ? "show" : "hide"](["part1"]);
							break;
						case "c04":
							form[this.checked ? "show" : "hide"](["part2"]);
					}
				});
				// ensure the submit buttons don't submit, but log
				form.on("submit", function(event){
					event.preventDefault();
					event.stopPropagation();
					console.log("Submit");
				});
			});
		</script>
	</body>
</html>

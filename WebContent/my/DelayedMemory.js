define([
	"../dojo/_base/declare",
	"../dojo/_base/lang",
	"../dojo/Deferred",
	"../dojo/store/Memory",
	"../dojo/store/util/QueryResults"
], function (declare, lang, Deferred, Memory, QueryResults) {
	return declare(Memory, {
		// summary:
		//		Extension of dojo/store/Memory implementing an asynchronous query method
		//		which resolves on a timeout.
		
		// delay: Number
		//		Number of milliseconds to delay before resolving the query results.
		delay: 500,
		
		query: function(query, options) {
			var queryResult = this.queryEngine(query, options)(this.data),
				totalDeferred = new Deferred(),
				resultsDeferred = new Deferred(),
				resultsPromise = lang.delegate(resultsDeferred.promise);
			
			resultsPromise.total = totalDeferred;
			
			function resolveTotal() {
				totalDeferred.resolve(queryResult.total);
			}
			function resolveResults() {
				resultsDeferred.resolve(queryResult);
			}
			
			setTimeout(resolveTotal, this.delay);
			setTimeout(resolveResults, this.delay);
			
			return new QueryResults(resultsPromise);
		}
	});
});
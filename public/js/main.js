(function($){
	window.App = {
		Models:{},
		Views:{},
		Collections:{},
		Router:{}
	};

	window.vent = _.extend({}, Backbone.Events);
	window.template = function(id){
		return _.template($("#"+id).html());
	}
})(jQuery);
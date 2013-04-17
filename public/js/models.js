App.Models.Contact = Backbone.Model.extend({
	validate: function(attrs){
		if(!attrs.first_name || !attrs.last_name){
			return "First anme and last name is required";
		}

		if(!attrs.email){
			return "email address required!";
		}
	}
});
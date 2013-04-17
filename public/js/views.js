App.Views.AppView = Backbone.View.extend({
	initialize: function(){
		//console.log(this.collection.toJSON());
		var addContactView = new App.Views.AddContact({collection: App.contacts}),
			allContacts = new App.Views.Contacts({collection: App.contacts});

		$("#allContacts").append(allContacts.render().el);	
	}
});

App.Views.AddContact = Backbone.View.extend({
	
	initialize: function(){
		this.first_name = $("#first_name");
		this.last_name = $("#last_name");
		this.email = $("#email");
		this.description = $("#description");

	},

	el: "#addContact",
	events:{
		'submit': 'addContact'
	},

	addContact: function(e){
		e.preventDefault();
		var contact = this.collection.create({
			"first_name": this.first_name.val(),
			"last_name": this.last_name.val(),
			"email": this.email.val(),
			"description": this.description.val()
		},{wait:true});

		this.clearForm();

	},

	clearForm: function(){
		this.first_name.val("");
		this.last_name.val("");
		this.email.val("");
		this.description.val("");
	}

});

App.Views.Contacts = Backbone.View.extend({

	initialize:function(){
		this.collection.on("add", this.addOne, this);
	},

	tagName: "tbody",

	render: function(){
		this.collection.each(this.addOne, this);
		return this;
	},

	addOne: function(contact){
		var contactView = new App.Views.Contact({model: contact});
		this.$el.append(contactView.render().el);

	}

});

App.Views.EditContactView = Backbone.View.extend({
	initialize:function(){
		this.render(this.model);

		this.form = this.$("form");
		this.first_name = this.form.find("#edit_first_name"); 
		this.last_name = this.form.find("#edit_last_name"); 
		this.email = this.form.find("#edit_email"); 
		this.description = this.form.find("#edit_description"); 
	},

	events: {
		"submit form": "submitForm",
		"click button.cancel": "cancelEditing"
	},

	submitForm: function(e){
		e.preventDefault();

		this.model.save({
			"first_name":  this.first_name.val(),
			"last_name":  this.last_name.val(),
			"email":  this.email.val(),
			"description":  this.description.val()
		});

		this.remove();
	},

	cancelEditing: function(){
		this.remove();
	},

	template: template("editContactTemplate"),

	render: function(contact){
		this.$el.append(this.template(contact.toJSON()));
		return this;
	}
});

App.Views.Contact = Backbone.View.extend({
	initialize: function(){
		this.model.on("destroy", this.unrender, this);
		this.model.on("change", this.render, this);
	},

	tagName: "tr",
	events:{
		"click a.delete": "deleteContact",
		"click a.edit": "editContact",
	},

	deleteContact: function(){
		this.model.destroy();
	},

	editContact: function(e){
		var editContactView = new App.Views.EditContactView({
			model:this.model
		});

		$("#editContact").html(editContactView.el);
	},

	template: template("allContactTemplate"),

	render: function(){
		this.$el.html(this.template(this.model.toJSON())); 
		return this;
	},

	unrender: function(){
		this.remove(); //this.$el.remove()
	}

});




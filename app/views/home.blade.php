<!doctype html>
<html>
<head>
	<title>Contact Manager</title>
	<meta charset="utf-8" />
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/bootstrap-responsive.css" />
  <style>
  .form-actions{
    background: none;
    border: transparent;    
  }
  </style>
</head>
<body>

<div class="container-fluid">
  <form class="form-horizontal" id="addContact">  
          <fieldset>  
            <legend>Add Contact:</legend>
            <div class="control-group">  
              <label class="control-label" for="first_name">First Name</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="first_name">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="last_name">Last Name</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="last_name">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="email">Email Address</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="email">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="description">Description</label>  
              <div class="controls">  
                <textarea class="input-xlarge" id="description" rows="3"></textarea>  
              </div>  
            </div> 


            <div class="form-actions">  
              <button type="submit" class="btn btn-primary">Add Contact</button>  
            </div>  
          </fieldset>  
  </form>

  <table id="allContacts" class="table table-striped">
    <thead>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email Address</th>
      <th>Description</th>
      <th>Config</th>
    </thead>  
  </table>

  <div id="editContact"></div> 
</div>
 

<script type="text/template" id="editContactTemplate">
  <form class="form-horizontal" id="editContactForm">  
          <fieldset>  
            <legend>Edit Contact:  <%= first_name %></legend>  
            <div class="control-group">  
              <label class="control-label" for="edit_first_name">First Name</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="edit_first_name" value="<%= first_name %>">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="edit_last_name">Last Name</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="edit_last_name" value="<%= last_name %>">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="edit_email">Email Address</label>  
              <div class="controls">  
                <input type="text" class="input-xlarge" id="edit_email" value="<%= email %>">  
              </div>  
            </div>
            <div class="control-group">  
              <label class="control-label" for="edit_description">Description</label>  
              <div class="controls">  
                <textarea class="input-xlarge" id="edit_description" rows="3"><%= description %></textarea>  
              </div>  
            </div> 


            <div class="form-actions">  
              <button type="submit" class="btn btn-primary">Edit Contact</button>  
              <button type="button" class="btn cancel">Cancel</button>  
            </div>  
          </fieldset>  
  </form>

</script>

<script type="text/template" id="allContactTemplate">
  <td><%= first_name %></td>  
  <td><%= last_name %></td> 
  <td><%= email %></td> 
  <td><%= description %></td>  
  <td>
    <a href="#contacts/<%= id %>" class="delete">Delete</a>
    <a href="#contacts/<%= id %>/edit" class="edit">Edit</a>  
  </td> 
</script>

<script src="js/lib/jquery-1.9.1.min.js"></script>
<script src="js/lib/underscore.js"></script>
<script src="js/lib/backbone.js"></script>
<script src="js/main.js"></script>
<script src="js/models.js"></script>
<script src="js/collections.js"></script>
<script src="js/views.js"></script>
<script src="js/router.js"></script>

<script>
	new App.Router;
	Backbone.history.start();

	App.contacts = new App.Collections.Contacts;

	App.contacts.fetch().done(function(data){
		new App.Views.AppView({collection: App.contacts});
	});
</script>
</body>
</html>
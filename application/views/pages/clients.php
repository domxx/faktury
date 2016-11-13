<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	<li><?php echo anchor("main/view/home", "Home");?></li>
        <li class="active"><?php echo anchor("#", "Clients");?></li>
        <li><?php echo anchor("main/view/bills", "Bills");?></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="#" id="create_client_button">Create</a></p>
      <p><a href="#" id="edit_client_button">Edit</a></p>
      <p><a href="#" id="delete_client_button">Delete</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Client management</h1>
      <p>Here you can manage all your clients.</p>
<?php



	if ($this->session->flashdata("create_info") == "success")
		echo '<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Success!</strong> Client successfully created.
	  	</div>';
	
	else if ($this->session->flashdata("create_info") == "failure")
		echo '<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Failure!</strong> Failed to create a client.
	  	</div>';
	
	if ($this->session->flashdata("edit_info") == "success")
		echo '<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Success!</strong> Client successfully edited.
	  	</div>';
	
	else if ($this->session->flashdata("edit_info") == "failure")
		echo '<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Failure!</strong> Failed to edit a client.
		</div>';
	
	if ($this->session->flashdata("delete_info") == "success")
		echo '<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Success!</strong> Client successfully deleted.
	  	</div>';
	
	else if ($this->session->flashdata("delete_info") == "failure")
		echo '<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Failure!</strong> Failed to delete a client.
		</div>';
	
	
	
	echo validation_errors();
	
	echo form_open("main/validate_create", 'class="form-horizontal" id="create_client_form"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Create client</h2>";
	echo '<label class="control-label col-sm-2" for="first_name">First Name:</label>';
	echo '<div class="col-sm-10">';
	$first_name_data = array(
		"name" => "first_name",
		"type" => "text",
		"value" => set_value("first_name"),
		"class" => "form-control",
		"id" => "first_name",
		"placeholder" => "Enter your first name");
	echo form_input($first_name_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="last_name">Last Name:</label>';
	echo '<div class="col-sm-10">';
	$last_name_data = array(
		"name" => "last_name",
		"type" => "text",
		"value" => set_value("last_name"),
		"class" => "form-control",
		"id" => "last_name",
		"placeholder" => "Enter your last name");
	echo form_input($last_name_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="email">Email:</label>';
	echo '<div class="col-sm-10">';
	$email_data = array(
		"name" => "email",
		"type" => "email",
		"value" => set_value("email"),
		"class" => "form-control",
		"id" => "email",
		"placeholder" => "Enter your email");
	echo form_input($email_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="address">Address:</label>';
	echo '<div class="col-sm-10">';
	$address_data = array(
		"name" => "address",
		"type" => "address",
		"value" => set_value("address"),
		"class" => "form-control",
		"id" => "address",
		"placeholder" => 'Enter your address in format &quot;street, number, city&quot;');
	echo form_input($address_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="ico">IČO:</label>';
	echo '<div class="col-sm-10">';
	$ico_data = array(
		"name" => "ico",
		"type" => "text",
		"value" => set_value("ico"),
		"class" => "form-control",
		"id" => "ico",
		"placeholder" => "Enter your IČO");
	echo form_input($ico_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="dic">DIČ:</label>';
	echo '<div class="col-sm-10">';
	$dic_data = array(
		"name" => "dic",
		"type" => "text",
		"value" => set_value("dic"),
		"class" => "form-control",
		"id" => "dic",
		"placeholder" => "Enter your DIČ");
	echo form_input($dic_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<div class = col-sm-offset-2 col-sm-10>';
	echo form_submit("submit", "Submit", array("class" => "btn btn-default"));
	echo "</div></div>";
	
	echo form_close();
	
	
	
	echo form_open("main/edit_client", 'class="form-horizontal" id="edit_client_form"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Edit client</h2>";
	echo '<label class="control-label col-sm-2" for="clients">Select a client:</label>';
	echo '<div class="col-sm-10">';
	
	$edit_clients_data = array(
		"name" => "edit_clients",
		"id" => "edit_clients"
	);
	
	$options = array();
	foreach ($clients_options as $r)
		$options[$r->id] = $r->first_name . " " . $r->last_name . " &lt;" . $r->email . "&gt;";
	echo form_dropdown($edit_clients_data, $options);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<div class = col-sm-offset-2 col-sm-10>';
	echo form_submit("submit", "Submit", array("class" => "btn btn-default"));
	echo "</div></div>";
	
	echo form_close();
	
	
	
	echo form_open("main/delete_client", 'class="form-horizontal" id="delete_client_form"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Delete client</h2>";
	echo '<label class="control-label col-sm-2" for="clients">Select a client:</label>';
	echo '<div class="col-sm-10">';
	
	$clients_data = array(
		"name" => "clients",
		"id" => "clients",
	);
	
	$options = array();
	foreach ($clients_options as $r)
		$options[$r->id] = $r->first_name . " " . $r->last_name . " &lt;" . $r->email . "&gt;";
	echo form_dropdown($clients_data, $options);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<div class = col-sm-offset-2 col-sm-10>';
	echo form_submit("submit", "Submit", array("class" => "btn btn-default"));
	echo "</div></div>";
	
	echo form_close();
?>

    </div>
  </div>
</div>

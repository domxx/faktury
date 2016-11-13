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
        <li><?php echo anchor("main/view/clients", "Clients");?></li>
        <li class="active"><?php echo anchor("#", "Bills");?></li>
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
      <p><a href="#" id="create_bill_button">Create</a></p>
      <p><a href="#" id="edit_bill_button">Edit</a></p>
      <p><a href="#" id="delete_bill_button">Delete</a></p>
      <p><a href="#" id="print_bill_button">Print</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Bill management</h1>
      <p>Here you can manage all your bills.</p>
<?php



	if ($this->session->flashdata("create_info") == "success")
		echo '<div class="alert alert-success fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Success!</strong> Bill successfully created.
	  	</div>';
	
	else if ($this->session->flashdata("create_info") == "failure")
		echo '<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    		<strong>Failure!</strong> Failed to create a bill.
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
	
	echo form_open("main/validate_create_bill", 'class="form-horizontal" id="create_bill_form"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Create bill</h2>";
	echo '<label class="control-label col-sm-2" for="name">Name:</label>';
	echo '<div class="col-sm-10">';
	$name_data = array(
		"name" => "name",
		"type" => "text",
		"value" => set_value("name"),
		"class" => "form-control",
		"id" => "name",
		"placeholder" => "Enter name of the bill");
	echo form_input($name_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="total">Total:</label>';
	echo '<div class="col-sm-10">';
	$total_data = array(
		"name" => "total",
		"type" => "text",
		"value" => set_value("total"),
		"class" => "form-control",
		"id" => "total",
		"placeholder" => "Enter total sum of the bill");
	echo form_input($total_data);
	echo "</div></div>";
	
	echo '<div class="form-group">';
	echo '<label class="control-label col-sm-2" for="clients">Select a client:</label>';
	echo '<div class="col-sm-10">';
	
	$assign_client_data = array(
		"name" => "client_id",
		"id" => "clients"
	);
	
	$options = array();
	foreach ($clients_options as $r)
		$options[$r->id] = $r->first_name . " " . $r->last_name . " &lt;" . $r->email . "&gt;";
	echo form_dropdown($assign_client_data, $options, $options[$r->id]);
	echo "</div></div>";

	echo '<div class="form-group">';
	echo '<div class = col-sm-offset-2 col-sm-10>';
	echo form_submit("submit", "Submit", array("class" => "btn btn-default"));
	echo "</div></div>";
	
	echo form_close();
	
	
	
	echo form_open("main/print_bill", 'class="form-horizontal" id="print_bill_form"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Print a bill</h2>";
	echo '<label class="control-label col-sm-2" for="clients">Select a bill:</label>';
	echo '<div class="col-sm-10">';
	
	$bill_data = array(
		"name" => "bill",
		"id" => "bill",
	);
	
	$options = array();
	foreach ($bill_options as $r)
		$options[$r->id] = $r->name;
	echo form_dropdown($bill_data, $options);
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

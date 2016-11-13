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
      <p><a href="#">Create</a></p>
      <p><a href="#">Edit</a></p>
      <p><a href="#">Delete</a></p>
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Client management</h1>
      <p>Here you can manage all your clients.</p>
<?php

if ($this->session->flashdata("access") == "no")
	echo "You cant' access this page.";
else {
	if ($this->input->post("first_name") != null){
		$first_name = set_value("first_name");
		$last_name = set_value("last_name");
		$email = set_value("email");
		$address = set_value("address");
	        $ico = set_value("ico");
		$dic = set_value("dic");
		$id = $this->input->post("clients");	
	}
	else{
		foreach ($client as $r){
			$first_name = $r->first_name;
			$last_name = $r->last_name;
			$email = $r->email;
			$address = $r->address;
			$ico = $r->ico;
			$dic = $r->dic;	
			$id = $r->id;
		}
	}

	echo form_open("main/validate_edit/" . $id, 'class="form-horizontal" id="edit_client"');
	echo '<div class="form-group">';
	echo "<h2 class='form_header'>Edit client</h2>";
	echo '<label class="control-label col-sm-2" for="first_name">First Name:</label>';
	echo '<div class="col-sm-10">';
	
	$first_name_data = array(
		"name" => "first_name",
		"type" => "text",
		"value" => $first_name,
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
		"value" => $last_name,
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
		"value" => $email,
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
		"value" => $address,
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
		"value" => $ico,
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
		"value" => $dic,
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
}
?>

    </div>
  </div>
</div>

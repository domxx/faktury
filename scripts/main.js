$(document).ready(function(){
	$("#create_client_form").hide();
	$("#edit_client_form").hide();
	$("#delete_client_form").hide();
	$("#create_bill_form").hide();
	$("#print_bill_form").hide();
});

$(document).ready(function(){
	$("#create_client_button").click(function(){
		$("#create_client_form").show();
		$("#edit_client_form").hide();
		$("#delete_client_form").hide();
	})
});

$(document).ready(function(){
	$("#edit_client_button").click(function(){
		$("#create_client_form").hide();
		$("#edit_client_form").show();
		$("#delete_client_form").hide();
	})
});

$(document).ready(function(){
	$("#delete_client_button").click(function(){
		$("#create_client_form").hide();
		$("#edit_client_form").hide();
		$("#delete_client_form").show();
	})
});

$(document).ready(function(){
	$("#create_bill_button").click(function(){
		$("#create_bill_form").show();
		$("#edit_bill_form").hide();
		$("#delete_bill_form").hide();
		$("#print_bill_form").hide();
	})
});

$(document).ready(function(){
	$("#print_bill_button").click(function(){
		$("#create_bill_form").hide();
		$("#edit_bill_form").hide();
		$("#delete_bill_form").hide();
		$("#print_bill_form").show();
	})
});
<?php
class main extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->library("session");
	}

	public function index(){
		$this->view();
	}

        public function view($page = 'home'){
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
			show_404();

		$data['title'] = ucfirst($page);
		
		$this->load->model("main_model");
		$cl_opt = $this->main_model->get_clients_options();
		$data['clients_options'] = $cl_opt;

		$bill_opt = $this->main_model->get_bill_options();
		$data["bill_options"] = $bill_opt;

		$client = $this->main_model->get_client_profile($this->input->post("edit_clients"));
		$data['client'] = $client;
		$this->session->set_flashdata("access", "yes");

		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}

	public function validate_create(){
		$this->load->library('form_validation');
		$this->form_validation->set_message("valid_email", "Email is not in correct form.");

		$this->form_validation->set_rules("first_name", "First name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("ico", "IČO", "trim|numeric|required");
		$this->form_validation->set_rules("dic", "DIČ", "trim|numeric|required");

		if ($this->form_validation->run()){
			$this->load->model('main_model');
			if ($this->main_model->create_client())
				$this->session->set_flashdata("create_info", "success");
			
			else
				$this->session->set_flashdata("create_info", "failure");
		}
		else 
			$this->session->set_flashdata("create_info", "failure");
		
		$this->view("clients");
	}

	public function delete_client(){
		$this->load->model("main_model");
		if ($this->main_model->delete_client($this->input->post("clients")))
			$this->session->set_flashdata("delete_info", "success");
		else
			$this->session->set_flashdata("delete_info", "failure");
		$this->view("clients");
	}

	public function edit_client(){
		$this->view("edit_client");
	}

	public function validate_edit($id){
		$this->load->library('form_validation');
		$this->form_validation->set_message("valid_email", "Email is not in correct form.");

		$this->form_validation->set_rules("first_name", "First name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last name", "trim|required");
		$this->form_validation->set_rules("email", "Email", "trim|valid_email|required");
		$this->form_validation->set_rules("address", "Address", "trim|required");
		$this->form_validation->set_rules("ico", "IČO", "trim|numeric|required");
		$this->form_validation->set_rules("dic", "DIČ", "trim|numeric|required");

		if ($this->form_validation->run()){
			$this->load->model('main_model');
			if ($this->main_model->edit_client($id))
				$this->session->set_flashdata("edit_info", "success");
			
			else
				$this->session->set_flashdata("edit_info", "failure");
		}
		else 
			$this->session->set_flashdata("edit_info", "failure");
		
		$this->view("clients");
	}

	public function validate_create_bill(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules("name", "Name", "trim|required");
		$this->form_validation->set_rules("total", "Total", "trim|numeric|required");

		if ($this->form_validation->run()){
			$this->load->model('main_model');
			if ($this->main_model->create_bill())
				$this->session->set_flashdata("create_info", "success");
			
			else
				$this->session->set_flashdata("create_info", "failure");
		}
		else 
			$this->session->set_flashdata("create_info", "failure");
		
		$this->view("bills");
	}

	public function print_bill(){
		$this->load->model("main_model");
		$bill = $this->main_model->get_bill($this->input->post("bill"));
		foreach ($bill as $r){
			$name = $r->name;
			$total = $r->total;
			$client_data = $this->main_model->get_client_profile($r->client_id);
			foreach ($client_data as $rr)
				$client = $rr->first_name . " " . $rr->last_name;
		}
		$pdf_location = $_SERVER['DOCUMENT_ROOT']."/faktury/pdf/fpdf.php";
		require_once($pdf_location);
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont("Arial", "B", 16);
		$pdf->Cell(40, 10, "Name = " . $name);
		$pdf->Cell(40, 10, "Total = " . $total);
		$pdf->Cell(40, 10, "Client = " . $client);
		$pdf->Output();
	}

}

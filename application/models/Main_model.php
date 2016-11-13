<?php
class Main_model extends CI_Model {
		
	public function create_client(){
		$data = array(
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"email" => $this->input->post("email"),
			"address" => $this->input->post("address"),
			"ico" => $this->input->post("ico"),
			"dic" => $this->input->post("dic")
		);

		$query = $this->db->insert("clients", $data);

		if ($query)
			return True;
		return False;
	}

	public function get_clients_options(){
		$query = $this->db->get("clients");
		return $query->result();	
	}

	public function delete_client($id){
		$this->db->where("id", $id);
		if ($this->db->delete("clients"))
			return True;
		return False;
	}
	
	public function get_client_profile($id){
		$this->db->where("id", $id);
		return $this->db->get("clients")->result();
	}

	public function edit_client($id){
		$this->db->where("id", $id);
		$data = array(
			"first_name" => $this->input->post("first_name"),
			"last_name" => $this->input->post("last_name"),
			"address" => $this->input->post("address"),
			"email" => $this->input->post("email"),
			"ico" => $this->input->post("ico"),
			"dic" => $this->input->post("dic"),
		);
		return $this->db->update("clients", $data);
	}

	public function create_bill(){
		$data = array(
			"name" => $this->input->post("name"),
			"total" => $this->input->post("total"),
			"client_id" => $this->input->post("client_id")
		);

		$query = $this->db->insert("bills", $data);

		if ($query)
			return True;
		return False;
	}

	public function get_bill_options(){
		$query = $this->db->get("bills");
		return $query->result();	
	}

	public function get_bill($id){
		$this->db->where("id", $id);
		return $this->db->get("bills")->result();
	}
}
?>

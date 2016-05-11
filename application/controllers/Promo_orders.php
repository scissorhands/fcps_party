<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_orders extends CI_Controller {
	public $promos_arr;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', 'users');
		$this->users->is_logged_in();
		$this->load->model('students_model', 'students');
		$this->load->model('promos_model', 'promos');
		$this->load->model('promo_orders_model', 'promo_orders');
		$this->load->model('utilities_db_model', 'utilities_db');
		$promos = $this->promos->get_all();
		$this->promos_arr = parse_to_key_vals($promos, "id", "name");
	}

	public function index()
	{
		
	}

	public function edit_promo_order( $student_id )
	{
		$this->validate_order();
		$order = $this->promo_orders->get_student_order($student_id);
		$this->load->view("template/loader", array(
			"title" => "Editar pedido",
			"content" => "students/edit_order",
			"order" => $order,
			"promos" => $this->promos_arr
		));
	}

	public function validate_order()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total_invited', 'Total Invited', 'required|greater_than[0]|callback_invited_number['.$this->input->post("promo_id").']');
		if ($this->form_validation->run()) {
			$order = array(
				"promo_id" => $this->input->post('promo_id'),
				"invited_num" => $this->input->post('total_invited')
			);
			$this->utilities_db->generic_update("promo_orders", $order, array("student_id" =>$this->input->post('student_id') ) );
			$this->session->set_flashdata('insert_msg', 'Pedido guardado.');
			redirect('students/');	
		}
	}

	public function invited_number( $total_invited, $promo_id )
	{
		if( $this->promos_arr[$promo_id] != "Paquete A" && $total_invited < 4 ){
			$this->form_validation->set_message('invited_number', "El paquete '".$this->promos_arr[$promo_id].
				"' debe tener al menos 4 invitados.");
			return false;
		} else {
			return true;
		}
	}

}

/* End of file Promo_orders.php */
/* Location: ./application/controllers/Promo_orders.php */
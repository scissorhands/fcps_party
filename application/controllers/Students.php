<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public $promos_arr;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model', 'students');
		$this->load->model('promos_model', 'promos');
		$this->load->model('promo_orders_model', 'promo_orders');
		$this->load->model('utilities_db_model', 'utilities_db');
		$promos = $this->promos->get_all();
		$this->promos_arr = parse_to_key_vals($promos, "id", "name");
	}

	public function index()
	{
		$this->load->view("template/loader", array(
			"title" => "UNAM - FCPS",
			"content" => "students/main"
		));
	}

	public function new_order( $student_id = null )
	{
		$this->validate_order();
		$student = $this->students->get($student_id);
		$this->load->view("template/loader", array(
			"title" => "Nuevo pedido",
			"content" => "students/new_order",
			"student" => $student,
			"promos" => $this->promos_arr
		));
	}

	public function new_payment( $promo_order_id = null )
	{
		$this->validate_payment();
		$order = $this->promo_orders->get( $promo_order_id );
		$this->load->view("template/loader", array(
			"title" => "New Order Payment",
			"content" => "students/new_payment",
			"order" => $order
		));
	}

	public function validate_payment()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('amount', 'Amount', 'required|greater_than[0]');
		if ($this->form_validation->run()) {
			$new_order = array(
				"promo_order_id" => $this->input->post('order_id'),
				"amount" => $this->input->post('amount')
			);
			$this->utilities_db->generic_insert("order_payments", $new_order );
			$this->session->set_flashdata('insert_msg', 'New Order Payment Inserted');
			redirect('students/');	
		}
	}

	public function validate_order()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total_invited', 'Total Invited', 'required|greater_than[0]|callback_invited_number['.$this->input->post("promo_id").']');
		if ($this->form_validation->run()) {
			$new_order = array(
				"student_id" => $this->input->post('student_id'),
				"promo_id" => $this->input->post('promo_id'),
				"invited_num" => $this->input->post('total_invited')
			);
			$this->utilities_db->generic_insert("promo_orders", $new_order );
			$this->session->set_flashdata('insert_msg', 'New Promo Order Inserted');
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

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */
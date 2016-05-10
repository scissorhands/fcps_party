<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
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
		$this->load->view("template/loader", array(
			"title" => "Estudiantes",
			"content" => "students/main"
		));
	}

	public function new_student()
	{
		$this->validate_student();
		$this->load->view("template/loader", array(
			"title" => "Nuevo estudiante",
			"content" => "students/new"
		));
	}

	public function edit_student( $student_id )
	{
		$this->validate_student('edit');
		$student = $this->students->get( $student_id );
		$this->load->view("template/loader", array(
			"title" => "Editar estudiante",
			"content" => "students/edit",
			"student_id" => $student_id,
			"student" => $student
		));
	}

	public function validate_student( $action = "create" )
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('last_name', 'Apellidos', 'required');
		if ($this->form_validation->run()) {
			$student = array(
				"name" => $this->input->post('name'),
				"last_name" => $this->input->post('last_name'),
				"phone_number" => $this->input->post('phone'),
				"email" => $this->input->post('email')
			);
			if( $action == "create" ){
				$this->utilities_db->generic_insert("students", $student );
				$this->session->set_flashdata('insert_msg', 'Nuevo estudiante registrado.');
			} else {
				$this->utilities_db->generic_update("students", $student, array( "id"=> $this->input->post('student_id') ) );
				$this->session->set_flashdata('insert_msg', 'Estudiante editado.');
			}
			redirect('students/');	
		}
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
			"title" => "Nuevo pago de pedido",
			"content" => "students/new_payment",
			"order" => $order
		));
	}

	public function validate_payment()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('amount', 'Cantidad a pagar', 'required|greater_than[0]|callback_valid_amount['.$this->input->post('order_id').']');
		if ($this->form_validation->run()) {
			$new_order = array(
				"promo_order_id" => $this->input->post('order_id'),
				"amount" => $this->input->post('amount')
			);
			$this->utilities_db->generic_insert("order_payments", $new_order );
			$this->session->set_flashdata('insert_msg', 'Nuevo pago registrado.');
			redirect('students/');	
		}
	}

	public function valid_amount( $amount, $order_id )
	{
		$order = $this->promo_orders->get( $order_id );
		$total_to_pay = ($order->total_invited_price + $order->student_price) - $order->total_paid;
		if( $amount > $total_to_pay ){
			$this->form_validation->set_message('valid_amount', "El campo '{field}'' ".
				"no debe exceder el total por pagar ($total_to_pay).");
			return false;
		} else {
			return true;
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
			$this->session->set_flashdata('insert_msg', 'Nuevo pedido registrado.');
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
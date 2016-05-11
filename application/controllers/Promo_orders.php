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

	public function edit_payment( $payment_id )
	{
		$this->validate_payment();
		$payment = $this->promo_orders->get_payment( $payment_id );
		$order = $this->promo_orders->get( $payment->promo_order_id );	
		$this->load->view("template/loader", array(
			"title" => "Editar pago de pedido",
			"content" => "students/edit_payment",
			"payment" => $payment,
			"order" => $order,
			"hidden" => array(
					"order_id" => $order->id,
					"payment_id" => $payment->id
				)
		));
	}

	public function validate_payment()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('amount', 'Cantidad a pagar', 'required|greater_than[0]|callback_valid_amount['.$this->input->post('payment_id').']');
		if ($this->form_validation->run()) {
			$payment = array(
				"amount" => $this->input->post('amount')
			);
			$this->utilities_db->generic_update("order_payments", $payment, array("id"=> $this->input->post('payment_id')));
			$this->session->set_flashdata('insert_msg', 'Pago guardado.');
			redirect('students/');	
		}
	}

	public function valid_amount( $amount, $payment_id )
	{
		$payment = $this->promo_orders->get_payment( $payment_id );
		$order = $this->promo_orders->get( $payment->promo_order_id );
		$total_to_pay = ($order->total_invited_price + $order->student_price) - $order->total_paid + $payment->amount;
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students extends CI_Controller {
	public $promos;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model', 'students');
		$this->load->model('promos_model', 'promos');
		$this->load->model('utilities_db_model', 'utilities_db');
		$promos = $this->promos->get_all();
		$this->promos = parse_to_key_vals($promos, "id", "name");
	}

	public function index()
	{
		$students = $this->students->get_all();
		$this->load->view("template/loader", array(
			"title" => "UNAM - FCPS",
			"content" => "students/main",
			"students" => $students
		));
	}

	public function new_order( $student_id = null )
	{
		$this->validate_order();
		$student = $this->students->get($student_id);
		$this->load->view("template/loader", array(
			"title" => "New Promo Order",
			"content" => "students/new_order",
			"student" => $student,
			"promos" => $this->promos
		));
	}

	public function validate_order()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('total_invited', 'Total Invited', 'required');
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

}

/* End of file Students.php */
/* Location: ./application/controllers/Students.php */
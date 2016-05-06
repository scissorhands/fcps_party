<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatables extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model', 'students');
	}

	public function index()
	{
		
	}

	public function students_list()
	{
		$draw = $this->input->get('draw');
		$start = $this->input->get('start');
		$length = $this->input->get('length');
		$search = $this->input->get('search');
		$filter = $search['value'] != ""? $search['value'] : null;
		$students = $this->students->get_filtered( $filter, $start, $length );
		$filtered = $this->students->get_filtered( $filter );
		$data = array();
		foreach ($students as $student) {
			$buffer = array();
			foreach ($student as $key => $value) {
				switch ($key) {
					case 'student_id':
						break;
					case 'promo_id':
						$buffer[] = $value?
						'<a href="'.base_url().'students/new_payment/'.
							$value.'" title="Add payment" class="btn btn-primary">New payment</a>' :
						'<a href="'.base_url().'students/new_order/'.
							$student->student_id.'" title="Add payment" class="btn btn-success">New order</a>';
						break;
					case 'total_to_pay':
						$buffer[] = $student->student_price + $student->total_invited_price;
						break;
					
					default:
						$buffer[] = $value;
						break;
				}
			}
			$data[] = $buffer;
		}
		$response = array(
			"draw" => $draw,
			"recordsTotal" => count($students),
			"recordsFiltered" => count($filtered),
			"data" => $data,
		);
		dump( $response );
	}

}

/* End of file Datatables.php */
/* Location: ./application/controllers/Datatables.php */
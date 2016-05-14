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
			$total = $student->student_price + $student->total_invited_price;
			$perc = $student->total_paid > 0? ($student->total_paid/$total)*100 :0;
			foreach ($student as $key => $value) {
				switch ($key) {
					case 'full_name':
						$buffer[] = anchor('students/edit_student/'.$student->student_id, $value );
						break;
					case 'student_id':
						break;
					case 'promo_id':
						$buffer[] = $this->load->view("tools/menu_buttons", 
							array(
								"student"=> $student,
								"total" => $total,
								"promo_id" => $value
							),
							true 
						);
						break;
					case 'total_to_pay':
						$buffer[] = $total;
						break;
					case 'total_paid':
						
						$buffer[] = $this->load->view('tools/progress_bar', array('percentage'=>$perc), TRUE);
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
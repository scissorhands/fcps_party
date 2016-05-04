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
		foreach ($students as $user) {
			$buffer = array();
			foreach ($user as $key => $value) {
				switch ($key) {
					case 'id':
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
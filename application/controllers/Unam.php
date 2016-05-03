<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unam extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model', 'students');
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

}

/* End of file Unam.php */
/* Location: ./application/controllers/Unam.php */
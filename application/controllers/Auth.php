<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model', "users");
	}

	public function index()
	{
		$this->redir_if_logged_in();
		$this->validate_user();
		$this->load->view("template/loader", array(
			"title" => "Login",
			"content" => "login/main",
			"disable_nav" => true
		));
	}

	private function redir_if_logged_in()
	{
		if( $this->session->userdata("is_logged_in") ){
			redirect("/");
		}
	}

	private function validate_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_autenticate_user['.$this->input->post('password').']');
		if ($this->form_validation->run()) {
			$user = $this->users->get( $this->input->post("email") );
			$this->session->set_userdata( 
				array(
					"user_id" => $user->id,
					"user_email" => $user->email,
					"is_logged_in" => true
				)
			);
			redirect('/');	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("auth/");
	}

	public function autenticate_user( $email, $password )
	{
		if( !$this->users->autenticate( $email, $password ) ){
			$this->form_validation->set_message('autenticate_user', "Login inválido.");
			return false;
		} else {
			return true;
		}
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function autenticate( $email, $password )
	{
		$query = $this->db->where( 
			array(
				"email" => $email,
				"password" => md5($password)
			) 
		)->get("users");
		return $query->result()? true : false;
	}

	public function get( $email )
	{
		$query = $this->db->select("id,email")
		->where("email", $email)->get("users");
		return $query->result()? $query->row() : null;
	}

	public function is_logged_in()
	{
		if( !$this->session->userdata("is_logged_in") ){
			redirect("/auth");
		}
	}

}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
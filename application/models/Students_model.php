<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_model extends CI_Model {

	public function get_all()
	{
		$query = $this->db->get("students");
		return $query->result();
	}

	public function get( $student_id )
	{
		$query = $this->db->where("id", $student_id )->get("students");
		return $query->result() ? $query->row() : null;
	}

}

/* End of file Students_model.php */
/* Location: ./application/models/Students_model.php */
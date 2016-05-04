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

	public function get_filtered( $filter = null, $start = null, $length = null )
	{
		if($filter){
			$where_filter = "name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%' OR email LIKE '%{$filter}%'";
		}
		$this->db->select("name, last_name, email, phone_number, NULL AS menu", false)
		->from("students AS S");
		if( $filter && $start != null && $length ){
			$this->db->where($where_filter)
			->limit($length, $start);
		} else if( $start != null && $length ){
			$this->db->limit($length, $start);
		} else if( $filter ){
			$this->db->where($where_filter);
		}
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Students_model.php */
/* Location: ./application/models/Students_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbutil_model extends CI_Model {

	public function delete_in($table, $field, $ids = array() )
	{
		if($ids){
			$this->db->where_in($field, $ids)->delete($table);
		}
	}

	public function delete_single( $table, $where_clause )
	{
		$this->db->where($where_clause)->delete($table)
;	}

}

/* End of file Dbutil_model.php */
/* Location: ./application/models/Dbutil_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utilities_db_model extends CI_Model {

	public function generic_insert( $table, $data )
	{
		$string = $this->db->insert_string($table, $data);
		$query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $string);
		$this->db->query($query);
		return $this->db->insert_id();
	}

	public function generic_update( $table, $data, $where_clause )
	{
		$this->db->where( $where_clause )->update( $table, $data );
	}

}

/* End of file Utilities_db_model.php */
/* Location: ./application/models/Utilities_db_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promos_model extends CI_Model {

	public function get_all()
	{
		$query = $this->db->get("promo_types");
		return $query->result();
	}

}

/* End of file Promos_model.php */
/* Location: ./application/models/Promos_model.php */
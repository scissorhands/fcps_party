<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_orders_model extends CI_Model {

	public function get( $id )
	{
		$query = $this->db->where("id", $id)->get("promo_orders");
		return $query->result()? $query->row() : null;
	}
}

/* End of file Promo_orders_model.php */
/* Location: ./application/models/Promo_orders_model.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_orders_model extends CI_Model {

	public function get( $id )
	{
		$query = $this->db
		->select(
			"PO.id AS id, ".
			"CONCAT(S.name, ' ', last_name) AS full_name, CONCAT(PT.name, ' ($', PT.price, ')') AS promo_name, PO.invited_num, ".
			"IFNULL(PG.gap_price, 0) as gap_price, ".
			"IF( STRCMP(PT.name, 'Paquete A'), IFNULL(490 + PG.gap_price, 490), IF( PO.invited_num > 2, 490, PT.price) ) AS student_price, ".
			"IF( PO.invited_num < 10, PT.price*9 + (PO.invited_num - 10)*935 , PT.price*(PO.invited_num-1) ) AS total_invited_price, ".
			"IFNULL(OP.total_paid, 0) AS total_paid"
			)
		->from("students AS S")
		->join("promo_orders AS PO", "S.id=PO.student_id", "LEFT")
		->join("promo_types AS PT", "PO.promo_id=PT.id", "LEFT")
		->join("promo_gaps AS PG", "PT.id=PG.promo_id AND PO.invited_num=PG.invited_num", "LEFT")
		->join("(SELECT 
				promo_order_id, SUM(amount) as total_paid
				FROM order_payments
				GROUP BY promo_order_id
			) as OP", "PO.id = OP.promo_order_id", "LEFT")
		->where("PO.id", $id)->get("promo_orders");
		return $query->result()? $query->row() : null;
	}
}

/* End of file Promo_orders_model.php */
/* Location: ./application/models/Promo_orders_model.php */
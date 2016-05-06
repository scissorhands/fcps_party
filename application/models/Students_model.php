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
			$where_filter = "S.name LIKE '%{$filter}%' OR last_name LIKE '%{$filter}%' OR email LIKE '%{$filter}%'";
		}
		$this->db->select("S.id as student_id, CONCAT(S.name, ' ', last_name) AS full_name, ".
			"IFNULL(CONCAT(PT.name, ' ($', PT.price, ')'), '--') as promo_name, ".
			"IFNULL(PO.invited_num, '--') AS invited_num, ".
			"IFNULL(PG.gap_price, '--') AS gap_price, ".
			"IF( STRCMP(PT.name, 'Paquete A'), IFNULL(490 + PG.gap_price, 490), IF( PO.invited_num > 2, 490, PT.price) ) AS student_price, ".
			"IF( PO.invited_num < 10, PT.price*9 + (PO.invited_num - 10)*935 , PT.price*(PO.invited_num-1) ) AS total_invited_price, ".
			"NULL AS total_to_pay, ".
			"IFNULL(OP.total_paid, '--') AS total_paid, PO.id AS promo_id", false)
		->from("students AS S")
		->join("promo_orders AS PO", "S.id=PO.student_id", "LEFT")
		->join("promo_types AS PT", "PO.promo_id=PT.id", "LEFT")
		->join("promo_gaps AS PG", "PT.id=PG.promo_id AND PO.invited_num=PG.invited_num", "LEFT")
		->join("(SELECT 
				promo_order_id, SUM(amount) as total_paid
				FROM order_payments
				GROUP BY promo_order_id
			) as OP", "PO.id = OP.promo_order_id", "LEFT");
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
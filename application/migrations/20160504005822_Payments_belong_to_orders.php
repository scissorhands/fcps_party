<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Payments_belong_to_orders extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = array(
		    'student_id' => array(
		        'name' => 'promo_order_id',
		        'type' => 'INT'
		    ),
		);
		$this->dbforge->modify_column('order_payments', $fields);
	}

	public function down() {
		$fields = array(
		    'promo_order_id' => array(
		        'name' => 'student_id',
		        'type' => 'INT'
		    ),
		);
		$this->dbforge->modify_column('order_payments', $fields);
	}

}

/* End of file 20160504005822_Payments_belong_to_orders.php */
/* Location: ./application/migrations/20160504005822_Payments_belong_to_orders.php */
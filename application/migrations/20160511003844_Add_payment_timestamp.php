<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_payment_timestamp extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$fields = array(
		    'payment_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
		);
		$this->dbforge->add_column('order_payments', $fields);
	}

	public function down() {
		$this->dbforge->drop_column('order_payments', 'payment_timestamp');
	}

}

/* End of file 20160511003844_Add_payment_timestamp.php */
/* Location: ./application/migrations/20160511003844_Add_payment_timestamp.php */
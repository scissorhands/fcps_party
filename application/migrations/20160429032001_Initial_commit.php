<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial_commit extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'auto_increment' => true,
					"unsigned" => true
				),
				'name' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				),
				'last_name' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				),
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				),
				'phone_number' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				)
			)
		)->add_key( "id", true)
		->add_key("email");
		$this->dbforge->create_table("students");

		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'auto_increment' => true,
					"unsigned" => true
				),
				'name' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				),
				'price' => array(
					'type' => 'DOUBLE'
				)
			)
		)->add_key( "id", true)
		->add_key("name");
		$this->dbforge->create_table("promo_types");

		$this->db->insert_batch("promo_types",
			array(
				array(
					"name" => "Paquete A",
					"price" => 935
				),
				array(
					"name" => "Paquete B",
					"price" => 995
				),
				array(
					"name" => "Paquete C",
					"price" => 1110
				),
				array(
					"name" => "Paquete D",
					"price" => 1185
				),
			)
		);

		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'auto_increment' => true,
					"unsigned" => true
				),
				'student_id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'unsigned' => true,
					"unique" => true
				),
				'promo_id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'unsigned' => true
				),
				'invited_num' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
				)
			)
		)->add_key( "id", true)
		->add_key("promo_id");
		$this->dbforge->create_table("promo_orders");

		$this->dbforge->add_field(
			array(
				'id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'auto_increment' => true,
					"unsigned" => true
				),
				'student_id' => array(
					'type' => 'INT',
					'constraint' => 9,
					'unsigned' => true
				),
				'ammount' => array(
					'type' => 'DOUBLE'
				)
			)
		)->add_key( "id", true)
		->add_key("student_id");
		$this->dbforge->create_table("order_payments");
	}

	public function down() {
		$this->dbforge->drop("students");
		$this->dbforge->drop("promo_types");
		$this->dbforge->drop("promo_orders");
		$this->dbforge->drop("order_payments");
	}

}

/* End of file 20160429032001_Initial_commit.php */
/* Location: ./application/migrations/20160429032001_Initial_commit.php */
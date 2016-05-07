<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_users extends CI_Migration {

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
					"unsigned" => true,
					'auto_increment' => true
				),
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => 128,
					'unique' => true
				),
				'password' => array(
					'type' => 'VARCHAR',
					'constraint' => 255
				)
			)
		)->add_key( "id", true)->add_key( array("email", "password") );
		$this->dbforge->create_table("users");

		$usrs = array(
			array(
				"email" => "admin@fcps.com",
				"password" => md5("puppo_miau")
			),
			array(
				"email" => "chunk@fcpsgraduados16.com",
				"password" => md5("fcpsCaca")
			)
		);
		$this->db->insert_batch('users', $usrs);
	}

	public function down() {
		$this->dbforge->drop_table('users');
	}

}

/* End of file 20160507002409_Create_users.php */
/* Location: ./application/migrations/20160507002409_Create_users.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_promo_gaps extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->dbforge->add_field(
			array(
				'promo_id' => array(
					'type' => 'INT',
					'constraint' => 9,
					"unsigned" => true
				),
				'invited_num' => array(
					'type' => 'INT',
					'constraint' => 9,
					"unsigned" => true
				),
				'gap_price' => array(
					'type' => 'DOUBLE'
				)
			)
		)->add_key( array("promo_id", "invited_num"), true);
		$this->dbforge->create_table("promo_gaps");

		$promos = $this->db->get("promo_types")->result();
		$promo_ids = array();
		foreach ($promos as $promo) {
			$promo_ids[$promo->name] = $promo->id;
		}

		$gaps = array(
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 4,
				"gap_price" => 540
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 5,
				"gap_price" => 450
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 6,
				"gap_price" => 360
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 7,
				"gap_price" => 270
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 8,
				"gap_price" => 180
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 9,
				"gap_price" => 90
			),
			array(
				"promo_id" => $promo_ids["Paquete B"],
				"invited_num" => 10,
				"gap_price" => 0
			),
			/* END PROMO B */
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 4,
				"gap_price" => 1250
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 5,
				"gap_price" => 1000
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 6,
				"gap_price" => 770
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 7,
				"gap_price" => 570
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 8,
				"gap_price" => 380
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 9,
				"gap_price" => 190
			),
			array(
				"promo_id" => $promo_ids["Paquete C"],
				"invited_num" => 10,
				"gap_price" => 0
			),
			/* END PROMO C */
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 4,
				"gap_price" => 1800
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 5,
				"gap_price" => 1500
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 6,
				"gap_price" => 1200
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 7,
				"gap_price" => 900
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 8,
				"gap_price" => 600
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 9,
				"gap_price" => 300
			),
			array(
				"promo_id" => $promo_ids["Paquete D"],
				"invited_num" => 10,
				"gap_price" => 0
			),
		);
		$this->db->insert_batch("promo_gaps", $gaps);
	}

	public function down() {
		$this->dbforge->drop_table('promo_gaps');
	}

}

/* End of file 20160505171202_Insert_promo_gaps.php */
/* Location: ./application/migrations/20160505171202_Insert_promo_gaps.php */
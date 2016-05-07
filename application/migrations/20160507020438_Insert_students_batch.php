<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Insert_students_batch extends CI_Migration {

	public function __construct()
	{
		$this->load->dbforge();
		$this->load->database();
	}

	public function up() {
		$this->db->truncate('order_payments');
		$this->db->truncate('promo_orders');
		$this->db->truncate('students');
		$students = array(
			array(
				"name" => 'Gerardo',
				"last_name" => 'González'
			),
			array(
				"name" => 'Jessica',
				"last_name" => 'Lara'
			),
			array(
				"name" => 'Olaf',
				"last_name" => 'López'
			),
			array(
				"name" => 'Karla',
				"last_name" => 'Valencia'
			),
			array(
				"name" => 'Emiliano',
				"last_name" => 'Vela'
			),
			array(
				"name" => 'Jessica',
				"last_name" => 'Sierra'
			),
			array(
				"name" => 'Graciela',
				"last_name" => 'Sandoval'
			),
			array(
				"name" => 'Brenda Paola',
				"last_name" => 'Peña'
			),
			array(
				"name" => 'Tania',
				"last_name" => 'Montreal'
			),
			array(
				"name" => 'Rene',
				"last_name" => 'Martínez Molotl'
			),
			array(
				"name" => 'Juan José',
				"last_name" => 'Ortiz'
			),
			array(
				"name" => 'Nayelli',
				"last_name" => 'Pérez'
			),
			array(
				"name" => 'Gerardo Alejandro',
				"last_name" => 'Padilla'
			),
			array(
				"name" => 'Paloma',
				"last_name" => 'Delgado'
			),
			array(
				"name" => 'Estefania',
				"last_name" => 'de Santiago Carranza'
			),
			array(
				"name" => 'Suyapa',
				"last_name" => 'Alvarado'
			),
			array(
				"name" => 'Diana Laura',
				"last_name" => 'Vargas Meléndez'
			),
			array(
				"name" => 'Luz Andrea',
				"last_name" => 'Lozano Ferreira'
			),
			array(
				"name" => 'Andrea',
				"last_name" => 'González Pioquinto'
			),
			array(
				"name" => 'Sayury Sánchez',
				"last_name" => 'SánchezAnell'
			),
			array(
				"name" => 'Maria Fernanda',
				"last_name" => 'Esquivel'
			),
			array(
				"name" => 'Viviana',
				"last_name" => 'Martínez Aguirre'
			),
			array(
				"name" => 'Carolina',
				"last_name" => 'Cortés'
			),
			array(
				"name" => 'Mariana',
				"last_name" => 'Zavala'
			),
			array(
				"name" => 'María del Rosario',
				"last_name" => 'Anaya Fernández'
			),
			array(
				"name" => 'Brenda Paola',
				"last_name" => 'Servellón Vera'
			),
			array(
				"name" => 'Elizabeth',
				"last_name" => 'Márquez'
			),
			array(
				"name" => 'Francisco',
				"last_name" => 'Áviles Castillo'
			),
			array(
				"name" => 'Lizeth',
				"last_name" => 'Torres'
			),
			array(
				"name" => 'Astrid',
				"last_name" => 'Alcantara Zárate'
			),
			array(
				"name" => 'Mariana',
				"last_name" => 'Miguel'
			),
			array(
				"name" => 'Diana',
				"last_name" => 'Romero'
			),
			array(
				"name" => 'Mario Alfredo',
				"last_name" => 'Polo'
			),
			array(
				"name" => 'Isaac',
				"last_name" => 'López Sotelo'
			),
			array(
				"name" => 'María Fernanda',
				"last_name" => 'Espejel'
			),
			array(
				"name" => 'Guadalupe',
				"last_name" => 'Estrada'
			),
			array(
				"name" => 'Sergio',
				"last_name" => 'Basurto'
			),
			array(
				"name" => 'Aline',
				"last_name" => 'Ramírez'
			),
			array(
				"name" => 'Marlen',
				"last_name" => 'Dávalos'
			),
			array(
				"name" => 'Samantha',
				"last_name" => ''

			),
			array(
				"name" => 'La amiga',
				"last_name" => ''
			)
		);
		$this->db->insert_batch("students", $students);
	}

	public function down() {
		$this->db->truncate('order_payments');
		$this->db->truncate('promo_orders');
		$this->db->truncate('students');
	}

}

/* End of file 20160507020438_Insert_students_batch.php */
/* Location: ./application/migrations/20160507020438_Insert_students_batch.php */
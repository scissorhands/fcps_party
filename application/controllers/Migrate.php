<?php

class Migrate extends CI_Controller
{
	private $migrationList;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('migration');
		$this->migrationList = $this->migration->find_migrations();
	}

	public function index()
	{
		if ($this->migration->latest() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function run_latest()
	{
		if ($this->migration->latest() === FALSE)
		{
			show_error($this->migration->error_string());
		} else {
			$list = $this->migrationList;
			$latest = end( (array_keys( $list )) );
			$data = array(
				"version" => date("Y-m-d H:i:s", strtotime($latest)),
				"file" => $list[$latest]
			);
			exit( json_encode( $data ) );
		}
	}

	public function get_all_versions()
	{
		echo json_encode( $this->migrationList );
	}

	public function run_by_version( $version = null )
	{
		if( !$version ){ exit("version needed"); }
		if( !is_numeric($version) ){ exit("version must be a number"); }
		if ($this->migration->version($version) === FALSE)
		{
			show_error($this->migration->error_string());
		} else {
			$list = $this->migrationList;
			$data = array(
				"version" => date("Y-m-d H:i:s", strtotime($version)),
				"file" => $list[$version]
			);
			exit( json_encode( $data ) );
		}
	}

	public function get_next_version( $migration_name = "migration_name" )
	{
		$now = date("YmdHis");
		$name = ucfirst($migration_name);
		echo json_encode( array( "new_migration" => $now."_".$name.".php") );
	}

}
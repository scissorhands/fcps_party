<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dump( $var, $text = false )
{
	if( $text ){
		echo "<pre>";
			print_r($var);
		echo "</pre>";
		exit();
	} else{
		exit( json_encode( $var ) );
	}
}

function parse_obj_array_to_ids_array($obj_array, $id_name = "id")
{
    $arr = array();
    foreach ($obj_array as $row) {
        $arr[] = $row->$id_name;
    }
    return $arr;
}

function parse_to_key_vals($obj_array, $key, $val)
{
    $arr = array();
    foreach ($obj_array as $row) {
        $arr[$row->$key] = $row->$val;
    }
    return $arr;
}
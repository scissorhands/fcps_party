<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function dump( $var )
{
	exit( json_encode( $var ) );
}
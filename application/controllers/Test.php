<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		echo "hi";
	}

	public function solution(&$A, $K) {
		echo "case:<pre>";
		print_r($A);
		echo "</pre>";
	    $n = sizeof($A);
	    //exit( "$n" );
	    $best = 0;
	    $count = 0;
	    for ($i = 0; $i < $n - $K; $i++) {
	        if ($A[$i] == $A[$i + 1]){
	            $count = $count + 1;
	        	echo $A[$i]." == ".$A[$i + 1]."<br>";
	        	echo "cont = $count<br>";
	        }
	        else{
	        	echo $A[$i]." != ".$A[$i + 1]."<br>";
	        	echo "count = 0<br>";
	            $count = 1;
	        }
	        echo "best = $best <br>";
	        $best = max($best, $count);
	        echo "best = $best <br><br>";
	    }
	    $result = $best + $K;
	    echo "result = $result<br><br><br>";

	    return $result;
	}

	public function exec( $cases )
	{
		$res = array();
		foreach ($cases as $case) {
			$res[] = $this->solution( $case[0], $case[1] );
		}
		dump( $res );
	}

	public function exam()
	{
		$cases = array(
			/*
			*/
			array(
				array(1, 1, 3, 3, 3, 4, 5, 5, 5, 5),
				2
			),
			array(
				array(1,1),
				2
			),
			array(
				array(0,0),
				2
			),
			array(
				array(0,1,1),
				2
			),
			array(
				array(0,0,1,2),
				2
			),
			array(
				array(0,0,1,1,1),
				2
			),
			array(
				array(1,2,3,4,5,6,7,8,9), 5
			),
			array(
				array(1,2,3,3,4,5,5,5,6,7,8,9,9), 5
			)
		);

		$this->exec( $cases );
	}

	public function fibonacci( $N )
	{
		if($N < 2){
			return $N;
		} else {
			return $this->fibo( 0, 1, 0, $N );
		}
	}

	public function fibo( $curr, $next, $current_iteration, $iteration_limit)
	{
		if($current_iteration == $iteration_limit){
			return $curr;
		} else{
			return $this->fibo( $next, $curr+$next, $current_iteration+1, $iteration_limit );
		}
	}

	public function task( $n = 8 )
	{
		$fibo = $this->fibonacci( $n );
		$len = strlen("$fibo");
		if($len<6){
			echo $fibo;
		} else {
			$txt = substr("$fibo", $len-6);
			echo "$fibo <br>";
			echo "$txt";
		}
	}






















}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
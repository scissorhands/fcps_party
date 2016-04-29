<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data = array(
			"title" => "Home page",
			"active" => "home",
			"content" => "home/main"
		);
		$this->load->view('template/loader', $data);
	}

	public function about()
	{
		$data = array(
			"title" => "About page",
			"active" => "about",
			"content" => "home/about"
		);
		$this->load->view('template/loader', $data);
	}

	public function send_mail()
	{
		/*
		$this->load->library("email");
		$this->email->from('ep@da.sh', 'El pinche Lalo');
		$this->email->to('ojsg140789@gmail.com');

		$this->email->subject('Ori puto');
		$this->email->message('Testing the email class.');	

		$this->email->send();

		echo $this->email->print_debugger();
		*/
		$headers = "From: ep@da.sh";
		$response = mail("furbyoner@hotmail.com","ori puto","mensajon loco wkhfwshksfhjkshfkhsfkjhsdfjkhf", $headers);
		exit( json_encode( $response ) );
	}

	public function test()
	{
		$cases = array(
			/*
			*/
			array(2,2,2,2,2,3,4,4,4,6,),
			array(1,1,1,1,50),
			array(0,1,1),
			array(0,0,1,1,1)
		);
		$results = array();
		foreach ($cases as $case) {
			$r = (Object)array(
				"case" => implode(",", $case),
				"result" => $this->solution($case)
			);
			$results[] = $r;
		}
		exit( json_encode( $results ) );
	}
	
	private function solution(&$A) {
	    $n = sizeof($A);
	    $L = array_pad(array(), $n + 1, -1);
	    for ($i = 0; $i < $n; $i++) {
	        $L[$i + 1] = $A[$i];
	    }
	    $count = 0;
	    $pos = (int) (($n + 1) / 2);
	    $candidate = $L[$pos];
	    for ($i = 0; $i <= $n; $i++) {
	    	//echo "elem > $L[$i] ";
	        if ($L[$i] == $candidate){
	        	//echo "candidate! \n";
	            $count = $count + 1;
	        }
	    }
	    if ($count > ($n/2))
	        return $candidate;
	    return (-1);
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
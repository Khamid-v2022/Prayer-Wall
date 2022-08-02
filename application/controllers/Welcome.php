<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

	public function index()
	{
		$data['prayer_list'] = $this->pray_m->get_show_list();
		$data['today_count'] = $this->pray_m->get_today_pray_count();


		$this->load->view('header');
		$this->load->view('welcome', $data);
		$this->load->view('footer');
	}

	public function verify_email(){
		$req = $this->input->post();

		$email = $req['email'];
		$api = DEBOUNCE_KEY;
		$json = json_decode($this->debounce_api_call($email, $api), true);
		$success = $json['success'];
		$result = $json['debounce'];
		if($success != '0'){
			if($result['code'] == "5"){			// result: "Safe to Send"
				echo "Valid";
			} else {
				echo 'email '.$result['email'].' is '.$result['result'].' because it is '.$result['reason'].'. Result code is: '.$result['code'].'.';
			}
			
		}else{
			echo 'Error: '.$result['error'];
		}
	}

	function debounce_api_call($email, $api) {
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, 'https://api.debounce.io/v1/?api='.$api.'&email='.strtolower($email));
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

	    $data = curl_exec($ch);
	    curl_close($ch);

	    return $data;
	}

	public function submit_pray(){
		$request = $this->input->post();
		
		// email verification
		$request['email'] = strtolower($request['email']);
		$request['created_at'] = date('Y-m-d H:i:s');
		$this->pray_m->add_pray_note($request);

		echo 'ok';
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/SMTP.php';
require __DIR__ . '/../../vendor/phpmailer/phpmailer/src/Exception.php';

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_m');
    }

	public function index()
	{
		$this->load->view('login');

	}

	public function login(){
		$req = $this->input->post();
	    $where['admin_id'] = strtolower($req['admin_id']);
		$where['password'] = sha1($req['password']);
		
		$user = $this->auth_m->get_item($where);
		if(empty($user)){
			echo 'no';
			return;
		}

		$user['is_loggedin'] = true;
		$this->session->set_userdata('admin_data', $user);
		echo 'yes';
	}

	public function logout(){
		$this->session->sess_destroy();
        redirect('pray/login');
	}
	
	public function reset_password(){
		$req = $this->input->post();

		$where['admin_id'] = strtolower($req['admin_id']);
		
		$user = $this->auth_m->get_item($where);
		if(empty($user)){
			echo 'no';
			return;
		}

		// send Email
		$new_password = $this->randomPassword();
		$result = $this->send_email($user['admin_id'], $new_password);

		if($result){
			// reset password
			$update_info['password'] = sha1($new_password);

			$this->auth_m->update_info($update_info, $where);
			echo 'yes';
		}else{
			echo 'failed';	
		}

	}

	private function randomPassword() {
	    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array();
	    $alphaLength = strlen($alphabet) - 1;
	    for ($i = 0; $i < 8; $i++) {
	        $n = rand(0, $alphaLength);
	        $pass[] = $alphabet[$n];
	    }
	    return implode($pass);
	}

	private function send_email($email, $password){
		// return true;
		$mail = new PHPMailer;

		try {
		    //Server settings
		    $mail->isSMTP();
		   
		   	// $mail->SMTPDebug = 4;
		    
		    $mail->Host       = MAIL_HOST;  
		    $mail->SMTPAuth   = true;       
		    $mail->Username   = MAIL_USER;    
		    $mail->Password   = MAIL_PASS; 
		    $mail->CharSet 	  = 'utf-8';
		    $mail->SMTPSecure = 'tls';
		    $mail->Port       = MAIL_PORT; 
		    $mail->setFrom(MAIL_TO_MAIL, MAIL_TO_NAME);
 
		    $mail->addAddress($email); 
		    
		    $mail->isHTML(true);                                  
		    $mail->Subject = "Please reset password!";
		    $mail->Body    = "<p>Please log in with this password: <b>" . $password . "</b></p>";
		    $mail->send();
		    return true;
		} catch (Exception $e) {
			// return $mail->ErrorInfo;
			return false;
		}
	}
}

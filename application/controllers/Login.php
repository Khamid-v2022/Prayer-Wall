<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
		$where['admin_id'] = $req['admin_id'];
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
        redirect('login');
	}
}

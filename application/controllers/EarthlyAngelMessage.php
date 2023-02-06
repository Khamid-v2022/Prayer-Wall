<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EarthlyAngelMessage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EarthlyAngelMessage_m');
    }

    public function index()
    {
        $data['title'] = "Earthly Angel Message";
        $this->load->view('header_for_tc', $data);
        $this->load->view('earthly-angel-message');
        $this->load->view('footer');
    }

    public function my_message($category_id){
    	$data['title'] = "Earthly Angel Message";
    	$data['message'] = $this->EarthlyAngelMessage_m->get_message(array('category_id' => $category_id));
        $this->load->view('header_for_tc', $data);
        $this->load->view('earthly-angel-my-message', $data);
        $this->load->view('footer');
    }
    
}
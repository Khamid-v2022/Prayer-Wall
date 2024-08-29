<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChakraStone extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $data['title'] = "Chakra Stones Reading";
        $this->load->view('header_for_tc', $data);
        $this->load->view('chakra-stone');
        $this->load->view('footer');
    }
}
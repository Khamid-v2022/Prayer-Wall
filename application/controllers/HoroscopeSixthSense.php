<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HoroscopeSixthSense extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = "Horoscope Sixth Sense";
        $this->load->view('header_for_tc', $data);
        $this->load->view('horoscope-sixth-sense', $data);
        $this->load->view('footer');
    }
}

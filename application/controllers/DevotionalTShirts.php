<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DevotionalTShirts extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('amazondesigns_m');
    }

    public function index()
    {
        $us_designs = $this->amazondesigns_m->get_US_designs();
        $uk_designs = $this->amazondesigns_m->get_UK_designs();
        $random_designs = $this->amazondesigns_m->get_randon_designs();

        $data['title'] = "Devotional T-Shirts for Sale";
        $data['us_designs'] = $us_designs;
        $data['uk_designs'] = $uk_designs;
        $data['random_designs'] = $random_designs;
        $this->load->view('header_for_tc', $data);
        $this->load->view('amzon-designs', $data);
        $this->load->view('footer');
    }
}
<?php

class MY_Controller extends CI_Controller {
    
    public $data;

    public function __construct() {
        parent::__construct();
        // date_default_timezone_set('America/Los_Angeles');
        if(!isset($this->session->admin_data) || !$this->session->admin_data['is_loggedin']){
            redirect('login');
            return;
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oraclecard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('oracle_card');
		$this->load->view('footer');
	}

    public function random_article(){
        $posts = $this->pray_m->get_wp_posts();
        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
        // $url = "https://angelgraceblessing.com/?p=1537";
        // $url_components = parse_url($url);
        // $url = $url_components['scheme'] . "://" . $url_components['host'] . "/my-child-i-wont-leave-you-alone/";
    
        redirect($url);
    }
	
}

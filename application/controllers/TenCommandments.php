<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TenCommandments extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $data['title'] = "10 Commandments";
        $this->load->view('header_for_tc', $data);
        $this->load->view('ten_commandments');
        $this->load->view('footer');
    }

    // public function random_article(){
    //     $posts = $this->pray_m->get_wp_posts_lord_message();
    //     $count = count($posts);
    //     $index = rand(0, $count - 1);
    //     $post = $posts[$index];

    //     $url_components = parse_url($post['guid']);
    //     $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
    //     redirect($url);
    // }
    
}

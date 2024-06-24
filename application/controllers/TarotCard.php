<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TarotCard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $data['title'] = "Tarot Card";
        $this->load->view('header_for_tc', $data);
        $this->load->view('tarot_card');
        $this->load->view('footer');
    }

    public function random_article(){
        $posts = $this->pray_m->get_wp_posts_from_category('Tarot Cards');
        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }
    
}

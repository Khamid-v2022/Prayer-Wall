<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChakraPrayers extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $data['title'] = "Chakra Prayers";
        $this->load->view('header_for_tc', $data);
        $this->load->view('chakra-prayers');
        $this->load->view('footer');
    }

    public function random_article($category_name){

        $category_name = str_replace( "-2-", " ", $category_name);
   
        $posts = $this->pray_m->get_wp_posts_from_category(urldecode($category_name));
        $count = count($posts);
        if($count == 0){
            $this->index();
            return;
        }
        
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }
    
}

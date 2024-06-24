<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MotherMaryMessage extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $posts = $this->pray_m->get_wp_posts_with_image_from_category("Mother Mary Voice");
        $show_posts = [];
        // pick random 3 posts
        if(count($posts) <= 3){
            $show_posts = $posts;
        }
        else {
            $rand_keys = array_rand($posts, 3);
            array_push($show_posts, $posts[$rand_keys[0]]);
            array_push($show_posts, $posts[$rand_keys[1]]);
            array_push($show_posts, $posts[$rand_keys[2]]);
        }

        $result_posts = [];
        foreach($show_posts as $post){
            $url_components = parse_url($post['guid']);
            $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];

            $item = array('url' => $url, 'image_path' => $post['image_path'], 'title' => $post['post_title']);
            array_push($result_posts, $item);
        }

        $data['random_posts'] = $result_posts;
        $data['title'] = "Mother Mary Message of The Day";
        $this->load->view('header_for_tc', $data);
        $this->load->view('mother_mary_message', $data);
        $this->load->view('footer');
    }
    
    public function random_article_angel_message(){
        $posts = $this->pray_m->get_wp_posts_from_category("Mother Mary Voice");

        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }

    public function messageangels()
    {
        $data['title'] = "Mother Mary Message of The Day";
        $this->load->view('header_for_tc', $data);
        $this->load->view('mother-mary-message-angels');
        $this->load->view('footer');
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AngelNumber2 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
    }

    public function index()
    {
        $list = $this->getAllPosts();
       
        $data['list'] = $list;

        $this->load->view('angelnumber2', $data);
        $this->load->view('footer');
    }

    public function random_article(){
        $posts = $this->pray_m->get_wp_posts_angel_number_category();


        $count = count($posts);
        $index = rand(0, $count - 1);
        $post = $posts[$index];

        $url_components = parse_url($post['guid']);
        $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];
    
        redirect($url);
    }
    
    public function getAllPosts(){
        $list = [
            [], [], [], [], [], [], [], [], [], []
        ];
        
        $posts = $this->pray_m->get_wp_posts_angel_number_category();
        
        foreach($posts as $post){
            $url_components = parse_url($post['guid']);
            $url = $url_components['scheme'] . "://" . $url_components['host'] . $post['permalink'];

            $link_arr = explode('-', $post['permalink']);
            $number = $link_arr[count($link_arr) - 1];
            $number = explode('/', $number)[0];
            
            $first_number = $number[0];

            $item = array(
                'link'=> $url,
                'number'=> $number
            );
            array_push($list[$first_number], $item);
        }

         // sort 
        for($i = 0; $i < 10; $i++){
            if(count($list[$i]) > 1){
                for($j = 0; $j < count($list[$i]); $j++){
                    for($k = $j + 1; $k < count($list[$i]); $k++){
                        if($list[$i][$j]['number'] > $list[$i][$k]['number']){
                            $temp = $list[$i][$j];
                            $list[$i][$j] = $list[$i][$k];
                            $list[$i][$k] = $temp;
                        }
                    }
                }
            }
        }
        
        return $list;
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use League\Oauth2\Client\Provider\GenericProvider;
use GuzzleHttp\Client;


const OAUTH_URL = 'https://auth.aweber.com/oauth2/';
const TOKEN_URL = 'https://auth.aweber.com/oauth2/token';

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pray_m');
        $this->load->model('subscriber_m');
    }

    public function index()
    {
        $data['prayer_list'] = $this->pray_m->get_show_list();
        $data['today_count'] = $this->pray_m->get_today_pray_count();


        $this->load->view('header');
        $this->load->view('welcome', $data);
        $this->load->view('footer');
    }
    
    public function get_subscribers(){
        $where['is_send'] = 'no';
        $list = $this->subscriber_m->get_list($where);
        echo json_encode($list);
    }

    public function verify_email(){
        $req = $this->input->post();

        $email = $req['email'];
        $api = DEBOUNCE_KEY;
        $json = json_decode($this->debounce_api_call($email, $api), true);
        $success = $json['success'];
        $result = $json['debounce'];
        if($success != '0'){
            if($result['code'] == "5"){         // result: "Safe to Send"
                echo "Valid";
            } else {
                echo 'email '.$result['email'].' is '.$result['result'].' because it is '.$result['reason'].'. Result code is: '.$result['code'].'.';
            }
            
        }else{
            echo 'Error: '.$result['error'];
        }
    }

    function debounce_api_call($email, $api) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, 'https://api.debounce.io/v1/?api='.$api.'&email='.strtolower($email));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function submit_pray(){
        $request = $this->input->post();
        
        
        //      check duplicate note
        $where_du['email'] = strtolower($request['email']);
        $where_du['note'] = $request['note'];
        $is_exist = $this->pray_m->get_item($where_du);
        
        if(empty($is_exist)){
            // email verification
            $request['email'] = strtolower($request['email']);
            
            $request['created_at'] = date('Y-m-d H:i:s');
            $this->pray_m->add_pray_note($request);
        }
        
        
        //      subscriber check
        $where['email'] = $request['email'];
        $info['name'] = $request['first_name'];
        $info['email'] = $request['email'];
        $info['tag'] = $request['tag'];

        $subscriber = $this->subscriber_m->get_item($where);
        if(empty($subscriber)){
            // add subscriber            
            $this->subscriber_m->add_item($info);
        }

        echo 'ok';

        // add subscriber
        $this->sendConvetkit($info);
        $this->sendAWeber($info);
    }
    
    public function sendAWeber($info){
       // refresh token update
        $this->getRefreshToken();
        
        // get Credentials
        $credentials = parse_ini_file('credentials.ini');
        $accessToken = $credentials['accessToken'];

        $list_name = AWEBER_PRAY_LIST_NAME;
        
        if($info['tag'])
            $tag_name = array(AWEBER_TAG_NAME, $info['tag']);
        else
            $tag_name = array(AWEBER_TAG_NAME);
        
        $client = new GuzzleHttp\Client();
        $BASE_URL = 'https://api.aweber.com/1.0/';
        
        // get all the accounts entries
        $accounts = $this->getCollection($client, $accessToken, $BASE_URL . 'accounts');
        $accountUrl = $accounts[0]['self_link'];
        
        // get all the list entries for the first account
        $listsUrl = $accounts[0]['lists_collection_link'];
        $lists = $this->getCollection($client, $accessToken, $listsUrl);
        
        
        // $foundLists = $lists->find(array('name' => $list_name));
        $my_list = [];
        
        foreach($lists as $item){
            if($item['name'] == $list_name){
                $my_list = $item;
            }
        }
        
        $subsUrl = $my_list['subscribers_collection_link'];
        
        $data = array(
            'email' => $info['email'],
            'name' => $info['name'],
            'tags' => $tag_name
        );
         
        try { 
            $body = $client->post($subsUrl, [
                'json' => $data, 
                'headers' => ['Authorization' => 'Bearer ' . $accessToken]
            ]);
        
            // get the subscriber entry using the Location header from the post request
            $subscriberUrl = $body->getHeader('Location')[0];
            $subscriberResponse = $client->get($subscriberUrl,
                ['headers' => ['Authorization' => 'Bearer ' . $accessToken]])->getBody();
            $subscriber = json_decode($subscriberResponse, true);
        }
        catch (Exception $e) {
            var_dump($e->getMessage());
        }

        
    }
    
    
    private function getCollection($client, $accessToken, $url) {
        $collection = array();
        while (isset($url)) {
            $request = $client->get($url,
                ['headers' => ['Authorization' => 'Bearer ' . $accessToken]]
            );
            $body = $request->getBody();
            $page = json_decode($body, true);
            $collection = array_merge($page['entries'], $collection);
            $url = isset($page['next_collection_link']) ? $page['next_collection_link'] : null;
        }
        return $collection;
    }
    

    private function getRefreshToken(){
        $credentials = parse_ini_file('credentials.ini', true);
        if(sizeof($credentials) == 0 ||
           !array_key_exists('clientId', $credentials) ||
           !array_key_exists('clientSecret', $credentials) ||
           !array_key_exists('accessToken', $credentials) ||
           !array_key_exists('refreshToken', $credentials)) {
            echo "No credentials.ini exists, or file is improperly formatted.\n";
            echo "Please create new credentials.";
            exit();
        }
        $client = new GuzzleHttp\Client();
        $clientId = $credentials['clientId'];
        $clientSecret = $credentials['clientSecret'];
        $response = $client->post(
            TOKEN_URL, [
                'auth' => [
                    $clientId, $clientSecret
                ],
                'json' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $credentials['refreshToken']
                ]
            ]
        );
        $body = $response->getBody();
        $newCreds = json_decode($body, true);
        $accessToken = $newCreds['access_token'];
        $refreshToken = $newCreds['refresh_token'];
        
        $fp = fopen('credentials.ini', 'wt');
        fwrite($fp,
        "clientId = {$clientId}
        clientSecret = {$clientSecret}
        accessToken = {$accessToken}
        refreshToken = {$refreshToken}");
        fclose($fp);
        chmod('credentials.ini', 0600);
    }
    
    
    public function sendConvetkit($info){
        
        $api = new \ConvertKit_API\ConvertKit_API(CONVERTKIT_API_KEY, CONVERTKIT_API_SECRET);

        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = CONVERTKIT_CTAG_ID;
            else if($info['tag'] == "vtag")
                $tag_name = CONVERTKIT_VTAG_ID;
            else if($info['tag'] == "ltag")
                $tag_name = CONVERTKIT_LTAG_ID;
            else 
                $tag_name = CONVERTKIT_TAG_ID;
        }
        else
            $tag_name = CONVERTKIT_TAG_ID;
        
        echo $tag_name;
        
        $options = [
                    'email'      => $info['email'],
                    'name'      => $info['name'],
                    'tags'       => $tag_name
                ];
        
        $subscribed = $api->form_subscribe(CONVERTKIT_FORM_ID, $options);
        
        return true;
        
    }
    
    
     public function submit_pray_test(){
        $request = $this->input->post();
        
        // email verification
        $request['email'] = strtolower($request['email']);
        $request['created_at'] = date('Y-m-d H:i:s');
        
        $info['name'] = $request['first_name'];
        $info['email'] = $request['email'];

        // add subscriber
        // $this->sendConvetkit($info);
        var_dump($info);
        $this->getTagList($request['tid']);
        $this->sendAWeber($info);
    }

    public function getTagList($tag){
        $this->getRefreshToken();
        
        // get Credentials
        $credentials = parse_ini_file('credentials.ini');
        $accessToken = $credentials['accessToken'];

        $list_name = AWEBER_PRAY_LIST_NAME;
        $tag_name = array(AWEBER_TAG_NAME);
        
        $client = new GuzzleHttp\Client();
        $BASE_URL = 'https://api.aweber.com/1.0/';
        
        // get all the accounts entries
        $accounts = $this->getCollection($client, $accessToken, $BASE_URL . 'accounts');
        
        // get all the list entries for the first account
        $listsUrl = $accounts[0]['lists_collection_link'];
        $params = array(
            'ws.op' => 'find',
            'name' => $list_name
        );
        $findListUrl = $listsUrl . '?' . http_build_query($params);
        $lists = $this->getCollection($client, $accessToken, $findListUrl);

        if (isset($lists[0]['self_link'])) {
            $tagUrl = $lists[0]['self_link'] . '/tags';  // choose the first list
            $request = $client->get($tagUrl, 
                    ['headers' => ['Authorization' => 'Bearer ' . $accessToken]]
            );
            $tags = $request->getBody();
            $tags_arr = json_decode($tags, true);
           
        } else {
            echo 'Could not find a list with name: ' . $list_name;
        }
        
    }
}

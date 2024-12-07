<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use League\Oauth2\Client\Provider\GenericProvider;
use GuzzleHttp\Client;


const OAUTH_URL = 'https://auth.aweber.com/oauth2/';
const TOKEN_URL = 'https://auth.aweber.com/oauth2/token';

class MmPrayer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mmPray_m');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('mm_prayer');
        $this->load->view('footer');
    }

    public function mm_prayer2()
    {
        $this->load->view('header');
        $this->load->view('mm_prayer2');
        $this->load->view('footer');
    }
    
    public function submit_pray(){
        $request = $this->input->post();

        // subscriber check
        $where['email'] = $request['email'];
        $where['name'] = $request['first_name'];

        $info['name'] = $request['first_name'];
        $info['email'] = $request['email'];
        $info['tag'] = $request['tag'];
        $info['ip_address'] = $request['ip_address'];

        $subscriber = $this->mmPray_m->get_item($where);
        if(empty($subscriber)){
            // add subscriber            
            $this->mmPray_m->add_item($info);
        }

        echo 'ok';

        // add subscriber
        $this->sendConvetkit($info);
        // $this->sendAWeber($info);
        $this->sendMailerlite($info);
    }

    public function verify_email(){
        $req = $this->input->post();

        $email = $req['email'];
        $api = DEBOUNCE_MM_KEY;
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
    
    // public function sendAWeber($info){
    //    // refresh token update
    //     $this->getRefreshToken();
        
    //     // get Credentials
    //     $credentials = parse_ini_file('credentials.ini');
    //     $accessToken = $credentials['accessToken'];

    //     $list_name = AWEBER_MM_LIST_NAME;
        
    //     if($info['tag'])
    //         $tag_name = array(AWEBER_MMPRAYER_TAG_NAME, $info['tag']);
    //     else
    //         $tag_name = array(AWEBER_MMPRAYER_TAG_NAME);
        
    //     $client = new GuzzleHttp\Client();
    //     $BASE_URL = 'https://api.aweber.com/1.0/';
        
    //     // get all the accounts entries
    //     $accounts = $this->getCollection($client, $accessToken, $BASE_URL . 'accounts');
    //     $accountUrl = $accounts[0]['self_link'];
        
    //     // get all the list entries for the first account
    //     $listsUrl = $accounts[0]['lists_collection_link'];
    //     $lists = $this->getCollection($client, $accessToken, $listsUrl);
        
    //     $my_list = [];
    //     foreach($lists as $item){
    //         if($item['name'] == $list_name){
    //             $my_list = $item;
    //         }
    //     }
        
    //     $subsUrl = $my_list['subscribers_collection_link'];
        
    //     $data = array(
    //         'email' => $info['email'],
    //         'name' => $info['name'],
    //         'tags' => $tag_name
    //     );
         
    //     try { 
    //         $body = $client->post($subsUrl, [
    //             'json' => $data, 
    //             'headers' => ['Authorization' => 'Bearer ' . $accessToken]
    //         ]);
        
    //         // get the subscriber entry using the Location header from the post request
    //         $subscriberUrl = $body->getHeader('Location')[0];
    //         $subscriberResponse = $client->get($subscriberUrl,
    //             ['headers' => ['Authorization' => 'Bearer ' . $accessToken]])->getBody();
    //         $subscriber = json_decode($subscriberResponse, true);
    //     }
    //     catch (Exception $e) {
    //         var_dump($e->getMessage());
    //     }        
    // }
    
    
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
        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID, CONVERTKIT_MM_CTAG_ID);
            else if($info['tag'] == "vtag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID, CONVERTKIT_MM_VTAG_ID);
            else if($info['tag'] == "ltag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID, CONVERTKIT_MM_LTAG_ID);
            else 
                $tag_name = CONVERTKIT_MM_TAG_ID;
        }
        else
            $tag_name = CONVERTKIT_MM_TAG_ID;

        $api = new \ConvertKit_API\ConvertKit_API(CONVERTKIT_API_KEY, CONVERTKIT_API_SECRET);
        $options = [
                    'email'      => $info['email'],
                    'name'       => $info['name'],
                    'tags'       => $tag_name
                ];
        
        $subscribed = $api->form_subscribe(CONVERTKIT_MM_FORM_ID, $options);
        
        return true;    
    }


    public function sendMailerlite($info){
        $tag_name = array(MAILERLITE_ALL);
        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = array(MAILERLITE_ALL, MAILERLITE_CTAG_ID);
            else if($info['tag'] == "vtag")
                $tag_name = array(MAILERLITE_ALL, MAILERLITE_VTAG_ID);
            else if($info['tag'] == "ltag")
                $tag_name = array(MAILERLITE_ALL, MAILERLITE_LTAG_ID);
            else 
                $tag_name = array(MAILERLITE_ALL);
        }

        $data = array (
            'email' => $info['email'],
            'fields' => array (
                            "name"=> $info['name']
                        ),
            'groups' => $tag_name
        );

        $jsonData = json_encode($data);

        // API endpoint URL
        $url = 'https://connect.mailerlite.com/api/subscribers';

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options for the POST request
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        // Set the appropriate headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . MAILERLITE_KEY,
            'Content-Type: application/json', 
            'Content-Length: ' . strlen($jsonData) 
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        curl_close($ch);
    }
    

    public function submit_pray2() {
        $request = $this->input->post();

        // subscriber check
        $where['email'] = $request['email'];
        $where['name'] = $request['first_name'];

        $info['name'] = $request['first_name'];
        $info['email'] = $request['email'];
        $info['tag'] = $request['tag'];
        $info['ip_address'] = $request['ip_address'];

        $subscriber = $this->mmPray_m->get_item_from2($where);
        if(empty($subscriber)){
            // add subscriber            
            $this->mmPray_m->add_item_to2($info);
        }

        // add subscriber
        $this->sendConvetkit2($info);
        // $this->sendAWeber2($info);
        // $this->sendMailerlite2($info);
        $this->sendSenderAPI($info);

        echo 'ok';
    }

    public function sendConvetkit2($info){      
        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID2, CONVERTKIT_MM_CTAG_ID2);
            else if($info['tag'] == "vtag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID2, CONVERTKIT_MM_VTAG_ID2);
            else if($info['tag'] == "ltag")
                $tag_name = array(CONVERTKIT_MM_TAG_ID2, CONVERTKIT_MM_LTAG_ID2);
            else 
                $tag_name = CONVERTKIT_MM_TAG_ID2;
        }
        else
            $tag_name = CONVERTKIT_MM_TAG_ID2;

        $api = new \ConvertKit_API\ConvertKit_API(CONVERTKIT_API_KEY, CONVERTKIT_API_SECRET);
        $options = [
                    'email'      => $info['email'],
                    'name'       => $info['name'],
                    'tags'       => $tag_name
                ];
        
        $subscribed = $api->form_subscribe(CONVERTKIT_MM_FORM_ID, $options);
        
        return true;    
    }

    // public function sendAWeber2($info){
    //    // refresh token update
    //     $this->getRefreshToken();
        
    //     // get Credentials
    //     $credentials = parse_ini_file('credentials.ini');
    //     $accessToken = $credentials['accessToken'];

    //     $list_name = AWEBER_MM_LIST_NAME2;
        
    //     if($info['tag'])
    //         $tag_name = array(AWEBER_MMPRAYER_TAG_NAME2, "mm2_" . $info['tag']);
    //     else
    //         $tag_name = array(AWEBER_MMPRAYER_TAG_NAME2);
        
    //     $client = new GuzzleHttp\Client();
    //     $BASE_URL = 'https://api.aweber.com/1.0/';
        
    //     // get all the accounts entries
    //     $accounts = $this->getCollection($client, $accessToken, $BASE_URL . 'accounts');
    //     $accountUrl = $accounts[0]['self_link'];
        
    //     // get all the list entries for the first account
    //     $listsUrl = $accounts[0]['lists_collection_link'];
    //     $lists = $this->getCollection($client, $accessToken, $listsUrl);
        
    //     $my_list = [];
    //     foreach($lists as $item){
    //         if($item['name'] == $list_name){
    //             $my_list = $item;
    //         }
    //     }
        
    //     $subsUrl = $my_list['subscribers_collection_link'];
        
    //     $data = array(
    //         'email' => $info['email'],
    //         'name' => $info['name'],
    //         'tags' => $tag_name
    //     );
         
    //     try { 
    //         $body = $client->post($subsUrl, [
    //             'json' => $data, 
    //             'headers' => ['Authorization' => 'Bearer ' . $accessToken]
    //         ]);
        
    //         // get the subscriber entry using the Location header from the post request
    //         $subscriberUrl = $body->getHeader('Location')[0];
    //         $subscriberResponse = $client->get($subscriberUrl,
    //             ['headers' => ['Authorization' => 'Bearer ' . $accessToken]])->getBody();
    //         $subscriber = json_decode($subscriberResponse, true);
    //     }
    //     catch (Exception $e) {
    //         // var_dump($e->getMessage());
    //     }        
    // }

    public function sendMailerlite2($info){
        $tag_name = array(MAILERLITE_ALL2);
        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = array(MAILERLITE_ALL2, MAILERLITE_CTAG_ID2);
            else if($info['tag'] == "vtag")
                $tag_name = array(MAILERLITE_ALL2, MAILERLITE_VTAG_ID2);
            else if($info['tag'] == "ltag")
                $tag_name = array(MAILERLITE_ALL2, MAILERLITE_LTAG_ID2);
            else 
                $tag_name = array(MAILERLITE_ALL2);
        }

        $data = array (
            'email' => $info['email'],
            'fields' => array (
                            "name"=> $info['name']
                        ),
            'groups' => $tag_name
        );

        $jsonData = json_encode($data);

        // API endpoint URL
        $url = 'https://connect.mailerlite.com/api/subscribers';

        // Initialize cURL session
        $ch = curl_init($url);

        // Set cURL options for the POST request
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        // Set the appropriate headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization: Bearer ' . MAILERLITE_KEY,
            'Content-Type: application/json', 
            'Content-Length: ' . strlen($jsonData) 
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        curl_close($ch);
    }

    public function sendSenderAPI($info) {
        $client = new \GuzzleHttp\Client();

        $groups = $this->getGroupsForSender();

        $global_group_id = NULL;
        $sel_group_id = NULL;
        if(isset($groups['data'])) {
            foreach($groups['data'] as $group) {
                if($group['title'] == SENDER_MMPRAYER_TAG_NAME) {
                    $global_group_id = $group['id'];
                }

                if($info['tag'] && $group['title'] == "MM2_" . $info['tag']) {
                    $sel_group_id = $group['id'];
                }
            }
        }

        if(!$global_group_id) {
            $global_group_id = $this->createGroupForSender(SENDER_MMPRAYER_TAG_NAME);
        }

        if($info['tag'] && !$sel_group_id) {
            $sel_group_id = $this->createGroupForSender("MM2_" . $info['tag']);
        }

        if($info['tag'])
            $tag_name = array($global_group_id, $sel_group_id);
        else
            $tag_name = array($global_group_id);



        $json = [
          "email" => $info['email'],
          "firstname" => $info['name'],
          "lastname" => "",
          "groups" => $tag_name,
          "trigger_automation" => false
        ];

        try { 
            $response = $client->post(
                'https://api.sender.net/v2/subscribers',
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . SENDER_API_KEY,
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => $json
                ]
            );
            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
        }
        catch (Exception $e) {
            // var_dump($e->getMessage());
        } 
    }

    public function getGroupsForSender() {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(
            'https://api.sender.net/v2/groups',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . SENDER_API_KEY,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
            ]
        );
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        return $data;
    }

    public function createGroupForSender($groupName) {
        $client = new \GuzzleHttp\Client();

        $json = [
          "title" => $groupName
        ];

        $response = $client->post(
            'https://api.sender.net/v2/groups',
            [
                'headers' => [
                    'Authorization' => 'Bearer ' . SENDER_API_KEY,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $json
            ]
        );
        $body = $response->getBody()->getContents();
        $data = json_decode($body, true);
        return $data['data']['id'];
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . '/../../vendor/autoload.php';

use League\Oauth2\Client\Provider\GenericProvider;
use GuzzleHttp\Client;


const OAUTH_URL = 'https://auth.aweber.com/oauth2/';
const TOKEN_URL = 'https://auth.aweber.com/oauth2/token';

class HanielPrayer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hanielPray_m');
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('haniel_prayer');
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

        $subscriber = $this->hanielPray_m->get_item($where);
        if(empty($subscriber)){
            // add subscriber            
            $this->hanielPray_m->add_item($info);
        }

        echo 'ok';

        // add subscriber
        $this->sendConvetkit($info);
        // $this->sendAWeber($info);
        $this->sendGetResponse($info);
        $this->sendSenderAPI($info, "HANIEL_", SENDER_HANIEL_TAG_NAME);
    }

    public function verify_email(){
        $req = $this->input->post();

        $email = $req['email'];
        $api = DEBOUNCE_HANIEL_KEY;
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

    //     $list_name = AWEBER_HANIEL_LIST_NAME;
        
    //     if($info['tag'])
    //         $tag_name = array(AWEBER_HANIEL_TAG_NAME, $info['tag']);
    //     else
    //         $tag_name = array(AWEBER_HANIEL_TAG_NAME);
        
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

    public function sendGetResponse($info) {
        // common List;
        $list_id = GETRESPONSE_LIST_TOKEN;

        if($info['tag']) {
            if($info['tag'] == 'ctag') {
                $list_id = GETRESPONSE_HAINEL_CTAG_TOKEN;
            } else if($info['tag'] == 'ltag') {
                $list_id = GETRESPONSE_HAINEL_LTAG_TOKEN;
            } else if($info['tag'] == 'vtag') {
                $list_id = GETRESPONSE_HAINEL_VTAG_TOKEN;
            }
        }

        $apiKey = GETRESPONSE_KEY;
        $url = 'https://api.getresponse.com/v3';
        $end_point = '/contacts';

        $contactData = [
            "name" => $info['name'],        
            "email" => $info['email'],
            "campaign" => [
                "campaignId" => $list_id,
            ],
            "dayOfCycle"=> "0"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url.$end_point);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "X-Auth-Token: api-key $apiKey",
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($contactData));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 202) {
            return true;
        } else {
            return false;
            // echo "Failed to add contact. Response: $response";
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
        if($info['tag']){
            if($info['tag'] == "ctag")
                $tag_name = array(CONVERTKIT_HANIEL_TAG_ID, CONVERTKIT_CTAG_ID);
            else if($info['tag'] == "vtag")
                $tag_name = array(CONVERTKIT_HANIEL_TAG_ID, CONVERTKIT_VTAG_ID);
            else if($info['tag'] == "ltag")
                $tag_name = array(CONVERTKIT_HANIEL_TAG_ID, CONVERTKIT_LTAG_ID);
            else 
                $tag_name = CONVERTKIT_HANIEL_TAG_ID;
        }
        else
            $tag_name = CONVERTKIT_HANIEL_TAG_ID;

        $api = new \ConvertKit_API\ConvertKit_API(CONVERTKIT_API_KEY, CONVERTKIT_API_SECRET);
        $options = [
                    'email'      => $info['email'],
                    'name'       => $info['name'],
                    'tags'       => $tag_name
                ];
        
        $subscribed = $api->form_subscribe(CONVERTKIT_FORM_ID, $options);
        
        return true;    
    }

    public function sendSenderAPI($info, $type, $tagName) {
        $client = new \GuzzleHttp\Client();

        $groups = $this->getGroupsForSender();

        $global_group_id = NULL;
        $sel_group_id = NULL;
        if(isset($groups['data'])) {
            foreach($groups['data'] as $group) {
                if($group['title'] == $tagName) {
                    $global_group_id = $group['id'];
                }

                if($info['tag'] && $group['title'] == $type . $info['tag']) {
                    $sel_group_id = $group['id'];
                }
            }
        }

        if(!$global_group_id) {
            $global_group_id = $this->createGroupForSender($tagName);
        }

        if($info['tag'] && !$sel_group_id) {
            $sel_group_id = $this->createGroupForSender($type . $info['tag']);
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

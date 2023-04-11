<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DailyHoroscope extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($error = NULL)
    {
        $data['title'] = "Daily Horoscope";
        $data['error'] = $error;
        $this->load->view('header_for_tc', $data);
        $this->load->view('horoscope_main', $data);
        $this->load->view('footer');
    }
    
    public function horoscope($selected, $sel_date){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://sameer-kumar-aztro-v1.p.rapidapi.com/?sign=" . $selected . "&day=" . $sel_date,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: sameer-kumar-aztro-v1.p.rapidapi.com",
                "X-RapidAPI-Key: 89f66c4c17msh7520e3da52718b0p17d4bajsn9b69417dfec3"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
           $this->index();
           return;
        } else {
            $response = json_decode($response);
            if(!isset($response->current_date)){
                $this->index("Sorry, API not working. Please try again later.");
                return;
            }

            $data['sel_horo'] = $selected;
            $data['sel_date'] = $sel_date;
            $data['response'] = $response;

            $data['title'] = "Daily Horoscope";
            $this->load->view('header_for_tc', $data);
            $this->load->view('horoscope_daily', $data);
            $this->load->view('footer');
        }
    }
}

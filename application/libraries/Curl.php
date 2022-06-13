<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curl {

    public $content;
    public $url;
    public $errorNum;
    public $errorMesg;

    public function __construct() {
        $this->CI = get_instance();
    }

    function fetchURL($url = null, $method = "GET", $vars = array()) {

        //set timeout to 10 mins

        set_time_limit(600);

        $myurl = $url ? $url : $this->url;

        if ($method == 'GET' && is_array($vars) && count($vars) > 0) {
        
            $params = '';
            foreach ($vars as $key => $val) {
        
                $params .= "{$key}={$val}&";
        
            }
        
            $myurl .= "?{$params}";
        
        }
        
        //authorization header
        $this->CI = get_instance();
        
        // create a new curl resource
        $ch = curl_init();
        // set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $myurl);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 480);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        if(isset($headers)) {
    
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        }

        if ($method == 'POST') {
    
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    
        }

        // $output contains the output string
        $response = curl_exec($ch);
        
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        // close curl resource, and free up system resources
        curl_close($ch);

        log_message('debug', '[Curl] Url: ' . $myurl);
        log_message('debug', '[Curl] Response: ' . $response);
        log_message('debug', '[Curl] Header Size: ' . $header_size);
        log_message('debug', '[Curl] Header: ' . $header);
        log_message('debug', '[Curl] Body: ' . $body);

        $this->response = $response;

        $response_json = json_decode($response, true);

        return $response;
   
    }

    public function get_all_products($get_data = '') {
        
        $url = HOST_API_URL . "get_all_products/";

        $this->response = $this->fetchURL($url, 'GET', $get_data);
        
        $response = json_decode($this->response);
        
        if (!isset($response->status)) {
    
            return array();
    
        } else {
         
            if (!$response->status) {

                return array();

            } else if(in_array($response->status, array('500', '501'))) {
      
                return array();

            } else {
            
                return json_decode(json_encode($response->results->products),true);
          
            }
        
        }
    
    }

    public function get_latest_products($get_data = '') {
        
        $url = HOST_API_URL . "get_latest_products/";

        $this->response = $this->fetchURL($url, 'GET', $get_data);
        
        $response = json_decode($this->response);
        
        if (!isset($response->status)) {
    
            return array();
    
        } else {
         
            if (!$response->status) {

                return array();

            } else if(in_array($response->status, array('500', '501'))) {
      
                return array();

            } else {
            
                return json_decode(json_encode($response->results->products),true);
          
            }
        
        }
    
    }

    public function get_product_info($get_data = '') {
        
        $url = HOST_API_URL . "get_product_info/";

        $this->response = $this->fetchURL($url, 'GET', $get_data);
        
        $response = json_decode($this->response);
        
        if (!isset($response->status)) {
    
            return array();
    
        } else {
         
            if (!$response->status) {

                return array();

            } else if(in_array($response->status, array('500', '501'))) {
      
                return array();

            } else {
            
                return json_decode(json_encode($response->results->products),true);
          
            }
        
        }
    
    }



}
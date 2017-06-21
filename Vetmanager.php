<?php

class Vetmanager {

    private $api_key;
    private $api_url = 'https://<dc>.api.mailchimp.com/2.0';

    /**
     * Create a new instance
     * @param string $api_key Your MailChimp API key
     */
    public function __construct($domain, $api_key) {
        $this->api_key = $api_key;
        $this->api_url = "https://" . $domain . "/rest/api/";
    }

    public function request($modelName, $pkValue = '', $data = array(), $method = 'GET') {

        $url = $this->api_url . "{$modelName}";
        if (!empty($pkValue)) {
            $url.= '/' . $pkValue;
        }

        $headers = array('X-REST-API-KEY:' . $this->api_key);
        $getData = $data;
       // var_dump($getData);
        if (is_array($data)) {
            $data = json_encode($data);
        } else {
            $data = (string) $data;
        }

        $handle = curl_init();
        
        //var_dump($url);
        curl_setopt($handle, CURLOPT_USERAGENT, 'WireCRM Rest API');
        curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, 0);
        if (in_array($method, array('POST', 'PUT', 'DELETE'))) {
            curl_setopt($handle, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
        } else if("GET" == $method && !empty($getData)) {
            $url .= '?' . http_build_query($getData);
        }
        curl_setopt($handle, CURLOPT_URL, $url);
        //var_dump($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);

        $data = curl_exec($handle);
        
        curl_close($handle);
        //var_dump($data);
        $array = json_decode($data, true);
        return $array;
    }

}

<?php

require_once './Vetmanager.php';

$number = filter_input(INPUT_GET, 'num');
$number = '2343';
if (empty($number)) {
   exit(); 
}

$vetmanager = new Vetmanager('manager', '8035e1b7358df45605413ed649b7847a');

$clearPhones = $vetmanager->request(
        'clientPhone'
        , ''
        , array(
            'offset' => 0
            , 'limit' => 1
            , 'filter' => array(
                array(
                    'property' => 'clean_phone'
                    , 'value' => $number
                    , "operator" => "like"
                )
            )
        )
);


if (is_array($clearPhones) && !empty($clearPhones) && $clearPhones['success'] && $clearPhones['data']['totalCount'] > 0) {
    try {
        $clientID = $clearPhones['data']['clientPhone'][0]['client_id'];
        $client = $vetmanager->request('client', $clientID);
        echo $client['data']['client']['first_name']  . " " . $client['data']['client']['last_name'] ; 
    } catch (Exception $e) {
        exit();
    }
}

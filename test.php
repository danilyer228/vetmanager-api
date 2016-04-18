<?php
//Документация http://wiki.vetmanager.ru/index.php/%D0%9A%D0%B0%D1%82%D0%B5%D0%B3%D0%BE%D1%80%D0%B8%D1%8F:REST_API
require_once './Vetmanager.php';
define('NEED_NUMBER_LENGTH', 9);
// Получили номер, должен быть в формате чистых чисел 4324234

$number = filter_input(INPUT_GET, 'num');
//$number = '375447688419';
if (empty($number)) {
   exit(); 
}

//Обрезаем
$numberLength = strlen($number);
if ($numberLength > NEED_NUMBER_LENGTH) {
    $number = substr($number, NEED_NUMBER_LENGTH*-1, NEED_NUMBER_LENGTH);
}
//var_dump($number); die();
// Создали объект для работы с АПИ, используем хост и апи ключ
$vetmanager = new Vetmanager('manager', '8035e1b7358df45605413ed649b7847a');

// Достали подходящую строку по номеру телефона
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
        // Достали ИД клиента
        $clientID = $clearPhones['data']['clientPhone'][0]['client_id'];
        // Получили всю информацию о клиенте
        $client = $vetmanager->request('client', $clientID);
        // Отдали Имя Фамилию
        echo $client['data']['client']['first_name']  . " " . $client['data']['client']['last_name'] ; 
    } catch (Exception $e) {
        exit();
    }
}

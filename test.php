<?php
require './VetmanagerPrice.php';

//$vetmanager = new Vetmanager('dev.vetmanager.ru', 'c19cff4315cd5c4953db9453aeb87f55');
//var_dump($vetmanager->request('unit'));

$price = new VetmanagerPrice('manager', 'c19cff4315cd5c4953db9453aeb87f55');

//$price = new VetmanagerPrice('dev.vetmanager.ru', 'c19cff4315cd5c4953db9453aeb87f55');
//$allClients = $price->getAllRecords('client');
//file_put_contents('t.txt', print_r($allClients, true));
//var_dump(count($allClients));
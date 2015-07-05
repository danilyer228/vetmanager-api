<?php
require_once './Vetmanager.php';
Class VetmanagerPrice {

    const LIST_SIZE = 100;

    protected $_goods;

    function __construct($_apiDomain, $_apiKey) {
        $this->_vm = new Vetmanager($_apiDomain, $_apiKey);
        $this->loadGoods();
       // var_dump($this->_goods);
    }

    function getAllRecords($modelName, $pkValue = '', $data = array(), $method = 'GET') {
        $resultAll = array();
        $total = 1;
        $cnt = 0;

        while (count($resultAll) < $total) {
            $params = array_merge($data, array(
                'offset' => $cnt * self::LIST_SIZE 
                , 'limit' => self::LIST_SIZE  
                , 'sort' => array(
                    json_decode(array(array('property' => 'id','direction' => 'ASC')))
                )
                
            ));
            $result = $this->_vm->request($modelName, $pkValue, $params, $method);
            //var_dump($result); die();
            $total = $result['data']['totalCount'];
            $resultAll = array_merge($resultAll, $result['data'][$modelName]);
            $cnt++;
            var_dump(count($resultAll), $total);
        }

        return $resultAll;
    }

    function loadGoods() {
        $resultAll = array();
        $total = 1;
        $cnt = 0;
        $modelName = 'good';
        while (count($resultAll) < $total) {
            $params = array_merge($data, array(
                'offset' => $cnt * self::LIST_SIZE 
                , 'limit' => self::LIST_SIZE  
                , 'sort' => array(
                    json_decode(array(array('property' => 'id','direction' => 'ASC')))
                )
                
            ));
            $result = $this->_vm->request($modelName, '', $params);
            $total = $result['data']['totalCount'];
            $resultAll = array_merge($resultAll, $result['data'][$modelName]);
            $cnt++;
            //var_dump(count($resultAll), $total);
        }
    }

}

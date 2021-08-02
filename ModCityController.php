<?php

require_once ('core2/inc/CoreController.php');

class  ModCityController extends Common {

    function action_index () {
            require_once("index.php");
    }

    public function getDb() {
        /*$this->db->query('SELECT * FROM `city_select`')->fetchAll();
        var_dump($this);*/
    }

}





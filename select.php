<?php


class selectUser {

    static public $con;
   function __construct(  ){
        self::$con = Connection::get_instance()->dbh;
    }

    static public function get_all(){
        $records = [];
        $res = self::$con->query("SELECT * FROM information ORDER BY street");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)){
            $records[] = $row;
        }
        return $records;
    }

}

require_once 'connection.php';


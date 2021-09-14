<?php 
require_once('config.php');

class DB {
    private static $instance;

    public function getInstance(){
        if(!isset(self::$instance)){
           try{
               self::$instance= new PDO('mysql:host='.HOST. ';dbname='. DB, PASS, USER );
           }catch(PDOException $e){
                echo $e;
           } 
        }
        return self::$instance;
    }
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
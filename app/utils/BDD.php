<?php
class BDD{
  private static $instance = null;

  public static function getInstance(){
    if(self::$instance === null){
      self::$instance = new PDO(
        "mysql:host=127.0.0.1;dbname=php-ipssi;charset=utf8;", 
        "root", 
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
      );
    }

    return self::$instance;
  }
  
}
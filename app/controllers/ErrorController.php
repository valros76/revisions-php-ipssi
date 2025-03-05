<?php
class ErrorController{

  public static function showError(int $err = 404){
    switch($err){
      case 500:
        require_once "app/views/error/500.php";
        break;
      case 404:
        default:
          require_once "app/views/error/404.php";
          break;
    }
    require_once "app/templates/global_template.php";
  }

}
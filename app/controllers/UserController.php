<?php
class UserController{

  public function index(){
    $user = new User(BDD::getInstance());
    $users = $user->getList();
    require_once "app/views/home.php";
    require_once "app/templates/global_template.php";
  }

}
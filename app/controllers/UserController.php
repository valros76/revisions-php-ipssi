<?php
class UserController{

  public function index(){
    $user = new User(BDD::getInstance());
    var_dump($user);
  }

}
<?php
class UserController{

  public function index(){
    $user = new User(BDD::getInstance());
    $users = $user->getList();
    require_once "app/views/users.php";
    require_once "app/templates/global_template.php";
  }

  public function delete($params){
    var_dump($params);
    $id = $params["id"] ?? null;
    if(!$id)  ErrorController::showError(404);
  }

}
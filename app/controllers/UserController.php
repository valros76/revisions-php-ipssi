<?php
class UserController{

  public function index(){
    $user = new User(BDD::getInstance());
    $users = $user->getList();
    require_once "app/views/users.php";
    require_once "app/templates/global_template.php";
  }

  public function showAddForm(){
    require_once "app/views/add_user.php";
    require_once "app/templates/global_template.php";
  }

  public function add($params){
    if(count($params) <= 0) ErrorController::showError(404);
    $userManager = new User(BDD::getInstance());

    $pseudo = $params["pseudo"] ?? null;
    $password = $params["password"] ?? null;
    if(!$pseudo || !$password) ErrorController::showError(404);
    $userManager->setPseudo($params["pseudo"]);
    $userManager->setPassword($params["password"]);
    // On ne garde pas le mot de passe en clair plus longtemps !
    $password = null;
    if(!$userManager->add()){
      throw new Exception("Une erreur s'est produite lors de la tentative d'ajout d'un utilisateur.");
    }
    header("Location:/users");
    exit;
  }

  public function showUpdateForm($params){
    $userID = $params["id"] ?? null;
    if(!$userID) ErrorController::showError(404);
    require_once "app/views/update_user.php";
    require_once "app/templates/global_template.php";
  }

  public function update($params){
    if(count($params) <= 0) ErrorController::showError(404);
    $userManager = new User(BDD::getInstance());

    $id = (int) $params["id"] ?? null;
    $pseudo = $params["pseudo"] ?? null;
    $password = $params["password"] ?? null;
    if(!$id || !$pseudo || !$password) ErrorController::showError(404);
    $userManager->setId($id);
    $userManager->setPseudo($pseudo);
    $userManager->setPassword($password);
    // On ne garde pas le mot de passe en clair plus longtemps !
    $password = null;
    if(!$userManager->update()){
      throw new Exception("Une erreur s'est produite lors de la tentative de modification d'un utilisateur.");
    }
    header("Location:/users");
    exit;
  }

  public function delete($params){
    $id = $params["id"] ?? null;
    if(!$id) ErrorController::showError(404);

    $userManager = new User(BDD::getInstance());
    if(!$userManager->deleteById($id)){
      throw new Exception("Une erreur s'est produite lors de la tentative de suppression d'un utilisateur.");
    }
    header("Location:/users");
    exit;
  }

}
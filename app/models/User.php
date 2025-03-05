<?php
class User{
  private int $id;
  private string $pseudo;
  private string $password;
  private string $inscription_date;
  private static $bdd;

  public function __construct($bdd = null){
    if($bdd){
      self::setBdd($bdd);
    }
  }

  public function getId():int{
    return $this->id;
  }

  public function setId(int $id){
    $this->id = $id;
  }

  public function getPseudo(): string{
    return $this->pseudo;
  }

  public function setPseudo(string $pseudo){
    $this->pseudo = $pseudo;
  }

  private function getPassword():string{
    return $this->password;
  }

  public function setPassword(string $password){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $this->password = $password;
  }

  public function getInscriptionDate():string{
    return $this->inscription_date;
  }

  public function setInscriptionDate(string $inscription_date){
    $this->inscription_date = $inscription_date;
  }

  public function add(){
    $pseudo = $this->getPseudo() ?? null;
    $password = $this->getPassword() ?? null;
    if (!$pseudo || !$password) return false;

    $req = self::$bdd->prepare("INSERT INTO users(pseudo, password) VALUES(:pseudo, :password)");
    $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $req->bindValue(":password", $password, PDO::PARAM_STR);
    if(!$req->execute()){
      return false;
    }

    $req->closeCursor();
    return true;
  }

  public function getList(){
    $req = self::$bdd->prepare("SELECT * FROM users ORDER BY id DESC");
    $req->execute();
    $users = $req->fetchAll(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $users ?? null;
  }

  public function getById(int $id){
    $req = self::$bdd->prepare("SELECT * FROM users WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->execute();
    $user = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $user ?? null;
  }

  public function update(){
    $id = $this->id ?? null;
    $pseudo = $this->pseudo ?? null;
    $password = $this->password ?? null;
    if(!$id || !$pseudo || !$password) return false;

    $req = self::$bdd->prepare("UPDATE users SET pseudo=:pseudo, password=:password WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    $req->bindValue(":password", $password, PDO::PARAM_STR);
    if(!$req->execute()){
      return false;
    }

    $req->closeCursor();
    return true;
  }

  public function updatePseudo(){
    $id = $this->id ?? null;
    $pseudo = $this->pseudo ?? null;
    if (!$id || !$pseudo) return false;

    $req = self::$bdd->prepare("UPDATE users SET pseudo=:pseudo WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
    if(!$req->execute()) return false;

    $req->closeCursor();
    return true;
  }

  public function updatePassword(){
    $id = $this->id ?? null;
    $password = $this->password ?? null;
    if (!$id || !$password) return false;

    $req = self::$bdd->prepare("UPDATE users SET password=:password WHERE id=:id");
    $req->bindValue(":id", $id, PDO::PARAM_INT);
    $req->bindValue(":password", $password, PDO::PARAM_STR);
    if(!$req->execute()) return false;

    $req->closeCursor();
    return true;
  }

  public function deleteById(int $id){
    if ($id <= 0) return false;
    return self::$bdd->exec("DELETE FROM users WHERE id={$id}");
  }

  private static function setBdd($bdd){
    self::$bdd = $bdd;
  }
}
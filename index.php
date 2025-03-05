<?php
ini_set("date.timezone", "Europe/Paris");
error_reporting(E_ALL);
// ini_set("display_errors", "off");
ini_set("display_errors", 1);

require_once "./app/utils/Autoloader.php";
Autoloader::register();
[$configFile, $config] = Config::registerConfig("./app/config/config.json");

try{
  $httpRequest = new HttpRequest();
  $router = new Router();
  var_dump("here");
  $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath));
  $httpRequest->run($config);
}catch(Exception $e){
  throw new Exception("Erreur : {$e}");
}
<?php

require_once "app/utils/Autoloader.php";
Autoloader::register();
[$configFile, $config] = Config::registerConfig("app/config/config.json");

try{
  $httpRequest = new HttpRequest();
  $router = new Router();
  $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath));
  $httpRequest->run($config);
}catch(Exception $e){
  throw new Exception("Erreur : {$e}");
}
<?php
class Autoloader
{

  public static function register()
  {
    spl_autoload_register(function ($class) {
      if(file_exists("/app/config/config.json")){
        return;
      }
      $class = str_replace("\\", "/", $class);
      $class = ucfirst($class);
      $configFile = file_get_contents("app/config/config.json");
      $config = json_decode($configFile);
      foreach ($config->autoloadFolders as $dir) {
        if (file_exists("{$config->basepath}/{$dir}/{$class}.php")) {
          require_once "{$config->basepath}/{$dir}/{$class}.php";
        }
      }
    });
  }
}

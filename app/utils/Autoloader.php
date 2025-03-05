<?php
class Autoloader{

  public static function register(){
    spl_autoload_register(function ($class){
      $class = ucfirst($class);
      $class = str_replace("\\", "/", $class);

      $autoloadFolders = [
        [
          "dir" => "app/controllers",
          "file" => "{$class}.php"
        ],
        [
          "dir" => "app/models",
          "file" => "{$class}.php"
        ],
        [
          "dir" => "app/utils",
          "file" => "{$class}.php"
        ],
      ];

      foreach($autoloadFolders as $folder){
        if(file_exists("{$folder["dir"]}/{$folder["file"]}")){
          require_once "{$folder["dir"]}/{$folder["file"]}";
        }
      }
    });
  }

}
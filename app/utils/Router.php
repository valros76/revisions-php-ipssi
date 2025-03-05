<?php
class Router
{
  private $listRoutes;

  public function __construct()
  {
    if (!file_exists("app/routes/routes.json")) {
      exit;
    }
    $stringRoutes = file_get_contents("app/routes/routes.json");
    $this->listRoutes = json_decode($stringRoutes);
  }

  public function findRoute($httpRequest, $basepath)
  {
    $url = $httpRequest->getUrl();
    if (str_contains($url, "/{basepath}/")) {
      $url = str_replace($basepath, "", $httpRequest->getUrl());
    }
    $method = $httpRequest->getMethod();
    $routeFound = array_filter($this->listRoutes, function ($route) use ($url, $method) {
      return preg_match("#^{$route->path}$#", $url) && $route->method == $method;
    });
    $numberRoute = count($routeFound);
    if ($numberRoute > 1) {
      throw new Exception("Multiple Route Found");
    } else if ($numberRoute == 0) {
      throw new Exception("No route found !");
    } else {
      return new Route(array_shift($routeFound));
    }
  }
}

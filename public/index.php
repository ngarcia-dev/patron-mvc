<?php

use Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class) {
  $path = "../" . str_replace("\\", "/", $class) . ".php";
  if (file_exists($path)) {
    require_once $path;
  }
});

$routes = require_once '../config/routes.php';

$router = new Router($routes);
$router->handleRequest($_SERVER['REQUEST_URI']);

<?php

namespace Core;

class Router
{
  private $routes;

  public function __construct($routes)
  {
    $this->routes = $routes;
  }

  public function handleRequest($requestUri)
  {
    // Limpiar y normalizar la URI
    $uri = strtok($requestUri, '?');
    $uri = trim($uri, '/');

    // Iterar sobre las rutas definidas
    foreach ($this->routes as $pattern => $route) {
      if (preg_match("#^{$pattern}$#", $uri, $matches)) {
        $controllerName = $route['controller'];
        $actionName = $route['action'];
        $params = array_slice($matches, 1); // Obtener parámetros capturados

        // Crear instancia del controlador y llamar al método
        $controllerClass = "App\\Controllers\\$controllerName";
        $controller = new $controllerClass();
        call_user_func_array([$controller, $actionName], $params);
        return;
      }
    }

    // Si no coincide ninguna ruta, retornar 404
    http_response_code(404);
    echo "404 - Página no encontrada";
  }
}

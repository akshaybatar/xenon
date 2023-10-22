<?php

namespace App\Services;

class Route
{

    private static $routes = [];
    private static $controllersNamespaces = 'App\Controllers\\';

    public static function add($uri, $controller, $action, $method = 'GET', $middleware = [])
    {

        self::$routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'action' => $action,
            'middleware' => $middleware
        ];
    }
    public static function get($uri, $controller, $action, $middleware = [])
    {
        self::add($uri, $controller, $action, 'GET', $middleware);
    }
    public static function post($uri, $controller, $action,  $middleware = [])
    {
        self::add($uri, $controller, $action, 'POST', $middleware);
    }
    public static function handle()
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $key => $route) {
            if ('/' . $route['uri'] === $requestUri && $route['method'] === $requestMethod) {
                $controllerClass = Self::$controllersNamespaces . $route['controller'];
                $action = $route['action'];

                //handle middlware 
                foreach ($route['middleware'] as $middle) {
                    $newMiddleware = new $middle;
                    $newMiddleware->handle();
                }

                $controller = new $controllerClass();
                $controller->$action();
                return;
            }
        }
        echo '404 page not found';
    }
}

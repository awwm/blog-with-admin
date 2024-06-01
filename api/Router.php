<?php
namespace App;

class Router {
    private $routes = [];

    public function get($path, $handler) {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler) {
        $this->addRoute('POST', $path, $handler);
    }

    public function put($path, $handler) {
        $this->addRoute('PUT', $path, $handler);
    }

    public function delete($path, $handler) {
        $this->addRoute('DELETE', $path, $handler);
    }

    private function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function route($method, $uri, $requestData) {
        foreach ($this->routes as $route) {
            $regex = $this->convertPathToRegex($route['path']);
            if ($regex !== null && $route['method'] === $method && preg_match($regex, $uri, $matches)) {
                array_shift($matches);
                return call_user_func_array($route['handler'], array_merge([$requestData], array_values($matches)));
            }
        }
        return ['success' => false, 'message' => 'Route not found'];
    }

    private function convertPathToRegex($path) {
        if ($path === null) {
            return '';
        }

        return '@^' . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path) . '$@';
    }
}
?>
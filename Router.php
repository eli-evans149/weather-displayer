<?php

class Router {
    private $routes = [
        '/' => [
            'controller' => 'WeatherDisplayController',
            'action' => 'index',
        ],
        '/test' => [
            'controller' => 'WeatherDisplayController',
            'action' => 'test',
        ],
    ];

    public function getRoute(string $uri): array {
        switch ($uri) {
            case '/':
            case '/index':
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'index',
                ];
            case '/test':
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'test',
                ];
            default:
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'error',
                ];
        }
    }
}


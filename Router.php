<?php

class Router {

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


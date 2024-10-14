<?php

class Router {

    public function getRoute(string $uri): array {
        $uri = explode('/', $uri);
        switch ($uri[1]) {
            case '':
            case 'index':
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'index',
                    'parameters' => [],
                ];
            case 'postcode-search': // /postcode-search/73134
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'postcodeSearch',
                    'parameters' => ['postcode' => $uri[1],],
                ];
            case 'test':
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'test',
                    'parameters' => [],
                ];
            default:
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'error',
                    'parameters' => [],
                ];
        }
    }
}


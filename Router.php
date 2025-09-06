<?php

class Router {

    public function getRoute(string $uri): array {
        $uri = explode('/', $uri);
        $uriEnding = explode('?', $uri[1])[0];

        switch ($uriEnding) {
            case '':
            case 'index':
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'index',
                    'parameters' => [],
                ];
            case 'postcode-search': // /postcode-search/73134
                    $postcode = $_GET['postcode'];
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'postcodeSearch',
                    'parameters' => [$postcode],
                ];
            case 'weather': // /weather/31790_PC
                return [
                    'controller' => 'WeatherDisplayController',
                    'action' => 'weatherSearch',
                    'parameters' => ['locationKey' => $uri[2],],
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


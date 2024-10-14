<?php

require_once 'routes.php';
require_once 'Controller/WeatherDisplayController.php';

echo "Hello World! You are coming from: ";

echo "\n\n URL: " . $_SERVER['REQUEST_URI'] . "\n";

$uri = $_SERVER['REQUEST_URI'];

foreach ($routes as $route => $config) {
    if ($route === $uri) {
        $controller = new $config['controller']();
        $action = $config['action'];
        echo $controller->$action();
    }
}

?>
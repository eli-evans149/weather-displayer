<?php

require_once 'Router.php';
require_once 'Controller/WeatherDisplayController.php';

echo "Hello World! You are coming from: ";

echo "\n\n URL: " . $_SERVER['REQUEST_URI'] . "\n";

$uri = $_SERVER['REQUEST_URI'];
$router = new Router();
$config = $router->getRoute($uri);

$controller = new $config['controller']();
$action = $config['action'];
echo $controller->$action();

?>
<?php

require_once 'Router.php';
require_once 'Controller/WeatherDisplayController.php';

$uri = $_SERVER['REQUEST_URI'];
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $uri)) {
    return false;
}
$router = new Router();
$config = $router->getRoute($uri);

$controller = new $config['controller']();
$action = $config['action'];
echo $controller->$action(...$config['parameters']);

?>
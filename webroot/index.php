<?php
// Home work: add try all exception in file index.php


define('DS',DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

require_once(ROOT.DS.'lib'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);








/*
$test = App::$db->query('select * from pages');
echo '<pre>';
print_r($test);
*/

/*
$router = new Router($_SERVER['REQUEST_URI']);
echo '<pre>';
print_r('Route: ' . $router->getRoute() . PHP_EOL);
print_r('Languages: ' . $router->getLanguage() . PHP_EOL);
print_r('Controller: ' . $router->getController() . PHP_EOL);
print_r('Action tobe called: ' . $router->getMethodPrefix() . $router->getAction() . PHP_EOL);
echo 'Params: ';
print_r($router->getParams());
*/




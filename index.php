<?php
//FRONT CONTROLLER

//общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

//подключение файлов системы
define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Router.php');
include_once ROOT . '/components/dbConnect.php';

//соединение с БД



//вызов роутера
$router = new Router();
$router->run();
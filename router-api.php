<?php
require_once('libs/lib/Router.php');
require_once('api/api-message.controller.php');



$router = new Router();


$router->addRoute('comentarios', 'GET', 'ApiMessageController','getAll');

$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource,$method);

<?php
require_once('libs/lib/Router.php');
require_once('api/api-comentariosController.php');

$router = new Router();

$router->addRoute('comentarios/canciones/:ID', 'GET', 'ApiComentariosController','getAll');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentariosController','delete');

$resource = $_GET['resource'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($resource,$method);

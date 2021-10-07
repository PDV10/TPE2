<?php
    require_once('construct/movieController.php');

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = "home";
    }

    $params = explode("/", $action);

    $controller = new Controller();


    switch ($params[0]) {
        case 'home':
            $controller->showView();
            break; 
        case 'categories':
            $controller->showGenreMusic($params[1]);   
            break;
        case 'login':
            $controller->login(); 
    }
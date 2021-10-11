<?php
    require_once('construct/musicController.php');
    require_once('construct/userController.php');

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = "home";
    }

    $params = explode("/", $action);

    $musicController = new musicController();
    $userController = new userController();

    switch ($params[0]) {
        case 'home':
            $musicController->showView();
            break; 
        case 'categories':
            $musicController->showGenreMusic($params[1]);   
            break;
        case 'login':
            $userController->login();
            break;
        case 'delete':
            $musicController->delete($params[1]);
            break;
        case 'update':
            $musicController->update($params[1]);
            break;
        case 'updateMusic':
            $musicController->updateMusic();
            break;
    }
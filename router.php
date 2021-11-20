<?php
    require_once('controller/musicController.php');
    require_once('controller/userController.php');
    require_once('controller/genreController.php');
    require_once('controller/favoriteController.php');
   

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    define('TABLA', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'.'categories/');
    define('GENRE_TABLE', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'.'AdministrarGeneros/');
    define('USER_TABLE', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'.'showUsers/');
    
    
    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = "home";
    }

    $params = explode("/", $action);

    $musicController = new musicController();
    $userController = new userController();
    $favoriteController = new favoriteController();
    $genreController = new genreController();

    switch ($params[0]) {
        case 'home':
            $musicController->showView();
            break; 
        case 'categories':
            $musicController->showGenreMusic($params[1], NULL); 
            break;
        case 'login':
            $userController->login();
            break;
        case 'register':
            $userController->register();
            break;
        case 'showUsers':
            $userController->showAll();
            break;
        case 'deleteUser':
            $userController->deleteUser($params[1]);
            break;
        case 'doAdmin':
            $userController->changeAdmin($params[1]);
            break;
        case 'removeAdmin':
            $userController->changeAdmin($params[1]);
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
        case 'logout':
            $userController->logout();
            break;
        case 'filtro':
            $musicController->filtro();
            break;
        case 'showFormAddSong':
            $musicController->showFormAddSong();
            break;
        case 'changeValueFav':
            $favoriteController->changeValueFav();
            break;
        case 'favorites':
            $favoriteController->showTableFav();
            break;
        case 'addSong':
            $musicController->addSong();
            break;
        case 'verMas':
            $musicController->showModalseeMore($params[1]);
            break;
        case 'AdministrarGeneros':
            $genreController->showTableGenre();
            break;
        case 'addGenre':
            $genreController->addNewGenre();
            break;
        case 'deleteGenre':
            $genreController->deleteGenre($params[1]);
            break;
        case 'RenderUpdateGenre':
            $genreController->renderUpdateGenre($params[1]);
            break;
        case 'updateGenre':
            $genreController->updateGenre();
            break;
    }
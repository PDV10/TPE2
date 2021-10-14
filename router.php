<?php
    require_once('controller/musicController.php');
    require_once('controller/userController.php');
    require_once('controller/genreController.php');

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    define('TABLA', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'.'categories/');
    define('GENRE_TABLE', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/'.'AdministrarGeneros/');
      
    if(!empty($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }else{
        $action = "home";
    }

    $params = explode("/", $action);

    $musicController = new musicController();
    $userController = new userController();
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
        case 'addSong':
            $musicController->addSong();
            break;
        case 'verMas':
            $musicController->ShowModalseeMore($params[1]);
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
            $genreController->RenderUpdateGenre($params[1]);
            break;
        case 'updateGenre':
            $genreController->updateGenre();
            break;
    }
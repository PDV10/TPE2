<?php
    require_once('model/musicModel.php');
    require_once('view/view.php');

    class Controller{
        private $view;
        private $model;

        function __construct(){
            $this->view = new view();
            $this->model = new musicModel();
        }

        function showView(){
            $genre = $this->model->getAllGenre();
            $this->view->showHome($genre); 
        }
        
        function showGenreMusic($genre){
            $genres = $this->model->getAllGenre();
            $musicForGenre = $this->model->musicForGenre($genre);
            $this->view->showTable($musicForGenre,$genres);
        }

        function login(){
            $usuario = $_REQUEST(["usuario"]);
            $contraseña = $_REQUEST(["contraseña"]);
        }
    }
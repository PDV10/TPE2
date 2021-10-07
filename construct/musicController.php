<?php
    require_once('model/musicModel.php');
    require_once('view/view.php');

    class musicController{
        private $view;
        private $model;

        function __construct(){
            $this->view = new view();
            $this->model = new musicModel();
        }

        function showView(){
            $genre = $this->getAllGenre();
            $this->view->showHome($genre);
        }
        
        function saveGenreId($genre){
            $saveGenreId = $genre;
            return $saveGenreId;
        }

        function showGenreMusic($genre){
            $this->saveGenreId($genre);
            $genres = $this->getAllGenre();
            $musicForGenre = $this->model->musicForGenre($genre);
            $this->view->showTable($musicForGenre,$genres);
        }

        function login(){
            $usuario = $_REQUEST(["usuario"]);
            $contraseña = $_REQUEST(["contraseña"]);
        }
        function delete($id){
            $Musicdelete = $this->model->delete($id);
            $saveGenreId = $this->saveGenreId(1);
            if($Musicdelete){
                header("Location:",BASE_URL . "categories" . $saveGenreId);
            }
        }

        function getAllGenre(){
            $genre = $this->model->getAllGenre();
            return $genre;
        }
    }
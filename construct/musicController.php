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

        function update($id){
            $getDatesOfMusic = $this->model->getDatesOfMusic($id);
            foreach ($getDatesOfMusic as $data) {
                $nombre = $data->nombreCancion;
                $artista = $data->artista;
                $album = $data->album;
                $anio = $data->anio;
            }
            $genres = $this->getAllGenre();
            $this->view->musicUpdate($nombre,$artista,$album,$anio,$genres,$id);
        }

        function updateMusic(){
            $nombre = $_REQUEST("nombre");
            $artista = $_REQUEST("artista");
            $album = $_REQUEST("album");
            $anio = $_REQUEST("anio");
            $genre = $_REQUEST("genre");
            $id = $_REQUEST("id");
            
            $this->model->updateMusic($nombre,$artista,$album,$anio,$genre,$id);
        }

        function getAllGenre(){
            $genre = $this->model->getAllGenre();
            return $genre;
        }
    }
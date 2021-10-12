<?php
    require_once('model/musicModel.php');
    require_once('view/view.php');
    require_once 'helpers/auth.helper.php';

    class musicController{
        private $view;
        private $model;
        private $authHelper;

        function __construct(){
            $this->view = new view();
            $this->model = new musicModel();
            $this->authHelper = new AuthHelper();
        }

        function showView(){
            $genre = $this->getAllGenre();
            $this->view->showHome($genre);
        }

        function showGenreMusic($genre){
            $genres = $this->getAllGenre();
            $musicForGenre = $this->model->musicForGenre($genre);
            $this->view->showTable($musicForGenre,$genres);
        }

        function login(){
            $usuario = $_REQUEST(["usuario"]);
            $contraseña = $_REQUEST(["contraseña"]);
        }
        function delete($id){
            $getOneSong = $this->model->getOneSong($id);
            $id_genero = $getOneSong->id;
            $Musicdelete = $this->model->delete($id);
            header("Location:". TABLA .$id_genero);
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
            $nombre = $_REQUEST['nombre'];
            $artista = $_REQUEST['artista'];
            $album = $_REQUEST['album'];
            $anio = $_REQUEST['anio'];
            $genre = $_REQUEST['genre'];
            $id = $_REQUEST['id'];

            $getOneSong = $this->model->getOneSong($id);
            $id_genero = $getOneSong->id;
            
            $this->model->updateMusic($nombre,$artista,$album,$anio,$genre,$id);
            header("Location:". TABLA .$id_genero);
        }

        function getAllGenre(){
            $genre = $this->model->getAllGenre();
            return $genre;
        }

        function filtro(){
            $filtrado = $_REQUEST['filtro'];
            $yaFiltrado = $this->model->filtrar($filtrado);
            /* 
            $getOneSong = $this->model->getOneSong();
            $id_genero = $getOneSong->id; */

            if($yaFiltrado){
                header("Location:". TABLA );
            }else{
                header("Location:". BASE_URL);
            }
        }

    }
<?php
    require_once('model/musicModel.php');
    require_once('view/view.php');
    require_once ('helpers/auth.helper.php');

    class musicController{
        private $view;
        private $model;
        private $authHelper;
        private $genres;

        function __construct(){
            $this->view = new view();
            $this->model = new musicModel();
            $this->authHelper = new AuthHelper();
            $this->genres = $this->getAllGenre();
        }

        function showView(){
            $genre = $this->getAllGenre();
            $this->view->showHome($genre);
        }

        function showGenreMusic($genre, $filtro=NULL){
            if(isset($genre) && isset($filtro)){
                $musicForGenre = $this->model->filtrar($genre, $filtro);
            }else{
                $musicForGenre = $this->model->musicForGenre($genre);
            }
           $this->view->showTable($musicForGenre,$this->genres, $genre);
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
            $id = $_REQUEST['id'];
            $filtro = $_REQUEST['filtro'];
            $this->showGenreMusic($id,$filtro);
        }

        function showFormAddSong(){
            $this->view->showFormAddSong($this->genres);
        }

        function addSong(){
            $nombreCancion = $_REQUEST['nombre'];
            $artista = $_REQUEST['artista'];
            $album = $_REQUEST['album'];
            $anio = $_REQUEST['anio'];
            $genero = $_REQUEST['genre'];
            // if ($nombreCancion == '' || $artista == '' || $album == '') {

            //     $this->view->showFormAddSong($this->genres);

            //     $this->view->showError('*Tiene que completar todos los campos*');

            // }else{
                $songAdd = $this->model->addSong($nombreCancion,$artista,$album,$anio,$genero);  
                if($songAdd){
                    header("Location:". TABLA . $genero);
                }
            // }
        }
    }
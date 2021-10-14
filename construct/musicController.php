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
            if(isset($genre) && isset($filtro) && $genre == 7){
                $musicForGenre = $this->model->filtrarAll($filtro);
            }elseif($genre == 7){
                $musicForGenre = $this->model->getAllMusic();
            
            }elseif(isset($genre) && isset($filtro)){
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
                $imagen = $data->imagen;
            }
            $genres = $this->getAllGenre();
            $this->view->musicUpdate($nombre,$artista,$album,$anio,$genres,$imagen,$id);
        }

        function updateMusic(){
            if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre']) && isset($_REQUEST['artista']) && !empty($_REQUEST['artista']) && isset($_REQUEST['album']) && !empty($_REQUEST['album']) && isset($_REQUEST['anio']) && !empty($_REQUEST['anio']) && isset($_REQUEST['genre']) && $_REQUEST['genre']!="false" && isset($_REQUEST['imagen']) && !empty($_REQUEST['imagen']) && isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                $nombre = $_REQUEST['nombre'];
                $artista = $_REQUEST['artista'];
                $album = $_REQUEST['album'];
                $anio = $_REQUEST['anio'];
                $genre = $_REQUEST['genre'];
                $imagen = $_REQUEST['imagen'];
                $id = $_REQUEST['id'];
                if($genre != "false"){
                    $this->model->updateMusic($nombre,$artista,$album,$anio,$genre,$imagen,$id); 
                    header("Location:". TABLA .$genre);
                }
            }else{
                $this->view->showError('*No se seleccionó ningun genero*');
            }
            
           
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
            $imagen = $_REQUEST['imagen'];
            // if ($nombreCancion == '' || $artista == '' || $album == '') {

            //     $this->view->showFormAddSong($this->genres);

            //     $this->view->showError('*Tiene que completar todos los campos*');

            // }else{
                $songAdd = $this->model->addSong($nombreCancion,$artista,$album,$anio,$genero,$imagen);  
                if($songAdd){
                    header("Location:". TABLA . $genero);
                }
            // }
        }
        
        function ShowModalseeMore($id){
            $infoMusic = $this->model->getDatesOfMusic($id);
            foreach ($infoMusic as $info) {
                $cancion = $info->nombreCancion;
                $artista = $info->artista;
                $album = $info->album;
                $anio = $info->anio;
                $imagen = $info->imagen;
                $id_genero = $info->id_genero_fk;
            }
            $getGenero = $this->model->getGenero($id);
            $genero = $getGenero->genero;
            if($infoMusic){
                $this->view->showMoreInfoMusic($cancion,$artista,$album,$anio,$genero,$imagen,$id_genero);
            }
        }
    }
<?php 
    /* internos */
    require_once('model/musicModel.php');
    require_once('view/musicView.php');
    /* helper */
    require_once('helpers/auth.helper.php');
    /* externos */
    require_once('model/genreModel.php');

    class MusicController{
        private $view;
        private $model;
        private $genreModel;
        private $authHelper;
        private $genres;

        function __construct(){
            $this->view = new MusicView();
            $this->model = new MusicModel();
            $this->genreModel = new GenreModel();
            $this->authHelper = new AuthHelper();
            $this->genres = $this->genreModel->getAllGenre();
        }

        function showView(){
            $genre = $this->genreModel->getAllGenre();
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
            
            if ($genre == 7) {
                $tablaTodos = 7;
                $this->view->showTable($musicForGenre,$this->genres,$genre,$tablaTodos);
            }elseif($genre != 7){
                $this->view->showTable($musicForGenre,$this->genres,$genre,NULL);
            }
           
        }

        function delete($id){
            if (!($_SESSION['USER_PERMISSIONS'] == 1))  {
                $this->view->showError('No contiene permiso para realizar esta accion!!!');
            }else{
                $getOneSong = $this->model->getOneSong($id);
                $id_genero = $getOneSong->id;
                $Musicdelete = $this->model->delete($id);
                header("Location:". TABLA .$id_genero);
            }
        }

        function update($id){

            $infoMusic = $this->model->getDatesOfMusic($id);
            
            $nombre = $infoMusic->nombreCancion;
            $artista = $infoMusic->artista;
            $album = $infoMusic->album;
            $anio = $infoMusic->anio;
            $imagen = $infoMusic->imagen;
            
            $genres = $this->genreModel->getAllGenre();
            $this->view->musicUpdate($nombre,$artista,$album,$anio,$genres,$imagen,$id);
        }

        function updateMusic(){
            if (!($_SESSION['USER_PERMISSIONS'] == 1)) {
                $this->view->showError('No contiene permiso para realizar esta accion!!!');
            }else{
                if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre']) && 
                isset($_REQUEST['artista']) && !empty($_REQUEST['artista']) && 
                isset($_REQUEST['album']) && !empty($_REQUEST['album']) && 
                isset($_REQUEST['anio']) && !empty($_REQUEST['anio']) && 
                isset($_REQUEST['genre']) && $_REQUEST['genre']!="false" && 
                isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
                    $nombre = $_REQUEST['nombre'];
                    $artista = $_REQUEST['artista'];
                    $album = $_REQUEST['album'];
                    $anio = $_REQUEST['anio'];
                    $genre = $_REQUEST['genre'];
                    $id = $_REQUEST['id'];

                    if ($_FILES['input_name']['type'] == "image/jpg"  || 
                    $_FILES['input_name']['type'] == "image/jpeg" || 
                    $_FILES['input_name']['type'] == "image/png"){
                        
                        $imagen = $_FILES['input_name']['tmp_name'];
                    }

                    if($genre != "false"){
                        $this->model->updateMusic($nombre,$artista,$album,$anio,$genre,$imagen,$id); 
                        header("Location:". TABLA .$genre);
                    }
                }else{
                    $this->view->showError('*No se seleccionó ningun genero*');
                }
            }
        }

        function getAllGenre(){
            $genre = $this->genreModel->getAllGenre();
            return $genre;
        }

        function filtro(){
            $id = $_POST['id'];
            $filtro = $_POST['filtro'];
            $this->showGenreMusic($id,$filtro);
        }

        function showFormAddSong(){
            $this->view->showFormAddSong($this->genres);
        }

        function addSong(){
            if (!($_SESSION['USER_PERMISSIONS'] == 1)) {
                $this->view->showError('No contiene permiso para realizar esta accion!!!');
            }else{
                if (isset($_REQUEST['nombre']) && !empty($_REQUEST['nombre']) && 
                isset($_REQUEST['artista']) && !empty($_REQUEST['artista']) && 
                isset($_REQUEST['album']) && !empty($_REQUEST['album']) && 
                isset($_REQUEST['anio']) && !empty($_REQUEST['anio']) &&
                isset($_REQUEST['genre']) && $_REQUEST['genre']!="false"){
                        
                    $nombreCancion = $_REQUEST['nombre'];
                    $artista = $_REQUEST['artista'];
                    $album = $_REQUEST['album'];
                    $anio = $_REQUEST['anio'];
                    $genero = $_REQUEST['genre'];

                    if ($_FILES['input_name']['type'] == "image/jpg"  || 
                    $_FILES['input_name']['type'] == "image/jpeg" || 
                    $_FILES['input_name']['type'] == "image/png"){
                        
                        $imagen = $_FILES['input_name']['tmp_name'];
                        $songAdd = $this->model->addSong($nombreCancion,$artista,$album,$anio,$genero,$imagen);  
                        
                    }else{
                        $songAdd = $this->model->addSong($nombreCancion,$artista,$album,$anio,$genero); 
                    }

                    if($songAdd){
                        header("Location:". TABLA . $genero);
                    }
                }
            }
        }
        
        function showModalseeMore($id){

            $infoMusic = $this->model->getDatesOfMusic($id);

            $cancion = $infoMusic->nombreCancion;
            $artista = $infoMusic->artista;
            $album = $infoMusic->album;
            $anio = $infoMusic->anio;
            $imagen = $infoMusic->imagen;
            $id_genero = $infoMusic->id_genero_fk;

            $getGenero = $this->model->getGenero($id);
            $genero = $getGenero->genero;
            $puntajes = [1,2,3,4,5]; 
            $puntajes = array(1 =>"⭐",2=>"⭐⭐",3=>"⭐⭐⭐",4=>"⭐⭐⭐⭐",5=>"⭐⭐⭐⭐⭐");
            if($infoMusic){
                $this->view->showMoreInfoMusic($cancion,$artista,$album,$anio,$genero,$imagen,$id_genero,$puntajes,$id);
            }
        }
    }
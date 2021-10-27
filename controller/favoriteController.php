<?php
     require_once('model/favoriteModel.php');
     require_once('view/favoriteView.php');
     require_once('view/musicView.php');
     require_once('model/musicModel.php');
     require_once('model/genreModel.php');
     require_once ('helpers/auth.helper.php');

class favoriteController{

    private $favoriteView;
    private $favoriteModel;
    private $genreModel;
    private $musicView;
    private $musicModel;
    private $authHelper;

    function __construct(){
        $this->favoriteView = new favoriteView();
        $this->favoriteModel = new favoriteModel();
        $this->genreModel = new genreModel();
        $this->musicModel = new musicModel();
        $this->musicView = new musicView();
        $this->authHelper = new AuthHelper();
    }

    function changeValueFav(){
        if (isset($_REQUEST['musica']) || isset($_REQUEST['genero'])){
            $id = $_REQUEST['musica'];
            $id_genero = $_REQUEST['genero'];
        }
            
        $datesOfMusicId = $this->musicModel->getDatesOfMusic($id);
        foreach ($datesOfMusicId as $date) {
            $genero = $date->id_genero_fk;
            $favorito = $date->favorito;
        }

        if ($favorito == 0) {
            $fav = 1; 
            $this->favoriteModel->changeValueFav($id,$fav);
        }else{
            $fav = 0;
            $this->favoriteModel->changeValueFav($id,$fav);
        }
        
        if($id_genero != 7){
            header("Location:".TABLA . $genero);
        }else{
            header("Location:".TABLA . $id_genero);
        }
    }

    function showTableFav(){
        $fav = 1;
        $favsSongs = $this->favoriteModel->getAllSongsFavs($fav);
        $genres = $this->genreModel->getAllGenre();

        if($favsSongs){
            $this->favoriteView->showTableFavs($favsSongs, $genres);
        }else{
            $this->musicView->showError("No hay ninguna cancion agregada en Favoritos");
        }

    }


}
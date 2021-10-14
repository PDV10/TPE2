<?php
     require_once('model/favoriteModel.php');
     require_once('view/favoriteView.php');
     require_once('view/musicView.php');
     require_once('model/musicModel.php');
     require_once ('helpers/auth.helper.php');

class favoriteController{

    private $favoriteView;
    private $favoriteModel;
    private $musicModel;
    private $authHelper;

    function __construct(){
        $this->favoriteView = new favoriteView();
        $this->favoriteModel = new favoriteModel();
        $this->musicModel = new musicModel();
        $this->authHelper = new AuthHelper();
    }

    function changeValueFav(){
        if(isset($_POST['id_musica']) && isset($_POST['id_genero'])){
            $id = $_POST['id_musica'];
            $id_genero = $_POST['id_genero'];
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
            header("Location:".TABLA . $id_genero);
        }else{
            header("Location:".TABLA . $id_genero);
        }
        
    }


}
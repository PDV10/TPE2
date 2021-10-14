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
        
            $id = $_REQUEST['musica'];
            $id_genero = $_REQUEST['genero'];

        $datesOfMusicId = $this->musicModel->getDatesOfMusic($id);
        foreach ($datesOfMusicId as $date) {
            $genero = $date->id_genero_fk;
            $favorito = $date->favorito;
        }

        if ($favorito == 0) {
            $fav = 7; 
            $this->favoriteModel->changeValueFav($id,$fav);
        }else{
            $fav = 0;
            $this->favoriteModel->changeValueFav($id,$fav);
        }
        
        if($id_genero != 7){
            header("Location:".TABLA . $genero);
        }else{
            header("Location:".TABLA . 7);
        }
        
    }


}
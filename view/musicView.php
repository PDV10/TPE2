<?php
    require_once('libs/lib/smarty-3.1.39/libs/Smarty.class.php');
    
class musicView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome($genre){
        $this->smarty->assign("genres", $genre);
        $this->smarty->display("templates/showHome.tpl");
    }

    function showTable($musicForGenre,$genre, $id, $tablaTodos){
        $this->smarty->assign("genres", $genre);
        $this->smarty->assign("id", $id);
        $this->smarty->assign("genero", $tablaTodos);
        $this->smarty->assign("musicForGenre", $musicForGenre);
        $this->smarty->display("templates/showTable.tpl");
    }

    function showLogin($msg){
        $this->smarty->assign("msg", $msg);
        $this->smarty->display("templates/showError.tpl");
    }

    function musicUpdate($nombre,$artista,$album,$anio,$genres,$imagen,$id){
        $this->smarty->assign("nombre", $nombre);
        $this->smarty->assign("artista", $artista);
        $this->smarty->assign("album", $album);
        $this->smarty->assign("anio", $anio);
        $this->smarty->assign("genres", $genres);
        $this->smarty->assign("imagen", $imagen);
        $this->smarty->assign("id", $id);
        $this->smarty->display("templates/updateMusic.tpl");
    }

    function showFormAddSong($genres){
        $this->smarty->assign("genres", $genres);
        $this->smarty->display("templates/showFormAddSong.tpl");
    }
    function showError($msg){
        $this->smarty->assign("msg",$msg);
        $this->smarty->display("templates/showError.tpl");
    }

    function showMoreInfoMusic($cancion,$artista,$album,$anio,$genero,$imagen,$id_genero){
        $this->smarty->assign("cancion",$cancion);
        $this->smarty->assign("artista",$artista);
        $this->smarty->assign("album",$album);
        $this->smarty->assign("anio",$anio);
        $this->smarty->assign("genero",$genero);
        $this->smarty->assign("imagen",$imagen);
        $this->smarty->assign("id_genero",$id_genero);
        $this->smarty->display("templates/showMoreInfoMusic.tpl");
    }
}

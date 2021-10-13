<?php
    require_once('libs\lib\smarty-3.1.39\libs\Smarty.class.php');
    
class view{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome($genre){
        $this->smarty->assign("genres", $genre);
        $this->smarty->display("templates/showHome.tpl");
    }

    function showTable($musicForGenre,$genre, $id){
        $this->smarty->assign("genres", $genre);
        $this->smarty->assign("id", $id);
        $this->smarty->assign("musicForGenre", $musicForGenre);
        $this->smarty->display("templates/showTable.tpl");
    }

    function showLogin($msg){
        $this->smarty->assign("msg", $msg);
        $this->smarty->display("templates/showError.tpl");
    }

    function musicUpdate($nombre,$artista,$album,$anio,$genres,$id){
        $this->smarty->assign("nombre", $nombre);
        $this->smarty->assign("artista", $artista);
        $this->smarty->assign("album", $album);
        $this->smarty->assign("anio", $anio);
        $this->smarty->assign("genres", $genres);
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
}

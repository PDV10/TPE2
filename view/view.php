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

    function showTable($musicForGenre,$genre){
        $this->smarty->assign("genres", $genre);
        $this->smarty->assign("musicForGenre", $musicForGenre);
        $this->smarty->display("templates/showTable.tpl");
    }

    function showLogin($msg){
        $this->smarty->assign("msg", $msg);
        $this->smarty->display("templates/showError.tpl");
    }
}

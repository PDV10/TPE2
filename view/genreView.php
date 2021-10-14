<?php
    require_once('libs/lib/smarty-3.1.39/libs/Smarty.class.php');

    class genreView{
        private $smarty;

        function __construct(){
            $this->smarty = new Smarty();
        }
    }
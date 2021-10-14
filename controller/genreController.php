<?php
    require_once('model/genreModel.php');
    require_once('view/genreView.php');
    require_once ('helpers/auth.helper.php');

    class genreController{
        private $view; 
        private $model; 
        private $genre; 
        private $authHelper;

        function __construct(){
            $this->view = new genreView();
            $this->model = new genreModel();
            $this->authHelper = new AuthHelper();
        }

        

    }
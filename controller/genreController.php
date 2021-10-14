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

        function showTableGenre(){
            $genres = $this->model->getAllGenre();
            $this->view->showTableGenre($genres);
        }

        function addNewGenre(){
            if(isset($_REQUEST['newGenre']) && !empty($_REQUEST['newGenre'])){
                $genre = $_REQUEST['newGenre'];
                
                $this->model->addNewGenre($genre);
            }
            header("Location:". GENRE_TABLE);
        }

        function deleteGenre($id){
            $cant = $this->model->validarGenre($id);
            if(empty($cant->cant)){
                $this->model->deleteGenre($id);
                header("Location:". GENRE_TABLE);
            }
        }

        function RenderUpdateGenre($id){
            $genre = $this->model->getOneGenre($id);
            $this->view->RenderUpdateGenre($genre);
        }

        function updateGenre(){
            if(isset($_REQUEST['newGenre']) && !empty($_REQUEST['newGenre'])){
                $id = $_REQUEST['id'];
                $genre = $_REQUEST['newGenre'];
                $itsUpdate = $this->model->updateGenre($id,$genre);

                if($itsUpdate){
                    header("Location:". GENRE_TABLE);
                }
            }
            
        }
    }
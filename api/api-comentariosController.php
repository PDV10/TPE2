<?php
require_once('model/comentariosModel.php');
require_once('api/api-comentariosView.php');

class ApiComentariosController{

    private $comentariosModel;
    private $comentariosView;

    function __construct(){
        $this->comentariosView = new ComentariosView();
        $this->comentariosModel = new ComentariosModel();
    }

    function getAll($params = null){
        if(isset($params[':ID']) && !empty($params[':ID'])){
            $id_cancion = $params[':ID'];
        }
        $comentarios = $this->comentariosModel->getComentsByCancion($id_cancion);
        if($comentarios){
             $this->comentariosView->response($comentarios, 200);
        }else{
            $this->comentariosView->response("not found", 404);
        }
       
    }

    function delete($params = null){
        if(isset($params[':ID']) && !empty($params[':ID'])){
            $id = $params[':ID'];
        }
        // agregar autorizacion por api para permitir eliminar

        $this->comentariosModel->delete($id);
        $eliminado = $this->comentariosModel->getOne($id);
        if($eliminado){
            $this->comentariosView->response($id, 200);
        }else{
            $this->comentariosView->response("not found", 404);
        }
    }

}
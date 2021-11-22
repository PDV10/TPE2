<?php
require_once('model/comentariosModel.php');
require_once('api/api-comentariosView.php');
require_once('view/musicView.php');

class ApiComentariosController{

    private $comentariosModel;
    private $comentariosView;
    private $musicView;

    function __construct(){
        $this->comentariosView = new ComentariosView();
        $this->comentariosModel = new ComentariosModel();
        $this->musicView = new MusicView();
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
        if (!($_SESSION['USER_PERMISSIONS'] == 1)) {
            if(isset($params[':ID']) && !empty($params[':ID'])){
                $id = $params[':ID'];
            }
            // agregar autorizacion por api para permitir eliminar
            $comentario = $this->comentariosModel->getOne($id);
            if(!empty($comentario)){
                $this->comentariosModel->delete($id);
                $comentario = $this->comentariosModel->getOne($id);
                if(empty($comentario)){
                    $this->comentariosView->response($id, 200);
                }else{
                    $this->comentariosView->response("No se pudo eliminar el comentario", 404);
                }
            }else{
                $this->comentariosView->response("Comentario no encontrado", 404);
            }
        }else{
            $this->musicView->showError('Este usuario no tiene permisos para realizar esta accion');
        }
    }

    private function getBody() {
        $data = file_get_contents("php://input");
        return json_decode($data);
    }


    function add($params = null){
        $data = $this->getBody();

        
    }
}
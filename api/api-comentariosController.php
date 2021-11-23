<?php
require_once('model/comentariosModel.php');
require_once('api/api-comentariosView.php');
require_once('view/musicView.php');

class ApiComentariosController{

    private $comentariosModel;
    private $comentariosView;
    private $musicView;
    private $data;

    function __construct(){
        $this->comentariosView = new ComentariosView();
        $this->comentariosModel = new ComentariosModel();
        $this->musicView = new MusicView();
       
    }

    private function getData() {
        $data = file_get_contents("php://input");
        return json_decode($data);
    }

    function getAll($params = null){
        if(isset($params[':ID']) && !empty($params[':ID'])){
            $id_cancion = $params[':ID'];
        }
        $comentarios = $this->comentariosModel->getComentsByCancion($id_cancion);
        if(!empty($comentarios)){
             $this->comentariosView->response($comentarios, 200);
        }else{
            $this->comentariosView->response("not found", 204);
        }  
    }

    function order($params = null){
        if(isset($params[':ORDER']) && !empty($params[':ORDER']) && isset($params[':ID']) && !empty($params[':ID']) ){
            $id = $params[':ID'];
            if($params[':ORDER'] == "DESC"){
                $order = "DESC";
                $comentsOrderByDESC = $this->comentariosModel->order($id,$order);
                if(!empty($comentsOrderByDESC)){
                    $this->comentariosView->response($comentsOrderByDESC, 200);
                }else{
                    $this->comentariosView->response("no se pudo realizar el ordenamiento correctamente", 404);
                }
            }else{
                $order = "ASC";
                $comentsOrderByASC = $this->comentariosModel->order($id,$order);
                if(!empty($comentsOrderByASC)){
                    $this->comentariosView->response($comentsOrderByASC, 200);
                }else{
                    $this->comentariosView->response("no se pudo realizar el ordenamiento correctamente", 404);
                }
            }
        }
    }

    function delete($params = null){
        /* if (isset($_SESSION['USER_PERMISSIONS']) && ($_SESSION['USER_PERMISSIONS'] == 1)) {  */
            if(isset($params[':ID']) && !empty($params[':ID'])){
                $id = $params[':ID'];
            }

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
          /* }else{
           $this->comentariosView->response("Sin permisos", 204);
        }  */
    }


    function add($params = null){
        //permisos
       // if($_SESSION['USER_ID']){
            $data = $this->getData();
            $idComentario = $this->comentariosModel->addComent($data->comentario,$data->puntaje,$data->id_cancion);
            $comentario = $this->comentariosModel->getOne($idComentario);
            if(!empty($comentario)){
                $this->comentariosView->response($comentario);
            }else{
                $this->comentariosView->response("not found", 404);
            }
        /*else{
            $this->view->showError("usuario no permitido");
        }*/
    }
}
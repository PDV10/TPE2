<?php
    require_once('model/userModel.php');
    require_once('view/view.php');
    class userController{
        private $userModel;
        private $view;

        function __construct(){
            $this->userModel=new userModel();
            $this->view=new view();
        }

        public function login() {
            if (!empty($_POST['user']) && !empty($_POST['password'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];

                // Obtengo el usuario de la base de datos
                $user = $this->userModel->getUser($user);

                // Si el user$user existe y las contraseñas coinciden
                if ($user && password_verify($password, $user->contraseña)) {
                    // armo la sesion del user$user
                    header("Location: " . BASE_URL);
                } else {
                    $this->view->showLogin("Usuario o contraseña inválida");
                }
            }
        }
    }
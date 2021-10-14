<?php
    require_once('model/userModel.php');
    require_once('view/musicView.php');
    require_once 'helpers/auth.helper.php';

    class userController{
        private $userModel;
        private $view;
        private $authHelper;

        function __construct(){
            $this->userModel=new userModel();
            $this->view=new MusicView();
            $this->authHelper = new AuthHelper();
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
                    $this->authHelper->login($user);
                    header("Location: " . BASE_URL);
                } else {
                    $this->view->showLogin("Usuario o contraseña inválida");
                }
            }else{
                header("Location: " . BASE_URL);
            }
        }

        function logout(){
            $this->authHelper->logout();
        }
    }
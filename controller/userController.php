<?php
    require_once('model/userModel.php');
    require_once('view/musicView.php');
    require_once('view/userView.php');
    require_once 'helpers/auth.helper.php';

    class userController{
        private $userModel;
        private $view;
        private $authHelper;

        function __construct(){
            $this->userModel=new userModel();
            $this->view=new userView();
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

        public function register(){
            if (!empty($_POST['user']) && !empty($_POST['password'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];


                // Consulto si el usuario existe      ¯\_( ͡ಠ - ͡ಠ)_/¯
                $loged = $this->userModel->getUser($user);
                if (!empty($loged)) {
                    $this->view->showLogin("Éste usuario ya está registrado!!!");
                }else{

                // Registro al usuario                  \( ͡ಠ ͜ʖ ͡ಠ)/
                  $this->userModel->register($user,$password);
                  $loged = $this->userModel->getUser($user);

                // Genero la session al usuario         \( ͡ᵔ ͜ʖ ͡ᵔ)/
                  $this->authHelper->login($loged);
                  header("Location: " . BASE_URL);
                }


            }else{
                header("Location: " . BASE_URL);
            }
        }

        function showAll(){
            $allUsers = $this->userModel->showAll();

            if (!empty($allUsers)) {
                $this->view->showAllUsers($allUsers);
            }
        }

        function logout(){
            $this->authHelper->logout();
        }

    }
<?php

class AuthHelper {
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    public function login($user) {
        $_SESSION['USER_ID'] = $user->id_usuario;
        $_SESSION['USER_EMAIL'] = $user->usuario;
        $_SESSION['USER_PERMISSIONS'] = $user->permiso;

        if ($user->permiso == 1) {
            $_SESSION['USER_ADMIN'];
        }
    }

    function logout() {
        session_destroy();
        header("Location: ". BASE_URL);
    } 
}
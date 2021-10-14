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
    }

    function logout() {
        session_destroy();
        header("Location: ". BASE_URL);
    } 
}
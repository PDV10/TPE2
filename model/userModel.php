<?php
    class userModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica_tpe;charset=utf8', 'root', '');
        }

        function getUser($user){
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?');
            $query->execute([$user]);
            return $query->fetch(PDO::FETCH_OBJ);
        }
        
        function register($user,$password){
            $query = $this->db->prepare('INSERT INTO `usuarios` (`usuario`, `contraseña`) VALUES (?,?)');

            $query->execute([$user,$password]);
        }

        function showAll(){
            $query = $this->db->prepare(
                'SELECT * FROM `usuarios`');
                $query->execute([]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }
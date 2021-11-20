<?php

    class ComentariosModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica_tpe;charset=utf8', 'root', '');
        }

        function getComentsByCancion($id_cancion){
            $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_cancion = ?');
            $query->execute([$id_cancion]);
            return $query->fetchAll(PDO::FETCH_OBJ); 
        }

        function delete($id){
            $query = $this->db->prepare('DELETE * FROM comentarios WHERE id_comentarios = ?');
            $query->execute([$id]);
        }

        function getOne($id){
            $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentarios = ?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ); 
        }
    }
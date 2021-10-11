<?php
    class musicModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_musica_tpe;charset=utf8', 'root', '');
        }
        
        function getAllGenre(){
            $query = $this->db->prepare('SELECT * FROM generos');
            $query->execute([]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function musicForGenre($genre){
            $query = $this->db->prepare(
           'SELECT m.*
            FROM musica m
            INNER JOIN generos g
            ON m.id_genero_fk = g.id
            WHERE m.id_genero_fk = ?');
            $query->execute([$genre]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        function delete($id){
            $query = $this->db->prepare(
           'DELETE m.*
            FROM musica m
            INNER JOIN generos g
            WHERE m.id_musica = ?');
            $query->execute([$id]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function getDatesOfMusic($id){
            $query = $this->db->prepare(
           'SELECT m.*
            FROM musica m
            INNER JOIN generos g
            WHERE m.id_musica = ?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function updateMusic($nombre,$artista,$album,$anio,/* $genre, */$id){
            $query = $this->db->prepare(
           'UPDATE m
            FROM musica m
            INNER JOIN generos g 
            SET nombreCancion = ?, artista = ?, album = ?, anio = ?, 
            WHERE m.id_musica = ?');
            $query->execute([$nombre,$artista,$album,$anio,/* $genre, */$id]);
        }

    }    
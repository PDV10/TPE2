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

        function getOneSong($id){
            $query = $this->db->prepare(
           'SELECT m.id_genero_fk AS id, m.*
            FROM musica m
            INNER JOIN generos g
            ON m.id_genero_fk = g.id
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

        function updateMusic($nombre,$artista,$album,$anio,$genre,$id){
            $query = $this->db->prepare(
            'UPDATE musica m
            INNER JOIN generos g 
            ON m.id_genero_fk = g.id
            SET nombreCancion = ?, artista = ?, album = ?, anio = ?, id_genero_fk = ? 
            WHERE m.id_musica = ?');
            $query->execute([$nombre,$artista,$album,$anio,$genre,$id]);
        }

        function filtrar($genero, $filtrado){
            $query = $this->db->prepare(
           'SELECT m.*, g.genero
            FROM musica m
            INNER JOIN generos g
            ON m.id_genero_fk = g.id
            WHERE g.id = ? && (m.nombreCancion LIKE ? || m.artista LIKE ? || m.album LIKE ? || m.anio LIKE ?)');
            $filtro = $query->execute([$genero,$filtrado.'%',$filtrado.'%',$filtrado.'%',$filtrado.'%']);

            if($filtro){
                return $query->fetchAll(PDO::FETCH_OBJ);
            }else{
                return false;
            }
        }
    }    
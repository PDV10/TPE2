<?php
    class model{
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
    }    
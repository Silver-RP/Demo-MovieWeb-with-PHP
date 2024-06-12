<?php
    class Movie_genre_Model
    {
        private $db;
        private $conn;
        function __construct()
        {
            $this->db = new Database();
            $this->conn = $this->db->conn;
        }
        function getMovie_genre(){
            $sql = "SELECT * FROM movie_genres";
            return $this->db->getAll($sql);
        }
        function getMovieList(){
            $sql = "SELECT * FROM movie_list";
            return $this->db->getAll($sql);
        }
        function getMoviesByGenre($genre_id){
            $sql = "SELECT * FROM movie_list WHERE genre_id = :genre_id";
            return $this->db->getAll($sql, ['genre_id' => $genre_id]);
        }
        public function getMovie_Id($id){
            if($id){
                $sql = "SELECT * FROM movie_list WHERE id = :id";
                return $this->db->getOne($sql, ['id' => $id]);
            }
            return null;
        }
        public function getGenre_Id($movie_id){
            $sql = "SELECT genre_id FROM movie_list WHERE id = $movie_id";
            return $this->db->getOne($sql,['movie_id' => $movie_id]);
        }
        function getGenre_Movie($genre_id, $movie_id){
            $sql ="SELECT * FROM movie_list WHERE genre_id = $genre_id AND id <> :$movie_id";
            return $this->db->getAll($sql);
        }
        function getGenreById($id){
            $sql = "SELECT * FROM movie_genres WHERE id = :id";
            return $this->db->getOne($sql, ['id' => $id]);
        }
        
    }

?>
<?php
    class adminHomeController{
        private $data;
        private $movie_genre_Model;
        public function home(){
            require_once('view/viewMovie.php');
        }

        public function viewMovieGenre(){
            $this->data['Movie_genre_list'] = $this->movie_genre_Model->getMovie_genre();
            $this->viewMovieGenre();
        }
    }
?>
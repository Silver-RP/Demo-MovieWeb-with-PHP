<?php
    class homeController{
        private $movie_genre_Model;
        private $data;
        public function __construct(){
            $this->movie_genre_Model = new  Movie_genre_Model();
        }
        public function view(){
            require_once('app/view/home.php');
        }

        public function home(){
            $this->data['Movie_genre_list'] = $this->movie_genre_Model->getMovie_genre();
            $this->view();
        }

    }
?>
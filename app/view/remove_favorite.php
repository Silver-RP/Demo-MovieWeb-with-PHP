<?php
session_start();
ob_start();

// xoá khỏi yêu thích
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['movie_id'])) {
        $movie_id = $_POST['movie_id'];

        if (isset($_SESSION['favorite_movies']) && !empty($_SESSION['favorite_movies'])) {
            foreach ($_SESSION['favorite_movies'] as $key => $fav_movie) {
                if ($fav_movie['id'] == $movie_id) {
                    unset($_SESSION['favorite_movies'][$key]);
                    header('Location: /../phim/index.php');
                    exit();
                }
            }
        }
    }
}

?>
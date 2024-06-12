<?php
session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['movie_id'])) {
        $movie_id = $_POST['movie_id'];
        $movie_name = $_POST['movie_name'];
        $movie_genre = $_POST['movie_genre'];
        $movie_view = $_POST['movie_views'];
        $movie_img = $_POST['movie_image'];

        if (!isset($_SESSION['favorite_movies'])) {
            $_SESSION['favorite_movies'] = [];
        }

        $movie = [
            'id' => $movie_id,
            'name' => $movie_name,
            'genre' => $movie_genre,
            'view' => $movie_view,
            'img' => $movie_img
        ];

        foreach ($_SESSION['favorite_movies'] as $fav_movie) {
            if ($fav_movie['id'] == $movie_id) {
                header('Location: /../phim/index.php');
                exit();
            }
        }

        $_SESSION['favorite_movies'][] = $movie;
        $_SESSION['noti'][$movie_id] = "Phim đã được thêm vào danh sách yêu thích.";
        header('Location: /../phim/index.php');
        exit();
    }
}
?>

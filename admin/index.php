<?php

require_once '../app/controller/HomeController.php';
require_once('../app/controller/MovieController.php');
require_once('../app/model/database.php');
require_once('../app/model/Movie_genre_Model.php');
require_once('../app/model/users.php');
require_once('../app/model/adminFeature.php');
require_once('controller/adminHomeController.php');
require_once('controller/adminMovieController.php');
require_once('controller/adminGenreController.php');
require_once('controller/adminCommentController.php');
require_once('view/header.php');

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 'genre':
            $genre = new adminGenreController();
            $genre->showGenre();
            break;
        case 'addmoviegenre':
            $genre = new adminGenreController();
            $genre->addGenre();
            break;
        case 'moviebygenre':
            $movie = new adminGenreController();
            $movie->showMovieByGenre();
            break;
        case 'editmoviegenre':
            $genre = new adminGenreController();
            $genre->editGenre();
            break;
        case 'deletemoviegenre':
            $genre = new adminGenreController();
            $genre->deleteGenre();
            break;
        case 'movie':
            $movie = new adminMovieController();
            $movie->showMovie();
            break;
        case 'addmovie':
            $movie = new adminMovieController();
            $movie->addMovie();
            break;
        case 'editmovie':
            $movie = new adminMovieController();
            $movie->editMovie();
            break;
        case 'deletemovie':
            $movie = new adminMovieController();
            $movie->deleteMovie();
            break;
        case 'user':
            $user = new adminMovieController();
            $user->showUsers();
            break;
        case 'comment':
            $comment = new adminCommentController();
            $comment->showComments();
            break;
        case 'deletecomment':
            $comment = new adminCommentController();
            $comment->deleteComment();
            break;
        case 'hidecomment':
            $comment = new adminCommentController();
            $comment->hideComment();
            break;
        case 'openhiddencomment':
            $comment = new adminCommentController();
            $comment->openHiddenComments();
            break;
        default:
            $home = new adminHomeController;
            $home->home();
            break;
    }
} else {
    $home = new adminHomeController;
    $home->home();
}

require_once('view/footer.php');
?>

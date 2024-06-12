<?php
session_start();
ob_start();
// session_destroy();

    require_once('app/controller/HomeController.php');
    require_once('app/controller/MovieController.php');
    require_once('app/model/database.php');
    require_once('app/model/Movie_genre_Model.php');     // render data from database on homepage, 
    require_once('app/model/users.php');                 // render data from database on homepage,
    require_once('app/view/header.php');

     
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        switch($page){
            case 'detail':
                $detail =  new MovieController();
                $detail->viewDetail();
                break;
            
            case 'signup':
                $signup = new MovieController();
                $signup->signup();
                break;

            case 'signin':
                $signin = new MovieController();
                $signin->signing();
                break;
            
            case 'signout':
                session_unset();
                session_destroy();
                header('location: index.php');
                exit();
            
            case 'profile':
                $profile = new MovieController();
                $profile->renderView('profile');
                $profile->updateProfile();
                break;

            case 'movies':
                $movie = new MovieController();
                $movie->renderView('movies');
                break;

            case 'genre':
                $genre = new MovieController();
                $genre->displayMovieByGenre();  // Handle displaying movies by genre
                break;

            default:
                $home = new homeController;
                $home->home();
                break;
        }
        }else{
        $home = new homeController;
        $home->home(); 
        }

    require_once('app/view/footer.php');
?>
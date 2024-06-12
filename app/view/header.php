<?php
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    $sign = '<li class="s"><a href="#">Hello - '. $_SESSION['user']['usernames'] .'</a></li>';
} else { 
    $sign  = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movie Hub</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-EEH3nJ1R0rO8zBswN/mO7wzLdMn+28mqwo+uoOxnpv/sbiXlHdRWu6c8y7IaEoKG" crossorigin="anonymous" />
    <link rel="stylesheet" href="/phim/public/css/style.css" />
    <style>
        .s{
            list-style: none;
        }
        a {
            color: rgb(252, 186, 3);
            text-decoration: none;
            cursor: pointer !important;
        }
    </style>
</head>

<body>
    <header>
        <h1>BHZ Movies</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php?page=movies">Movies</a></li>
                <li><a href="#">TV Shows</a></li>
                <li><a href="#">About</a></li>
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user'] !=""){
                        echo '<li><a href="index.php?page=profile">Your profile</a></li>';
                        echo '<li><a href="index.php?page=signout">Logout</a></li>';

                    }else{
                        echo '<li><a href="index.php?page=signin">Login</a></li>';
                        echo '<li><a href="index.php?page=signup">Signup</a></li>';
                    }
                ?>
            </ul>
        </nav>
        <?php echo "<h1>". $sign . "</h1>"?> 
    </header>
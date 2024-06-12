<?php
$genre = new Movie_genre_Model();
$listcate = $genre->getMovie_genre();
?>

<section class="popular-movies">
    <h2>Tất cả phim</h2>
    <div class="movie-grid">
        <?php
        $movies = new Movie_genre_Model();
        $listmovie = $movies->getMovielist();

        $ht = '';
        foreach ($listmovie as $item) {
            extract($item);
            $ht .= '<div class="movie">
                <img src="/phim/public/upload/' . $image . '" alt="Movie 1" />
                <h3><a href="index.php?page=detail&id=' . $id . '">' . $name . '</a></h3>
                <p>Thể loại: ' .$listcate[$genre_id-1]['name'] . '</p>
                <p>Lượt xem: ' . $views . '</p>
                <form method="post"  action="app/view/favorite_movie.php">
                    <input type="hidden" name="movie_id" value="' . $id . '">
                    <input type="hidden" name="movie_name" value="' . $name . '">
                    <input type="hidden" name="movie_genre" value="' . $genre_id . '">
                    <input type="hidden" name="movie_views" value="' . $views . '">
                    <input type="hidden" name="movie_image" value="' . $image . '">
                    <button type="submit">Yêu thích</button>
                </form>
            </div>';
        }
        echo $ht;
        ?>
    </div>
</section>




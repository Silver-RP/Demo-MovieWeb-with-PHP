<?php
// require_once('app/model/Movie_genre_Model.php');
$movie = new Movie_genre_Model();
$listcate = $movie->getMovie_genre();
$listmovie = $movie->getMovielist();

function new_movie($listmovie)
{
    uasort($listmovie, function ($a, $b) {
        return $b['id'] <=> $a['id'];
    });
    return array_slice($listmovie, 0, 3);
}
function hot_movie($listmovie)
{
    uasort($listmovie, function ($a, $b) {
        return $b['views'] <=> $a['views'];
    });
    return array_slice($listmovie, 0, 3);
}

?>
<section class="hot-genres">
    <h2>THỂ LOẠI</h2>
    <div class="genre-grid">
    <?php
        foreach ($listcate as $item) {
            echo '<div class="genre">';
            echo '<i class="fas fa-fire"></i>';
            echo '<p><a id="a" href="index.php?page=genre&genre_id=' . $item['id'] . '">' . $item['name'] . '</a></p>';
            echo '</div>';
        }
    ?>
    </div>
</section>
<section class="favorite-movies">
    <h2>PHIM MỚI</h2>
    <div class="movie-grid">
        <?php
        $newMovies = new_movie($listmovie);
        $ht = '';
        foreach ($newMovies as $item) {
            extract($item);
            $ht .= '<div class="movie">
                <img src="/phim/public/upload/' . $image . '" alt="Movie 1" />
                <h3><a href="index.php?page=detail&id=' . $id . '">' . $name . '</a></h3>
                <p>Thể loại: ' .  $listcate[$genre_id-1]['name']  . '</p>
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


<section class="popular-movies">
    <h2>PHIM XEM NHIỀU</h2>
    <div class="movie-grid">
        <?php
        $hotmovie = hot_movie($listmovie);
        $ht = '';
        foreach ($hotmovie as $item) {
            extract($item);
            $ht .= '<div class="movie">
                <img src="/phim/public/upload/' . $image . '" alt="Movie 1" />
                <h3><a href="index.php?page=detail&id=' . $id . '">' . $name . '</a></h3>
                <p>Thể loại: ' .  $listcate[$genre_id-1]['name']  . '</p>
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
<section class="favorite-movies">
    <h2>PHIM YÊU THÍCH</h2>
    <div class="movie-grid">
        <?php
            if (isset($_SESSION['favorite_movies']) && !empty($_SESSION['favorite_movies'])) {
                foreach ($_SESSION['favorite_movies'] as $item) {
                    extract($item); // Extract variables from the $item array
                    echo '<div class="movie">
                        <img src="../phim/public/upload/' . $img . '" alt="Movie 1" />
                        <h3><a href="index.php?page=detail&id=' . $id . '">' . $name . '</a></h3>
                        <p>Thể loại: ' .  $listcate[$genre_id-1]['name']  . '</p>
                        <p>Lượt xem: ' . $view . '</p>
                        <form method="post" action="app/view/remove_favorite.php">
                            <input type="hidden" name="movie_id" value="' . $id . '">
                            <button type="submit">Xóa khỏi yêu thích</button>
                        </form>
                    </div>';
                }
            } else {
                echo '<h4>Chưa có phim yêu thích nào.</h4>';
            }
        ?>
    </div>
</section>



</main>
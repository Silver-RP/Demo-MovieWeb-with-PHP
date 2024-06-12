<style>
    section {
        display: flex;
        flex-direction: column;
    }

    .h1 {
        font-size: 30px;
        color: #333;
        margin: 20px 0;
        padding-left: 20px;
        background-color: #d9d8d7;
    }

    .mv {
        display: flex;
        margin: 30px auto;
        gap: 20px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .movie-list {

        justify-content: center;
    }

    .movie {
        width: 320px;
        /* Set a fixed width for each movie container */
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .movie img {
        width: 100%;
        height: 250px;
        object-fit: contain;
        border-radius: 5px;
        background-color: #f0f0f0;
    }

    .movie h3 {
        font-size: 18px;
        margin: 10px 0;
        color: #333;
    }

    .movie p {
        font-size: 14px;
        color: #666;
    }
</style>
<section class="movie-list">
    <?php if (!empty($movies)) :
        if (is_array($movies)) {
            $movie = $movies[0];
        } else {
            $movie = $movies;
        }
        $list = new Movie_genre_Model();
        $genre = $list->getGenreById($movie['genre_id']);
    ?>
        <h1 class="h1"><?= htmlspecialchars($genre['name']) ?></h1><br>
        <div class="mv">
            <?php foreach ($movies as $movie) : ?>
                <div class="movie">
                    <img src="/phim/public/upload/<?= htmlspecialchars($movie['image']) ?>" alt="<?= htmlspecialchars($movie['name']) ?>" />
                    <h3><a href="index.php?page=detail&id=<?= $movie['id'] ?>"><?= htmlspecialchars($movie['name']) ?></a></h3>
                    <p>Thể loại: <?= htmlspecialchars($movie['genre_id']) ?></p>
                    <p>Lượt xem: <?= htmlspecialchars($movie['views']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <p>No movies found for this genre.</p>
    <?php endif; ?>
</section>
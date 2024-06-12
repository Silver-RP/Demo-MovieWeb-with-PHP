<?php
$conn = new database();
$movies_per_page = 10;
$current_page = isset($_GET['pa']) ? (int)$_GET['pa'] : 1;
    //$offset calculates the starting point 
$offset = ($current_page - 1) * $movies_per_page; //This gives us the number of movies to skip before fetching the current page's movies. 
$total_movies_query = $conn->query("SELECT COUNT(*) FROM movie_list");
$total_movies = $total_movies_query->fetchColumn();
$total_pages = ceil($total_movies / $movies_per_page);

$movies_query = $conn->prepare("SELECT * FROM movie_list LIMIT :limit OFFSET :offset");
$movies_query->bindValue(':limit', $movies_per_page, PDO::PARAM_INT);
$movies_query->bindValue(':offset', $offset, PDO::PARAM_INT);
$movies_query->execute();
$movies = $movies_query->fetchAll(PDO::FETCH_ASSOC);
 
$genre= new Movie_genre_Model();
$genre_list = $genre->getMovie_genre();
?>
<style>
    a {
        color: black;
    }
    #fea {
        width: 200px;
        padding-left: 35px;
    }
    form {
        display: inline;
    }
    .pagination-list{
        background-color: #f5f5a2;
        margin-top: 20px;
        border-top: 1px solid #e3e3e3;
        height: 40px;
        padding: 10px;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">MOVIE LIST</h4>
                        <div>
                            <a href="index.php?page=addmovie"><button type="button" class="btn btn-primary">
                                    ADD MOVIE
                                </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Views</th>
                                <th>GenreID</th>
                                <th>Genre</th>
                                <th id="fea">Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($movies as $item) {
                                    extract($item);
                                    $i++;
                                    echo '<tr>';
                                    echo '<td>' . $i . '</td>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td> <a href="index.php?page=detail&id=' . $id . '">' . $name . '</a></td>';
                                    echo '<td><img src="/phim/public/upload/' . $image . '" alt="' . $name . '" height="80px" width="100px"></td>';
                                    echo '<td>' . $views . '</td>';
                                    echo '<td>' . $genre_id . '</td>';
                                    echo '<td>'. $genre_list[$genre_id-1]['name'] .'</td>';
                                    echo '<td> <form method="post" action="index.php?page=editmovie">
                                            <input type="hidden" name="id" value="' . $id . '" readonly>
                                            <input type="hidden" name="name" value="' . $name . '">
                                            <input type="hidden" name="description" value="' . $description . '">
                                            <input type="hidden" name="genre_id" value="' . $genre_id . '">
                                            <input type="hidden" name="views" value="' . $views . '">
                                            <input type="hidden" name="image" value="' . $image . '">
                                            <button type="submit" class="btn btn-primary" name="edit"> Edit </button>
                                            </form>
                                            <form method="post" action="index.php?page=deletemovie" onsubmit="return deleteConfirmation()">
                                                <input type="hidden" name="id" value="' . $id . '">
                                                <button type="submit" class="btn btn-primary" name="delete">Delete</button>
                                            </form>
                                          </td>';

                                    echo '</tr>';
                                }
                                ?>

                            </tbody>
                        </table>

                    </div>
                    <div class="pagination-list">
                        <?php if ($current_page > 1) : ?>
                            <li class="pagination-item">
                                <a class="pagination-link" href="?pa= <?= $current_page - 1 ?> ">&laquo; Previous</a>
                            </li>
                        <?php endif; ?>
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="pagination-item">
                                <a class="pagination-link" href="?pa=<?=$i?>"> <?= $i ?> </a>
                            </li>
                        <?php endfor; ?>
                        <?php if ($current_page < $total_pages) : ?>
                            <li class="pagination-item" >
                                <a class="pagination-link" href="?pa= <?= $current_page + 1 ?> ">Next &raquo;</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function deleteConfirmation() {
            if (confirm("Are you sure you want to delete?")) {
                return true;
            }
            return false;
        }
    </script>
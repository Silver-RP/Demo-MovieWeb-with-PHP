<?php
$movies = new Movie_genre_Model();
$movie = $movies->getMoviesByGenre($_GET['id']);
$genre = $movies->getGenreById($_GET['id']);
?>
<style>
    .bold{
        font-weight: bolder;
    }
    .de{
        color: black;
    
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Danh mục các phim: <span class="bold"><?php echo $genre['name']; ?></span> </h4>
                        <div>
                            <a href="index.php?page=addmovie"><button type="button" class="btn btn-primary">
                                    Thêm phim
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
                                <th>Genre</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($movie as $item) {
                                    extract($item);
                                    $i++;
                                    echo '<tr>';
                                    echo '<td>' . $i . '</td>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td> <a class="de" href="index.php?page=detail&id=' . $id . '">' . $name . '</a></td>';
                                    echo '<td><img src="/phim/public/upload/' . $image . '" alt="' . $name . '" height="80px" width="100px"></td>';
                                    echo '<td>' . $views . '</td>';
                                    echo '<td>' . $genre_id . '</td>';
                                    echo '<td><a href="edit.php?id=' . $id . '">Sửa</a> | <a href="delete.php?id=' . $id . '">Xóa</a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <ul class="pagination-list">
                        <li class="pagination-item">
                            <a href="" class="pagination-link">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">1</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">2</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">3</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">...</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">10</a>
                        </li>
                        <li class="pagination-item">
                            <a href="" class="pagination-link">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
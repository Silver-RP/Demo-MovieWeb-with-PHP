<?php
$movies = new Movie_genre_Model();
$listcate = $movies->getMovie_genre();
?>
<style>
    .content {
        font-size: large;
    }
    a{
        color: black;
    
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">MOVIE GENRE</h4>
                        <div>
                            <a href="index.php?page=addmoviegenre"><button type="button" class="btn btn-primary">
                                    ADD MOVIE GENRE
                                </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Note</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($listcate as $item) {
                                    extract($item);
                                    $i++;
                                    echo '<tr>';
                                    echo '<td>' . $i . '</td>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td><a href="index.php?page=moviebygenre&id=' . $id . '">'.$name.'</a> </a></td>';
                                    echo '<td>'.$note.'</td>';
                                    echo '<td><a href="index.php?page=editmoviegenre&id=' . $id . '&name='.$name.'&note='.$note.'">Edit</a> | 
                                              <a href="index.php?page=deletemoviegenre&id=' . $id . '"onclick="return deleteConfirmation()">Delete</a></td>';
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
    <script>
        function deleteConfirmation() {
            if (confirm("Are you sure you want to delete?")) {
                return true;
            }
            return false;
        }
    </script>
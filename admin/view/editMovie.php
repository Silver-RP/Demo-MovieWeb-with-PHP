<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $views = $_POST['views'];
    $image = $_POST['image'];
    $genre_id = $_POST['genre_id'];

    $movie = [
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'views' => $views,
        'image' => $image,
        'genre_id' => $genre_id
    ];
    // return $movie;
}
    $genre_list = new Movie_genre_Model();
    $genre_list = $genre_list->getMovie_genre();
?>

<style>
    .content {
        font-size: large;
    }

    a {
        color: black;

    }

    input {
        width: 90%;
        height: 30px;
    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit phim</h4>
                        <div>
                            <a href="index.php?page=addmovie"><button type="button" class="btn btn-primary">
                                    Add Movie
                                </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" action="" enctype="multipart/form-data">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Views</th>
                                        <th>Genre</th>
                                        <th>Description</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="id" value="<?php echo isset($movie['id']) ? $movie['id'] : ''; ?>" readonly></td>
                                        <td><input type="text" name="name" value="<?php echo isset($movie['name']) ? $movie['name'] : ''; ?>"></td>
                                        <td>
                                            <input type="file" name="image" value=""><?php echo isset($movie['image']) ? $movie['image'] : ''; ?>
                                        </td>
                                        <p>Current image: </p>
                                        <img src="/phim/public/upload/<?php echo isset($movie['image']) ? $movie['image'] : ''; ?>" alt="Con nhot image" style="width: 300px; height: 160px;" >

                                        <td><input type="text" name="views" value="<?php echo isset($movie['views']) ? $movie['views'] : ''; ?>"></td>
                                        <td>
                                            <select name="genre_id">
                                            <?php
                                                foreach ($genre_list as $genre) {
                                                    $selected = ($genre['id'] == $movie['genre_id']) ? 'selected' : '';
                                                    echo '<option value="' . htmlspecialchars($genre['id']) . '" ' . $selected . '>' . htmlspecialchars($genre['name']) . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td><textarea name="description"><?php echo isset($movie['description']) ? $movie['description'] : ''; ?></textarea></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary" name="editmovie">Sửa</button>
                                            <a href="index.php?page=movie" class="btn btn-secondary">Huỷ</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
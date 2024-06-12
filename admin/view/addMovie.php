<?php
$list = new Movie_genre_Model();
$listcate = $list->getMovie_genre();
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thêm sản phẩm</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" enctype="multipart/form-data">
                            <label for="">Thể loại phim</label>
                            <select name="genre_id" id="cate" class="form-control">
                                <?php
                                foreach ($listcate as $cate) {
                                    echo "<option value='$cate[id]'>$cate[name]</option>";
                                }
                                ?>
                            </select>
                            <label for="">Tên phim</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <label for="">Mô tả</label>
                            <input type="text" name="description" id="description" class="form-control">
                            <label for="">Số lượt xem</label>
                            <input type="number" name="views" id="views" class="form-control">
                            <label for="">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            <input type="submit" name="addmovie" value="Thêm phim">
                        </form>
                    </div>

            </div>
        </div>
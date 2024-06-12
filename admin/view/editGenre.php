<style>
    .content {
        font-size: large;
    }

    a {
        color: black;

    }
</style>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Thể loại phim</h4>
                        <div>
                            <a href="index.php?page=addmoviegenre"><button type="button" class="btn btn-primary">
                                    Thêm thể loại phim
                                </button></a>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <form method="post" action="">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Note</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="id" value="<?php echo htmlspecialchars($_GET['id']); ?>" readonly></td>
                                        <td><input type="text" name="gname" value="<?php echo htmlspecialchars($_GET['name']); ?>"></td>
                                        <td><textarea name="gnote"><?php echo htmlspecialchars($_GET['note'] ?? ''); ?></textarea></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary" name="edit">Sửa</button>
                                            <a href="index.php?page=genre" class="btn btn-secondary">Huỷ</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
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
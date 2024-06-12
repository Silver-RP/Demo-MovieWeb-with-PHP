<?php
    $users = new Users();   
    $data = $users->getAllUser();

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
                        <h4 class="title">USER LIST</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>PhoneNumber</th>
                                <th>Role</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($data as $user) {
                                    extract($user);
                                    $i++;
                                    echo '<tr>';
                                    echo '<td>' . $i . '</td>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td>' . $usernames . '</td>';
                                    echo '<td>' . $email . '</td>';
                                    echo '<td>' . $phoneNumber . '</td>';
                                    echo '<td>' . $roles . '</td>';
                                    echo '<td><a href="edit.php?id=' . $id . '">Edit</a> | <a href="delete.php?id=' . $id . '">Delete</a></td>';
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
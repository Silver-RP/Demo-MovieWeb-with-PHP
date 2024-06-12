<?php
$cmt = new adminFeature();
$cmts = $cmt->getComments();
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
                        <h4 class="title">COMMENTS</h4>
                       
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>STT</th>
                                <th>ID</th>
                                <th>UserId</th>
                                <th>MovieId</th>
                                <th>Comment</th>
                                <th>Time</th>
                                <th>Chức năng</th>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($cmts as $item) {
                                    extract($item);
                                    $i++;
                                    echo '<tr>';
                                    echo '<td>' . $i . '</td>';
                                    echo '<td>' . $id . '</td>';
                                    echo '<td>' . $user_id . '</td>';
                                    echo '<td>' . $movie_id . '</td>';
                                    echo '<td>' . $content . '</td>';
                                    echo '<td>' . $created_at . '</td>';
                                    if ($status == 0) {
                                        echo '<td><a href="index.php?page=hidecomment&id=' . $id . '">Hide</a> | 
                                              <a href="index.php?page=deletecomment&id=' . $id . '"onclick="return deleteConfirmation()">Delete</a></td>';
                                    } else {
                                        echo '<td><a href="index.php?page=openhiddencomment&id=' . $id . '">Show</a> | 
                                              <a href="index.php?page=deletecomment&id=' . $id . '"onclick="return deleteConfirmation()">Delete</a></td>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

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
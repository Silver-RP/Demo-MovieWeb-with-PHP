<?php
    $movie_id = $_GET['id']; 
    $db = new Database();
    $stmt = $db->prepare  ("SELECT comments.content, comments.created_at, users.usernames 
                            FROM comments JOIN users ON comments.user_id = users.id 
                            WHERE comments.movie_id = :movie_id AND comments.status = 0
                            ORDER BY comments.created_at DESC");
    $stmt->execute(['movie_id' => $movie_id]);
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<style>
    textarea {
        padding: 5px;        
        margin-bottom: 10px;
    }
    .cmts{
        margin-top: 20px;
        border: 1px solid #ddd;
        padding-left: 10px;
        background-color: #f9f9f9;
    }
    .comments {
        margin-top: 20px;
    }

    .comment {
        border-bottom: 1px solid #ddd;
        padding: 10px 10px;
        background-color: beige;
    }

    .comment p {
        margin: 5px 0;
    }

    .comment strong {
        color: #007BFF;
    }
</style>
<section class="popular-movies">
    <h2>Chi tiết phim</h2>
    <div class="movie-grid">
        <div class="movie">
            <img src="/phim/public/upload/<?= $image ?>" alt="Movie 3" />
            <h3><?= $name ?></h3>
            <p>Thể loại: <?= $genre_id ?></p>
            <p>Lượt xem: <?= $views ?></p>
        </div>
    </div>
</section>
<section class="cmts">
    <h2>Bình luận</h2>
    <form action="" method="post">
        <textarea name="comment" id="comment" cols="60" rows="5" placeholder="Nhập bình luận của bạn ở đây"></textarea>
        <input type="submit" name="cmt" value="Gửi">
    </form>
    <div class="comments">
        <?php if ($comments): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <p><strong><?= htmlspecialchars($comment['usernames']) ?></strong> (<?= $comment['created_at'] ?>):</p>
                    <p><?= htmlspecialchars($comment['content']) ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có bình luận nào.</p>
        <?php endif; ?>
    </div>
</section>

<style>
    section {
        background-color: #f8fff6;
        padding: 20px;
        margin: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: left;
    }

    section h2 {
        text-align: center;
        color: #333;
        font-size: 28px;
        margin-bottom: 20px;
    }

    section label {
        display: block;
        color: #333;
        font-size: 16px;
        margin-bottom: 5px;
    }

    section input[type="text"],
    section input[type="password"],
    section input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 20px;
    }

    section input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        width: 40%;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    section input[type="submit"]:hover {
        background-color: #0056b3;
    }

    section a {
        color: #007BFF;
        text-decoration: none;
    }

    section a:hover {
        text-decoration: underline;
    }

    p.message {
        text-align: center;
        color: red;
        font-size: 16px;
    }
</style>

<?php
$model = new MovieController();
$profile = $model->viewProfile();

if ($profile) {
    echo '<section>';
    echo '<h2>Thông tin cá nhân</h2>';
    echo 
    '<form action="" method="post">
        <label for="usernames">Tên đăng nhập</label>
        <input type="text" name="usernames" placeholder="Tên đăng nhập" value="'.htmlspecialchars($profile['usernames']).'">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" value="'.htmlspecialchars($profile['email']).'">
        <label for="phoneNumber">Số điện thoại</label>
        <input type="text" name="phoneNumber" placeholder="Số điện thoại" value="'.htmlspecialchars($profile['phoneNumber']).'">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="********">
        <input type="hidden" name="id" value="'.htmlspecialchars($profile['id']).'">
        <input type="submit" name="update" value="Cập nhật">
    </form>';
    echo '</section>';
} else {
    echo '<p class="message">User session not found. Please <a href="index.php?action=signin">sign in</a>.</p>';
}
?>

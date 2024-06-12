
<style>
    form {
            background-color: rgb(227, 221, 220);
            padding: 20px;
            padding: 0 auto;
            margin: 10px auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #CCCCCC;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        form input[type="submit"]:hover {
            background-color: wheat;
        }

        form p {
            text-align: center;
            margin-top: 15px;
        }

        form p a {
            color: #303331;
            text-decoration: none;
        }

        form p a:hover {
            text-decoration: underline;
            color: #626964;
        }
</style>
<section>
    
    <form method="post" action="">
    <h2>Đăng ký</h2>
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="phone">Số điện thoại</label>
        <input type="text" name="phone" id="phone" required>
        <button type="submit" name = "sub">Đăng ký</button>
        <p>Bạn đã có tài khoản? <a href="index.php?page=signin">Đăng nhập</a></p>
        <?php
            if(isset($_SESSION['er'])){
                echo '<p style="color: red;">' . htmlspecialchars($_SESSION['er']) . '</p>';
                unset($_SESSION['er']);
            }
        ?>
    </form>
    
</section>
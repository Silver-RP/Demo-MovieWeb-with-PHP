
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
        form input[type="password"] {
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
    <form action="" method="post">
        <h2>Đăng nhập</h2>
        <label for="username">Tên đăng nhập</label>
        <input type="text" name="username" id="username" /> <br>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" id="password" /><br>
        <input type="submit" value="Đăng nhập" name="sub">

        <p>Chưa có tài khoản? <a href="index.php?page=signup" style="color: black;">Đăng ký</a></p>
        <?php
            if (isset($_SESSION['erroMes'])){
                $erroMes = $_SESSION['erroMes'];
                echo '<p style="color: red;">' . htmlspecialchars($erroMes) . '</p>';
                unset($_SESSION['erroMes']);
            }
        ?>
    </form>



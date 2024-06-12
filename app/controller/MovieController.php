<?php
// require_once('app/model/Movie_genre_Model.php');

class MovieController
{
    public $data = [];
    public $listmovie = [];
    public $movie;
    public function __construct()
    {
        $movie = new Movie_genre_Model();
        $this->movie = $movie;
        $this->listmovie = $movie->getMovielist();
    }
    public function renderView($view, $data = [])
    {
        extract($this->data);
        $view = 'app/view/' . $view . '.php';
        require_once $view;
    }
    public function viewDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->data = [];
            $m = new Movie_genre_Model();
            $this->listmovie = $m->getMovielist();
            foreach ($this->listmovie as $item) {
                
                if ($item['id'] == $id) {
                    $this->data = $item;
                    $this->renderView('detail', $this->data);
                    // comment handling
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cmt'])){
                        if(isset($_SESSION['user'])){
                            $userId = $_SESSION['user']['id'];
                            $movieId = $_GET['id'];
                            $comment = htmlspecialchars($_POST['comment']);
                            
                            if(!empty($comment)){
                                $db = new Database();
                                $sql = "INSERT INTO comments (user_id, movie_id, content) VALUES (?, ?, ?)";
                                $params = [$userId, $movieId, $comment];
                                $db->query($sql, $params);
                            }
                            echo "<script>window.location = 'index.php?page=detail&id=$id';</script>";
                        }else{
                            echo "<script>alert('Vui lòng đăng nhập để bình luận.');</script>";
                        }
                    }
                    return;
                }
            }
        } else {
            echo "Không tìm thấy phim.";
        }
    }
    public function signing()
    {
        require_once('app/view/signin.php');
        $us = new Users();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['sub'])) {
                $name = $_POST['username'];
                $pass = $_POST['password'];
                $user = $us->getAllUser();

                foreach ($user as $u) {
                    if ($name == $u['usernames'] && password_verify($pass, $u['passwords'])) {
                        $_SESSION['user'] = $u;
                        if ($u['roles'] == 'admin' || $u['roles'] == 'editor') {
                            header('Location: admin/index.php');
                        } else {
                            header('Location: index.php');
                        }
                        exit();
                    }
                }
                $_SESSION['erroMes'] = "Sai tên đăng nhập hoặc mật khẩu.";
                header('Location: index.php?page=signin');
                exit();
            }
        }
    }
    public function signup()
    {
        require_once('app/view/signup.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['sub'])) {
                $name = $_POST['username'];
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $role = 0;

                $user = [
                    'name' => $name,
                    'pass' => $pass,
                    'email' => $email,
                    'phone' => $phone,
                    'role' => $role
                ];
                $userModel = new Users();
                $saveUser = $userModel->insertUser($user);
                // echo '<pre>';
                // print_r($saveUser);
                // echo '</pre>';
                if ($saveUser) {
                    $_SESSION['su'] = "Đăng ký thành công.";
                    $_SESSION['user_login'] = [$name, $pass, $email, $phone, $role];
                    header('Location: index.php?page=signin');
                    exit();
                } else {
                    $_SESSION['er'] = "Đăng ký không thành công.";
                    header('Location: index.php?page=signup');
                    exit();
                }
            }
        }
    }
    public function viewProfile()
    {
        $user = new Users();
        $profile = $user->getUser($_SESSION['user']['id']);
        return $profile;
    }
    public function updateProfile()
    {
        $users = new Users();
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['update'])) {
                $id = $_POST['id'];
                $user = $users->getUser($id);
    
                if ($id && $user) {
                    $name = htmlspecialchars(trim($_POST['usernames']));
                    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
                    $phone = htmlspecialchars(trim($_POST['phoneNumber']));
                    $password = trim($_POST['password']);
    
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        echo "<script>alert('Email không hợp lệ.');</script>";
                        return;
                    }
    
                    $pass = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : $user['passwords'];
    
                    if ($name == $user['usernames'] && $email == $user['email'] && $phone == $user['phoneNumber'] && $pass == $user['passwords']) {
                        echo "<script>alert('Không có gì được thay đổi.');</script>";
                        return;
                    }
    
                    $userData = [
                        'id' => $id,
                        'usernames' => $name,
                        'email' => $email,
                        'phoneNumber' => $phone,
                        'passwords' => $pass
                    ];
    
                    $update = $users->updateUser($userData);
                    if ($update) {
                        echo "<script>alert('Cập nhật thành công.');</script>";
                        echo "<script>window.location = 'index.php?page=profile';</script>";
                    } else {
                        echo "<script>alert('Cập nhật không thành công.');</script>";
                    }
                } else {
                    echo "<script>alert('User session not found. Please sign in.');</script>";
                    echo "<script>window.location = 'index.php?action=signin';</script>";
                }
            }
        }
    }
    public function displayMovieByGenre()
    {
        if (isset($_GET['genre_id'])) {
            $genre_id = $_GET['genre_id'];
            $listmovie = $this->movie->getMoviesByGenre($genre_id);
            // echo '<pre>';
            // print_r($listmovie);
            // echo '</pre>';
            $this->data = ['movies' => $listmovie];
            $this->renderView('movieGenre', $this->data);
        }
    }
   
}

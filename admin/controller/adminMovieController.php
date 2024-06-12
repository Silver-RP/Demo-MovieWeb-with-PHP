<?php
class AdminMovieController
{
    private $data = [];
    private $movie;
    private $movi;
    private $conf;
    private $conn;
    public function __construct()
    {
        $movie = new AdminFeature();
        $this->movie = $movie;
        $this->conn = new Database();
        $this->movi = new Movie_genre_Model();
        $this->conf = new adminHomeController();
    }
    public function showMovie()
    {
        $movie_genre_Model = new Movie_genre_Model();
        $data['Movie_list'] = $movie_genre_Model->getMovielist();
        require_once('view/viewMovie.php');
    }
    public function addMovie()
    {

        require_once('view/addMovie.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addmovie'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $genre_id = $_POST['genre_id'];
            $views = $_POST['views'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $targetDir = dirname(__DIR__) . '/../public/upload/';

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }
                $image = $_FILES['image']['name'];
                $targetFilePath = $targetDir . basename($image);
                error_log("Target File Path: " . $targetFilePath);

                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    $imageFilename = basename($image);
                    error_log("File uploaded successfully to: " . $targetFilePath);

                    if (!empty($name) && !empty($genre_id) && !empty($imageFilename)) {
                        $data = [
                            'name' => $name,
                            'description' => $description,
                            'image' => $imageFilename,
                            'genre_id' => $genre_id,
                            'views' => $views
                        ];
                        // $adminFeature = new adminFeature();
                        $result = $this->movie->addMovie($data);
                        if ($result) {
                            echo $_SESSION['success'] = "Thêm thành công";
                        }
                    } else {
                        echo $_SESSION['error'] = "Nhập đầy đủ thông tin";
                    }
                } else {
                    echo $_SESSION['error'] = "Lỗi khi tải lên hình ảnh";
                }
            } else {
                echo $_SESSION['error'] = "Vui lòng chọn hình ảnh hợp lệ";
            }
            require_once('view/addMovie.php');
        }
    }
    // public function addM()
    // {
    //     require_once('view/addMovie.php');
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addmoive'])) {
    //         $data = [];
    //         $data['name'] = $_POST['name'];
    //         $data['description'] = $_POST['description'];
    //         $data['genre_id'] = $_POST['genre_id'];
    //         $data['views'] = $_POST['views'];
    //         $data['image'] = $_FILES['image']['name'];
    //         $file = '../public/upload/' . $data['image'];
    //         move_uploaded_file(($_FILES['image']['tmp_name']), $file);
    //         $this->movie->addMovie($data);
    //     }
    //     // echo '<script>location.href="index.php?page=movie";</script>';
    // }
    
    public function editMovie(){
        require_once('view/editMovie.php');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editmovie'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $genre_id = $_POST['genre_id'];
            $views = $_POST['views'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $imageFilename = $this->uploadImage($_FILES['image']);
                if ($imageFilename) {
                    $data = [
                        'id' => $id,
                        'name' => $name,
                        'description' => $description,
                        'image' => $imageFilename,
                        'genre_id' => $genre_id,
                        'views' => $views
                    ];
                    $result = $this->movie->editMovie($data);
                    if ($result) {
                        $_SESSION['success'] = "Sửa thành công";
                        echo '<script>
                        alert("Sửa thành công");
                        setTimeout(function() {
                            window.location.href = "index.php?page=movie";
                        }, 2000);
                    </script>';
                    }
                } else {
                    $_SESSION['error'] = "Lỗi khi tải lên hình ảnh";
                }
            } else {
                $data = [
                    'id' => $id,
                    'name' => $name,
                    'description' => $description,
                    'genre_id' => $genre_id,
                    'views' => $views
                ];
                $result = $this->movie->editMovie($data);
                if ($result) {
                    echo '<script>
                        alert("Sửa thành công");
                        setTimeout(function() {
                            window.location.href = "index.php?page=movie";
                        }, 2000);
                    </script>';
                } 
            }
        }
        
    }
    private function uploadImage($file)
    {
        $targetDir = dirname(__DIR__) . '/../public/upload/';
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        $targetFilePath = $targetDir . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
            return basename($file['name']);
        }
        return false;
    }
    public function deleteMovie()
    {
        $id = $_POST['id'];
        $data = $this->movi->getMovie_Id($id);
        $file = '../public/upload/' . $data['image'];
        unlink($file);
        $this->movie->deleteMovie($id);
        echo '<script>location.href="index.php?page=movie";</script>';
    }
    public function showUsers()
    {
        $users = new Users();
        $data = $users->getAllUser();
        require_once('view/viewUser.php');
    }
}

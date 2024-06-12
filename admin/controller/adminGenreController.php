<?php
    class adminGenreController{
        private $movie;
        public function __construct(){
            $movie = new adminFeature();
            $this->movie = $movie;
        }
        public function showGenre(){
            $movie_genre_Model = new Movie_genre_Model();
            $data['Movie_genre_list'] = $movie_genre_Model->getMovie_genre();
            require_once('view/viewGenre.php');
        }
        public function addGenre(){
            require_once('view/addGenre.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
                $name = $_POST['gname'];
                $note = $_POST['gnote'];
            
                if (!empty($name)) {
                    $data = [
                        'name' => $name,
                        'note' => $note
                    ];
                    // $movie = new adminFeature();
                    $result = $this->movie->addMovieGenre($data);
            
                    if ($result) {
                        require_once('view/addGenre.php');
                        echo $_SESSION['success'] = "Thêm thành công";
                        
                    } else {
                        echo $_SESSION['error'] = "Thêm thất bại";
                        
                    }
                } else {
                    echo $_SESSION['error'] = "Nhập tên thể loại phim";
                }
            }
            require_once('view/addGenre.php');
        }
        public function editGenre(){
            require_once('view/editGenre.php');
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
                $id = $_POST['id'];
                $name = $_POST['gname'];
                $note = $_POST['gnote'];
            
                if (!empty($name)||!empty($note)) {
                    $data = [
                        'id' => $id,
                        'name' => $name,
                        'note' => $note
                    ];
                    // $adminFeature = new adminFeature();
                    $result = $this->movie->editMovieGenre($data);
            
                    if ($result) {
                        require_once('view/editGenre.php');
                        echo $_SESSION['success'] = "Sửa thành công";
                        echo '<script>
                        alert("Sửa thành công");
                        setTimeout(function() {
                            window.location.href = "index.php?page=genre";
                        }, 1000);
                    </script>';

                        
                    } else {
                        echo $_SESSION['error'] = "Sửa thất bại";
                        
                    }
                } else {
                    echo $_SESSION['error'] = "Không có thông tin được sửa.";
                }
            }
        }
        public function deleteGenre(){
            $id = $_GET['id'];
            $this->movie->deleteMovieGenre($id);
           require_once('view/viewGenre.php');
        }
        public function showMovieByGenre(){
            require_once('view/viewMovieByGenre.php');
        }
    }
           
?>
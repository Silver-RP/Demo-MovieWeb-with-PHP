<?php
    class adminCommentController {
        private $db;
        function __construct(){
            $this->db = new adminFeature();
        }
        public function showComments(){
            require_once('view/showComments.php');
        }
        public function hideComment(){
            $id = $_GET['id'];
            $result = $this->db->hideComment($id);
            if($result){
                echo "
                    <script>alert('Ẩn thành công');
                    setTimeout(function(){
                        location.href='index.php?page=comment';
                    }, 1000);
                    </script>
                ";
            }else{
                echo 'Ẩn thất bại';
            }
        }
        public function openHiddenComments(){
            $result = $this->db->openHiddenComments();
            if($result){
                echo "
                    <script>alert('Mở thành công');
                    setTimeout(function(){
                        location.href='index.php?page=comment';
                    }, 1000);
                    </script>
                ";
            }else{
                echo 'Mở thất bại';
            }
        }
        public function deleteComment(){
            $id = $_GET['id'];
            $result =  $this->db->deleteComment($id);
            if($result){
                echo "<script>location.href='index.php?page=comment';</script>";
            }else{
                echo 'Xóa thất bại';
            }
        }
    }
?>
<?php
 class adminFeature{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        public function addMovieGenre($data){
            $sql = "INSERT INTO movie_genres (name, note) VALUES (:name, :note)";
            $param = [
                'name' => $data['name'],
                'note' => $data['note']
            ];
            return $this->db->insert($sql, $param);
        }
        public function editMovieGenre($data){
            $sql = "UPDATE movie_genres SET name = :name, note = :note WHERE id = :id";
            $param = [
                'name' => $data['name'],
                'note' => $data['note'],
                'id' => $data['id']
            ];
            return $this->db->update($sql, $param);
        }
        public function deleteMovieGenre($id){
            $sql = "DELETE FROM movie_genres WHERE id = :id";
            $param = [
                'id' => $id
            ];
            return $this->db->delete($sql, $param);
        }
        public function addMovie($data){
            $sql = "INSERT INTO movie_list (name, description, views, image, genre_id) VALUES (:name, :description, :views, :image, :genre_id)";
            $param = [
                'name' => $data['name'],
                'description' => $data['description'],
                'views' => $data['views'],
                'image' => $data['image'],
                'genre_id' => $data['genre_id']
            ];
            return $this->db->insert($sql, $param);
        }
        public function editMovie($data){
            $param = [
                'name' => $data['name'],
                'description' => $data['description'],
                'views' => $data['views'],
                'genre_id' => $data['genre_id'],
                'id' => $data['id']
                // 'genre_name' => $data['genre_name']
            ];

            $sql = "UPDATE movie_list SET name = :name, description = :description, views = :views, genre_id = :genre_id";
            if (!empty($data['image'])) {
                $sql .= ", image = :image";
                $param['image'] = $data['image'];
            }
        
            $sql .= " WHERE id = :id";
        
            return $this->db->update($sql, $param);
        }
        public function deleteMovie($id){
            $sql = "DELETE FROM movie_list WHERE id = :id";
            $param = [
                'id' => $id
            ];
            return $this->db->delete($sql, $param);
        }
        public function getComments(){
            $sql = "SELECT * FROM comments";
            return $this->db->getAll($sql);
        }
        public function hideComment($id){
            $sql = "UPDATE comments SET status = 1 WHERE id = :id";
            $param = [
                'id' => $id
            ];
            return $this->db->update($sql, $param);
        }
        public function openHiddenComments(){
            $sql = "UPDATE comments SET status = 0 WHERE status = 1";
            return $this->db->update($sql, []);
        }
        public function deleteComment($id){
            $sql = "DELETE FROM comments WHERE id = :id";
            $param = [
                'id' => $id
            ];
            return $this->db->delete($sql, $param);
        }
 }

?>
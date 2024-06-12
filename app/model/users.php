<?php   
    class Users{
        public $db;
        public function __construct(){
            $this->db = new Database();
        }
        function getAllUser(){
            $sql = "SELECT * FROM users";
            return $this->db->getAll($sql);
        }
        function getUser($id){
            $sql = "SELECT * FROM users WHERE id = :id";
            return $this->db->getOne($sql, ['id' => $id]);
        }
        function insertUser($user){
            $sql = "INSERT INTO users( usernames, passwords , email, phoneNumber, roles)
                 values (:usernames, :passwords , :email, :phoneNumber, :roles)";
            
            $param = [
                'usernames' => $user['name'],
                'passwords' => $user['pass'],
                'email' => $user['email'],
                'phoneNumber' => $user['phone'],
                'roles' => $user['role']
            ];
            return $this->db->insert($sql, $param);
        }
        function updateUser($data){
            $sql = "UPDATE users SET usernames = :usernames, email = :email, phoneNumber = :phoneNumber, passwords = :passwords WHERE id = :id";
            return $this->db->update($sql, $data);
        }
        function deleteUser($id){
            $sql = "DELETE FROM users WHERE id = :id";
            return $this->db->execute($sql, ['id' => $id]);
        }
        function checkUserRole(){
            $sql = "SELECT * FROM users WHERE roles = 'admin' or roles = 'editor'";
            return $this->db->getAll($sql);
        }
    }
?>
<?php
    class UserModel{
        private $conn;
        private $table = 'users';

        public $id;
        public $username;
        public $email;
        public $password;
        public $is_active;

        public function __construct($db){
            $this->conn = $db;
        }

        public function login() {
            $query = "SELECT id, username, email, password, is_active FROM " . $this->table . 
                     " WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->execute();
    
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($stmt->rowCount() > 0) {
                if (password_verify($this->password, $row['password'])) {
                    return [
                        'success' => true,
                        'is_active' => $row['is_active'],
                        'id' => $row['id'],
                        'username' => $row['username']
                    ];
                }
            }
            return ['success' => false];
        }

        public function register(){
            $query = "INSERT INTO " .$this->table . "(username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $this->username = $this->username;
            $this->email = $this->email;
            $this->password = password_hash($this->password, PASSWORD_DEFAULT);

            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function checkUser(){
            $query = "SELECT id FROM " .$this->table . 
                     " WHERE username = :username OR email = :email"; 
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            return $stmt->rowCount() > 0;
        }

        public function list_user_getAll(){
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        public function delete($id){
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        }
    }
?>
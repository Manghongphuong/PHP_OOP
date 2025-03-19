<?php
    class CategoryModel{
        private $conn;
        private $table = "category";

        public $id;
        public $name;
        
        public function __construct($db){
            $this->conn = $db;
        }
        //Lấy tất cả danh mục
        public function getAll(){
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        //Lấy 1 danh mục
        public function getById($id){
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        //Thêm danh mục
        public function create(){
            $query = "INSERT INTO " . $this->table . " (name) VALUES (:name)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            return $stmt->execute();
        }

        //Cập nhật danh mục
        public function update(){
            $query = "UPDATE " . $this->table . " SET name = :name WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            return $stmt->execute();
        }

        //Xóa danh mục
        public function delete($id){
            $query = "DELETE FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>
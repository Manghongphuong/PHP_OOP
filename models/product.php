<?php
    class ProductModel{
        private $conn;
        private $table = "products";

        public $id;
        public $name;
        public $description;
        public $price;
        public $quantity;
        public $images;
        public $category_id;

        public function __construct($db){
            $this->conn = $db;
        }

        //Lấy tất cả sản phẩm
        public function getAll(){
            $query = "SELECT p.*, c.name AS category_name 
                  FROM " . $this->table . " p 
                  LEFT JOIN category c ON p.category_id = c.id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        //Lấy 1 sản phẩm
        public function getById($id) {
            $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        //Thêm sản phẩm
        public function create(){
            $query = "INSERT INTO " .$this->table . " (name, description, price, quantity, images, category_id) 
                                               VALUES (:name, :description, :price, :quantity, :images, :category_id)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":images", $this->images);
            $stmt->bindParam(":category_id", $this->category_id);
            return $stmt->execute();
        }

        //Cập nhật sản phẩm
        public function update(){
            $query = "UPDATE " .$this->table . " SET name = :name, description = :description, price = :price, quantity = :quantity, images = :images, category_id = :category_id WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":images", $this->images);
            $stmt->bindParam(":category_id", $this->category_id);
            return $stmt->execute();
        }

        //Xóa sản phẩm
        public function delete($id){
            $query = "DELETE FROM " .$this->table . " WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
    }
?>
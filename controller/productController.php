<?php
    class productsController{
        private $product;
        private $category;

        public function __construct(){
            $database = new Database();
            $db = $database->getConnection();
            $this->product = new ProductModel($db);
            $this->category = new CategoryModel($db);
        }

        // Hiển thị danh sách sản phẩm
        public function index(){
            $products = $this->product->getAll();
            include('../views/Products/listproduct.php');
        }

        // Hiển thị form thêm sản phẩm
        public function create(){
            $stmt = $this->category->getAll();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include('../views/Products/addproduct.php');
        }

        // Xử lý thêm sản phẩm
        public function store(){
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            $this->product->quantity = $_POST['quantity'];            
            $this->product->category_id = $_POST['category_id'];
            
            // Xử lý hình ảnh
            if (isset($_FILES['images']) && $_FILES['images']['error'] == UPLOAD_ERR_OK) {
                $file = $_FILES['images'];
                $uploadDir = '../uploads/';
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $maxFileSize = 5 * 1024 * 1024; // 5MB

                // Kiểm tra file
                if (!in_array($file['type'], $allowedTypes) || $file['size'] > $maxFileSize) {
                    $this->product->images = null; // Hoặc xử lý lỗi theo cách khác
                } else {
                    $newFileName = uniqid() . '_' . basename($file['name']);
                    $uploadPath = $uploadDir.$newFileName;
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $this->product->images = $uploadPath;
                    } else {
                        $this->product->images = null;
                    }
                }
            } else {
                $this->product->images = null;
            }
            
            $this->product->create();

            $products = $this->product->getAll();
            include('../views/Products/listproduct.php');
        }

        // Hiển thị form chỉnh sửa
        public function edit($id){
            $stmt = $this->category->getAll();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $productid = $this->product->getById($id);
            include('../views/Products/editproduct.php');
        }

        // Xử lý chỉnh sửa
        public function update(){
            $this->product->id = $_POST['id'];
            $this->product->name = $_POST['name'];
            $this->product->description = $_POST['description'];
            $this->product->price = $_POST['price'];
            $this->product->quantity = $_POST['quantity'];            
            $this->product->category_id = $_POST['category_id'];
            
            // Xử lý hình ảnh
            $currentProduct = $this->product->getById($this->product->id); // Lấy sản phẩm hiện tại
            $this->product->images = $currentProduct['images'] ?? null; // Giữ ảnh cũ

            if (isset($_FILES['images']) && $_FILES['images']['error'] == UPLOAD_ERR_OK) {
                $file = $_FILES['images'];
                $uploadDir = '../uploads/';
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $maxFileSize = 5 * 1024 * 1024;

                if (in_array($file['type'], $allowedTypes) && $file['size'] <= $maxFileSize) {
                    $newFileName = uniqid() . '_' . basename($file['name']);
                    $uploadPath = $uploadDir . $newFileName;
                    if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                        $this->product->images = $uploadPath; // Ghi đè ảnh mới
                    }
                }
            }
            
            $this->product->update();

            $products = $this->product->getAll();
            include('../views/Products/listproduct.php');
        }

        // Xóa sản phẩm
        public function delete($id){
            $this->product->delete($id);
            $products = $this->product->getAll();
            include('../views/Products/listproduct.php');
        }
    }
?>
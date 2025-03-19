<?php
    class categoryController{
        private $category;

        public function __construct(){
            $database = new Database();
            $db = $database->getConnection();
            $this->category = new CategoryModel($db);
        }

        //Hiển thị danh sách danh mục
        public function index(){
            $stmt = $this->category->getAll();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
            include('../views/Category/listcate.php');
        }

        //Hiển thị form thêm danh mục
        public function create(){
            include('../views/Category/addcate.php');
        }

        //Xử lý thêm danh mục
        public function store(){
            $this->category->name = $_POST['name'];
            $this->category->create();
            $categories = $this->category->getAll();
            include('../views/Category/listcate.php');
        }

        //Hiển thị form chỉnh sửa
        public function edit($id){
            $cateid = $this->category->getById($id);
            include('../views/Category/editcate.php');
        }

        //Xử lý chỉnh sửa
        public function update(){
            $this->category->id = $_POST['id'];
            $this->category->name = $_POST['name'];
            $this->category->update();
            
            $categories = $this->category->getAll();
            include('../views/Category/listcate.php');
        }

        //Xóa danh mục
        public function delete($id){
            $this->category->delete($id);
            $categories = $this->category->getAll();
            include('../views/Category/listcate.php');
        }
    }
?>
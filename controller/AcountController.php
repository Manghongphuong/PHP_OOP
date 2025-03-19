<?php
    class UserController{
        private $user;

        public function __construct(){
            $database = new Database();
            $db = $database->getConnection();
            $this->user = new UserModel($db);
        }

        public function form_login(){
            include_once "../views/login.php";
        }
        public function form_register(){
            include_once "../views/register.php";
        }

        public function register(){
            $this->user->username = $_POST['username'];
            $this->user->email = $_POST['email'];
            $this->user->password = $_POST['password'];

            if($this->user->checkUser()){
                echo "User đã tồn tại";
            }
            else{
                if($this->user->register()){
                    echo "Register success";
                    include_once "../views/login.php";
                }
                else{
                    echo "Register fail";
                }
            }


        }

        public function login() {
            if (!isset($_POST['username']) || !isset($_POST['password'])) {
                echo "Vui lòng nhập đầy đủ thông tin";
                return;
            }
        
            $this->user->username = trim($_POST['username']);
            $this->user->password = trim($_POST['password']);
        
            $loginResult = $this->user->login();
        
            if ($loginResult['success']) {
                if ($loginResult['is_active'] == 1) {
                    echo "Bạn là người dùng thường, không có quyền truy cập trang quản trị";
                    include_once "../views/login.php";
                } elseif ($loginResult['is_active'] == 0) {
                    echo "Login success - Chào mừng Admin!";
                    session_start();
                    $_SESSION['id'] = $loginResult['id'];
                    $_SESSION['username'] = $loginResult['username'];
                    $_SESSION['is_admin'] = true;
                    header("Location: ../public/index.php");
                    exit;
                } else {
                    echo "Trạng thái tài khoản không hợp lệ";
                }
            } else {
                echo "Login fail - Sai tên đăng nhập hoặc mật khẩu";
                include_once "../views/login.php";
            }
        }

        public function logout() {
            session_start();
            if (isset($_SESSION['user'])) { 
                session_destroy();
                header("Location: ../public/account.php");
                exit;
            } else {
                header("Location: ../public/account.php");
                exit;
            }
        }

        public function list_user(){
            $user = $this->user->list_user_getAll();
            include_once "../views/Users/list_users.php";
        }

        public function delete_User($id){
            $this->user->delete($id);
            $user = $this->user->list_user_getAll();
            include('../views/Users/list_users.php');
        }


    }
?>
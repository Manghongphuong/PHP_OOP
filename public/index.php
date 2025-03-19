<?php 
    include_once ('../config/database.php');
    include_once('../models/category.php');
    include_once('../models/product.php');
    include_once('../models/user.php');
    include_once('../controller/categoryController.php');
    include_once('../controller/productController.php');
    include_once('../controller/AcountController.php');
    include_once('../config/middleware.php');
    
    restrictToAdmin();
    include('../views/home.php');

    $controller_cate = new categoryController();
    $controller_pro = new productsController();
    $controller_user = new UserController();

    if(isset($_GET['action']) && ($_GET['action'] != 'index')){
        $action = $_GET['action'];
        switch ($action){

            // Chức năng danh mục
            case 'list_Category':
                $controller_cate->index();
                break;
            case 'create_Category':
                $controller_cate->create();
                break;
            case 'store_Category':
                $controller_cate->store();
                break;
            case 'edit_Category':
                $controller_cate->edit($_GET['id']);
                break;
            case 'update_Category':
                $controller_cate->update();
                break;
            case 'delete_Category':
                $controller_cate->delete($_GET['id']);
                break;

            // Chức năng sản phẩm
            case 'list_Product':
                $controller_pro->index();
                break;
            case 'create_Product':
                $controller_pro->create();
                break;
            case 'store_Product':
                $controller_pro->store();
                break;
            case 'edit_Product':
                $controller_pro->edit($_GET['id']);
                break;
            case 'update_Product':
                $controller_pro->update();
                break;
            case 'delete_Product':
                $controller_pro->delete($_GET['id']);
                break;

            // Chức năng list user
            case 'list_User':
                $controller_user->list_user();
                break;
            case 'delete_User':
                $controller_user->delete_User($_GET['id']);
                break;

            default:
                include_once('../views/dashboard.php');
                break;
        }

    }else{
        include_once('../views/dashboard.php');
    }
    include ('../views/footer.php');
?>
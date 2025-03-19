<?php
    include_once ('../config/database.php');
    include_once('../models/user.php');
    include_once('../controller/AcountController.php');

    $controller_user = new UserController();

    if(isset($_GET['action']) && ($_GET['action'] != 'account')){
        $action = $_GET['action'];

        switch ($action){
            case 'form_login':
                $controller_user->form_login();
                break;
            case 'form_register':
                $controller_user->form_register();
                break;
            case 'register':
                $controller_user->register();
                break;
            case 'login':
                $controller_user->login();
                break;
            case 'logout':
                $controller_user->logout();
                break;
            
            default:
                include_once('../views/login.php');
                break;
        }
    }
    else{
        include_once('../views/login.php');
    }


?>
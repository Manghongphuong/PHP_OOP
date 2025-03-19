<?php
    function restrictToAdmin() {
        session_start();
        if (!isset($_SESSION['id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
            header("Location: ../public/account.php");
            exit;
        }
    }
?>
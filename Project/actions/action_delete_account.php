<?php 
    require_once('../includes/init.php');
    require_once('../database/user.php');

    $id = $_SESSION['userID'];

    if ($id != null) {
        if (deleteUser($id)) {
            session_destroy();
            header('Location: ../index.php');
        } else {
            $_SESSION['ERROR'] = "Error deleting your account";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        $_SESSION['ERROR'] = "Error deleting your account";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>
<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (($userID = confirmLogin($username, $password)) != -1) {
        setCurrentUser($userID, $username);
        $_SESSION['userinfo'] = getUser($userID);
        header("Location:../pages/tickets.php");
    } else {
        $_SESSION['ERROR'] = 'Incorrect username or password';
        header("Location:".$_SERVER['HTTP_REFERER']."");
    }
?>

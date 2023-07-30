<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $currpassword = $_POST['currpassword'];
    $newpassword = $_POST['password'];

    if (confirmLogin($_SESSION['userinfo']['username'], $currpassword) != -1) {
        if ($name !== null && !empty(trim($name)) && $username !== null && !empty(trim($username)) && $email !== null && !empty(trim($email))) {
            if (updateUserInfo(getUserID(), $name, $username, $email)) {
                setCurrentUser(getUserID(), $username);
                $_SESSION['userinfo'] = getUser(getUserID());

                if ($newpassword !== null && !empty(trim($newpassword))) {
                    if (!updateUserPassword(getUserID(), $newpassword)) 
                        $_SESSION['ERROR'] = "Error updating password";
                }
            } else $_SESSION['ERROR'] = "Error updating user info";
        } else $_SESSION['ERROR'] = "Error updating user info";
    } else $_SESSION['ERROR'] = "Wrong password";

    header("Location:".$_SERVER['HTTP_REFERER']);
?>
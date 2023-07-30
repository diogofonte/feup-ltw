<?php
    require_once('../includes/init.php');
    require_once('../database/user.php');

    $userID = $_POST['id'];
    $user = '';

    if (is_numeric($userID)) {
        $userTemp = getUser($userID);
        $username = $userTemp['username'];
        $role = $userTemp['role'];
        $user = array(
            'id' => $userID,
            'username' => $username,
            'role' => $role,
        );
        if (!deleteUser($userID)) {
            $_SESSION['ERROR'] = "Error deleting user account";
        }
    } else {
        $_SESSION['ERROR'] = "Error deleting user account";
    }

    echo json_encode($user);
?>

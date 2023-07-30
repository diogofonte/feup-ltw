<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");

    $userID = $_POST['userID'];
    $role = strtolower($_POST['role']);
    $user = '';
    
    if (is_numeric($userID)) {
        $userTemp = getUser($userID);
        $username = $userTemp['username'];
        $oldRole = $userTemp['role'];
        if (updateUserRole($userID, $role)) {
            $user = array('id' => $userID, 'username' => $username, 'role' => $role, 'old_role' => $oldRole);
        } else {
            $_SESSION['ERROR'] = "Failed to change role";
        }
    } else {
        $_SESSION['ERROR'] = "failed to change role";
    }
    
    echo json_encode($user);
?>
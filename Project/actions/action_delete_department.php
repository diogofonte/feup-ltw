<?php
    require_once('../includes/init.php');
    require_once('../database/department.php');

    $departmentID = $_POST['id'];
    $department = '';

    if(!is_numeric($departmentID)) {
        $_SESSION['ERROR'] = "Error deleting department";
        

    } else {
        $department = array(
            'name' => getDepartmentName($departmentID),
        );
        if(!deleteDepartment($departmentID)){
            $_SESSION['ERROR'] = "Error deleting department";   
        }
    }

    echo json_encode($department);
?>
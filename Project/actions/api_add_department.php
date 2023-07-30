<?php
    require_once('../includes/init.php');
    require_once('../database/department.php');

    $departmentName = trim($_POST['departmentName']);
    $departmentColor = trim($_POST['departmentColor']);

    // check if already exists
    if (departmentExists($departmentName)) {
        $_SESSION['ERROR'] = 'Department already exists';
        $department = '';
    } else {
        if (addDepartment($departmentName, $departmentColor)) {
            $department = array(
                'id' => getDepartmentID($departmentName),
                'name' => $departmentName,
                'color' => $departmentColor
            );
        }
        else {
            $_SESSION['ERROR'] = 'Error adding department';
            $department = '';
        }
    }

    echo json_encode($department);
?>


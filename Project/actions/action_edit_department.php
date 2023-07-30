<?php
    require_once('../includes/init.php');
    require_once('../database/department.php');
    
    $department = '';
    $departmentID = $_POST['id'];
    $new_name = $_POST['name'];
    $new_color = $_POST['color'];

    
    if(!is_numeric($departmentID)) {
        $_SESSION['ERROR'] = "Error editing hashtag";
    } else {
        $old_department = getDepartment($departmentID);
        if ($new_color == '' || $new_color == '#') {
            $new_color = $old_department['color'];
        }
        if ($new_name != '') {
            if (departmentExists($new_name)) {
                $_SESSION['ERROR'] = 'department already exists';
            } else if(!editDepartment($departmentID, $new_name, $new_color)){
                $_SESSION['ERROR'] = "Error editing department";
            } else {
                $department = array(
                    'id' => $departmentID,
                    'name' => $new_name,
                    'old_name' => $old_department['name'],
                    'color' => $new_color,
                );
            }
        } else {
            $new_name = $old_department['name'];
            if(!editDepartment($departmentID, $new_name, $new_color)){
                $_SESSION['ERROR'] = "Error editing department";
            } else {
                $department = array(
                    'id' => $departmentID,
                    'name' => $new_name,
                    'old_name' => $old_department['name'],
                    'color' => $new_color,
                );
            }
        }
    }

    echo json_encode($department);
?>
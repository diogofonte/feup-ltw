<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");
    require_once("../database/department.php");

    $departmentID = $_POST['departmentID'];
    $agent = $_POST['agent'];
    $agentID = getID($agent);
    $department = '';

    if (!removeAgentDepartment($departmentID, $agentID)) {
        $_SESSION['ERROR'] = "Failed to remove agent";
    } else {
        $department = array(
            'agent' => $agent,
            'name' => getDepartmentName($departmentID),
        );
    }
    
    echo json_encode($department);
?>
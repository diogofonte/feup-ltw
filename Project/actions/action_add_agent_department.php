<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");
    require_once("../database/department.php");

    $departmentID = $_POST['departmentID'];
    $agent = $_POST['agent'];
    $agentID = getID($agent);
    $department = '';

    if (!addAgentDepartment($departmentID, $agentID)) {
        $_SESSION['ERROR'] = "Failed to assign agent";
    } else {
        $agentsByDepartment = getAgentsByDepartment($departmentID);
        $agentsUsers = array();
        foreach ($agentsByDepartment as $agentUser) {
            $agentsUsers[] = getUser(strval($agentUser['agent_id']))['username'];
        }
        $department = array(
            'agents' => $agentsUsers,
            'name' => getDepartmentName($departmentID),
            'id' => $departmentID,
        );
    }
    
    echo json_encode($department);
?>
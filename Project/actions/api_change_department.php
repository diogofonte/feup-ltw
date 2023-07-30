<?php 
    require_once("../includes/init.php");
    require_once("../database/ticket.php");

    $ticketID = $_SESSION['ticketID'];
    $departmentID = $_POST['departmentID'];
    $department = '';

    $previousDepartmentID = getTicketDepartment($ticketID);

    if (updateTicketDepartment($ticketID, $previousDepartmentID, $departmentID)) {
        $department = array(
            'name' => getDepartmentName($departmentID),
            'ticket_update' => getTicketUpdates($ticketID),
        );
    } else {
        $_SESSION['ERROR'] = 'Error changing ticket department';
    }
    
    echo json_encode($department);
?>
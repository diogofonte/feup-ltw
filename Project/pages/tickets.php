<?php
    require_once('../includes/init.php');
    require_once('../database/ticket.php');
    require_once('../database/department.php');

    $userID = getUserID();
    if(!is_numeric($userID)) header('Location:../index.php');

    $tickets = getTicketsByUser($userID);
    $departments = getAllDepartments();

    $control = 'tickets';
    
    require_once('../templates/common/header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/contents/ticket_grid.php');
    require_once('../templates/common/footer.php');
    
    require_once('../templates/dialogs/add_department.php');
    require_once('../templates/dialogs/delete_department.php');
    require_once('../templates/dialogs/add_ticket.php');
?>
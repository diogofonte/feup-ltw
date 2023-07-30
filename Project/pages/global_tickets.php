<?php
    require_once('../includes/init.php');
    require_once('../database/ticket.php');
    require_once('../database/task.php');
    require_once('../database/department.php');

    $userID = getUserID();
    if(!is_numeric($userID)) header('Location:../index.php');

    $tickets = getAllTickets();
    $control = 'global_tickets';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/contents/ticket_grid.php');
    require_once('../templates/common/footer.php');
?>
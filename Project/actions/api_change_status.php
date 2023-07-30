<?php 
    require_once("../includes/init.php");
    require_once("../database/ticket.php");

    $ticketID = $_SESSION['ticketID'];
    $newStatus = strtolower($_POST['status']);
    $previousStatus = getTicketStatus($ticketID);
    $status = '';

    if (updateTicketStatus($ticketID, $newStatus, $previousStatus)) {
        $status = array(
            'name' => $newStatus,
            'ticket_update' => getTicketUpdates($ticketID),
        );
    } else {
        $_SESSION['ERROR'] = 'Error changing ticket status';
    }

    echo json_encode($status);
?>
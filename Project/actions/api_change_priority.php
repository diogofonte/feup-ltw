<?php 
    require_once("../includes/init.php");
    require_once("../database/ticket.php");

    $ticketID = $_SESSION['ticketID'];
    $newPriority = strtolower($_POST['priority']);
    $previousPriority = getTicketPriority($ticketID);
    $priority = '';

    if (updateTicketPriority($ticketID, $newPriority, $previousPriority)) {
        $priority = array(
            'name' => $newPriority,
            'ticket_update' => getTicketUpdates($ticketID),
        );
    } else {
        $_SESSION['ERROR'] = 'Error changing ticket priority';
    }

    echo json_encode($priority);
?>
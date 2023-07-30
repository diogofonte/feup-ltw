<?php
    require_once('../includes/init.php');
    require_once('../database/ticket.php');

    $ticketID = $_POST['deleteTicketID'];

    if(!is_numeric($ticketID)) {
        $_SESSION['ERROR'] = "Error deleting ticket";
    } else {
        if(!deleteTicket($ticketID)){
            $_SESSION['ERROR'] = "Error deleting ticket";
        }
    }

    header("Location: ../pages/tickets.php");
?>
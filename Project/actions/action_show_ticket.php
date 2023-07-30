<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");
    require_once("../database/ticket.php");

    $ticketID = $_POST['ticket_id'];

    $_SESSION['ticketID'] = $ticketID;

    $_SESSION['ticketinfo'] = getTicket($_SESSION['ticketID']);

    header('Location: ../pages/ticket.php');
?>

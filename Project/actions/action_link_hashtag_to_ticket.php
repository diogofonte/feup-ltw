<?php 
    require_once("../includes/init.php");
    require_once("../database/ticket.php");
    require_once("../database/hashtag.php");

    $ticketID = $_POST['ticketID'];
    $hashtagID = strtolower($_POST['hashtagID']);
    $user = '';
    
    if (is_numeric($ticketID)) {
        $userTemp = getUser($ticketID);
        if (AddTicketHashtag($ticketID, $hashtagID)) {
            $user = array('ticket_id' => $ticketID, 'hashtag_id' => $hashtagID);
        } else {
            $_SESSION['ERROR'] = "Failed to link hashtag to ticket";
        }
    } else {
        $_SESSION['ERROR'] = "failed to link hashtag to ticket";
    }
    
    echo json_encode($ticket);
?>
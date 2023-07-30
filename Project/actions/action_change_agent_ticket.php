<?php 
    require_once("../includes/init.php");
    require_once("../database/user.php");
    require_once("../database/ticket.php");

    $newAgent = strtolower($_POST['agent']);
    $agentID = getID($newAgent);
    $ticketID = $_SESSION['ticketinfo']['id'];
    $agent = '';
    $assigned = false;
 
    if (assignAgentTicket($ticketID, $agentID)) {
        $previousStatus = getTicketStatus($ticketID);
        if ($previousStatus != 'assigned') {
            if (updateTicketStatus($ticketID, 'assigned', $previousStatus)) {
                $assigned = true;
            }
        }

        $agent = array(
            'id' => $agentID,
            'name' => $newAgent,
            'ticket_update' => getTicketUpdates($ticketID),
            'assigned' => $assigned,
        );
    } else {
        $_SESSION['ERROR'] = "Failed to assign agent";
    }
    
    echo json_encode($agent);
?>
<?php 
    require_once('../includes/init.php');
    require_once('../database/user.php');
    require_once('../database/ticket.php');

    $message = $_POST['message'];
    $ticketID = $_SESSION['ticketinfo']['id'];
    $messages = '';
    
    if (!addTicketMessage($ticketID, $message, $_SESSION['userID'], date('Y-m-d H:i:s'))) {
        $_SESSION['ERROR'] = 'Failed to add message';
    } else {
        $messagesArray = getTicketMessages($ticketID);
        $messagesUsers = array();
        foreach ($messagesArray as $message) {
            $messagesUsers[] = getUser(strval($message['user_id']))['username'];
        }
        $messages = array(
            'messages' => $messagesArray,
            'users' => $messagesUsers,
        );
    }

    echo json_encode($messages);
?>
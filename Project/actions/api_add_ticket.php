<?php
	require_once('../includes/init.php');
	require_once('../database/department.php');
	require_once('../database/ticket.php');

	$departmentID = $_POST['department'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$priority = strtolower($_POST['priority']);
	$status = 'open';
	$userID = getUserID();

	$ticket = '';

	if (!is_numeric($userID)) {
		$_SESSION['ERROR'] = "Error adding ticket";
	} else {	
		if(!is_numeric($departmentID)) {
			$_SESSION['ERROR'] = "Error adding ticket";
		} else {
			$getTicketID = createTicket($userID, $departmentID, $title, $description, $status, $priority);
			if($getTicketID != -1){
				$newTicket = getTicket($getTicketID);
				$ticket = array(
					'id' => $newTicket['id'],
					'title' => $newTicket['title'],
					'color' => $newTicket['color'],
				);
			} else {
				$_SESSION['ERROR'] = "Error adding ticket";
			}
		}
	}

	echo json_encode($ticket);
?>
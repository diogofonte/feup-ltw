<?php
    require_once("department.php");

    function getTicket($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT ticket.id, ticket.title, ticket.description, ticket.user_id, ticket.creation_date, ticket.priority, ticket.status, ticket.agent_id, department.name, department.color FROM ticket JOIN department ON department.id = ticket.department_id where ticket.id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getTicketTitle($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT title FROM ticket WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch()['title'];
    }

    function getTicketStatus($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT status FROM ticket WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch()['status'];
    }

    function getTicketDepartment($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT department_id FROM ticket WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch()['department_id'];
    }

    function getTicketCreationDate($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT creation_date FROM ticket WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch()['creation_date'];
    }

    function getTicketClosingDate($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT closing_date FROM ticket WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch()['closing_date'];
    }

    function getTicketPriority($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT priority FROM ticket WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch()['priority'];
    }

    function getTicketUpdates($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM ticket_update WHERE ticket_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function getTicketsByUser($user_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT ticket.id, ticket.title, department.color FROM ticket JOIN department ON department.id = ticket.department_id where ticket.user_id = :user_id');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getAllTickets(){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT ticket.id, ticket.title, department.color FROM ticket JOIN department ON department.id = ticket.department_id');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getTicketsByAgent($agent_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM ticket WHERE user_id = ?');
        $stmt->execute(array($agent_id));
        return $stmt->fetchAll();
    }

    function getTicketsByDepartment($department_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM ticket WHERE department_id = ?');
        $stmt->execute(array($department_id));
        return $stmt->fetchAll();
    }

    function getTicketsByStatus($status){
        $db = getDatabaseConnection();
        // status can be 'open', 'assigned' or 'closed'
        $stmt = $db->prepare('SELECT * FROM ticket WHERE status = ?');
        $stmt->execute(array($status));
        return $stmt->fetchAll();
    }

    function getTicketsByPriority($priority){
        $db = getDatabaseConnection();
        // priority can be 'low', 'medium' or 'high'
        $stmt = $db->prepare('SELECT * FROM ticket WHERE priority = ?');
        $stmt->execute(array($priority));
        return $stmt->fetchAll();
    }

    function getTicketsByCreationDate($date){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM ticket WHERE creation_date = ?');
        $stmt->execute(array($date));
        return $stmt->fetchAll();
    }

    function getAgentByTicket($ticket_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT agent_id FROM ticket WHERE id = ?');
        $stmt->execute(array($ticket_id));
        return $stmt->fetch()['agent_id'];
    }

    function getTicketHashtags($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT hashtag_id FROM ticket_hashtag WHERE ticket_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function AddTicketHashtag($ticket_id, $hashtag_id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO ticket_hashtag (ticket_id, hashtag_id) VALUES (?, ?)');
        return $stmt->execute(array($ticket_id, $hashtag_id));
    }

    function RemoveTicketHashtag($ticket_id, $hashtag_id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('DELETE FROM ticket_hashtag WHERE ticket_id = ? AND hashtag_id = ?');
        return $stmt->execute(array($ticket_id, $hashtag_id));
    }

    function getTicketMessages($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM ticket_message WHERE ticket_id = ?');
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    function addTicketMessage($ticket_id, $message, $user_id, $message_date){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO ticket_message (ticket_id, message, user_id, message_date) VALUES (:ticket_id, :message, :user_id, :message_date)');
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->bindParam(':message', $message);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':message_date', $message_date);
        return $stmt->execute();
    }

    function deleteTicket($ticketID) {
		$db = getDatabaseConnection();
		try {
			$stmt = $db->prepare('DELETE FROM ticket WHERE id = :id');
			$stmt->bindParam(':id', $ticketID);
			if($stmt->execute())
				return true;
			else
				return false;
		
		} catch (PDOException $e) {
			return false;
		}
	}

    function getDescription($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT description FROM ticket WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function createTicket($user_id, $department_id, $title, $description, $status, $priority){
        $db = getDatabaseConnection();
        $creation_date = date("Y-m-d H:i:s");
        $stmt = $db->prepare('INSERT INTO ticket (user_id, department_id, title, description, status, priority, creation_date) VALUES (:user_id, :department_id, :title, :description, :status, :priority, :creation_date)');
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':priority', $priority);
        $stmt->bindParam(':creation_date', $creation_date);
        if ($stmt->execute()) {
            return $db->lastInsertId();
        }
        return -1;
    }

    function updateTicketTitle($title, $previousTitle, $ticketID) {
		$db = getDatabaseConnection();
		try {
			$stmt = $db->prepare('UPDATE ticket SET title = :title WHERE id = :id');
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':id', $ticketID);

            $role = $_SESSION['userinfo']['role'];
            $updateDescription = "Title updated from " . $previousTitle . " to " . $title . " by " . $role . " " . $_SESSION['username'];
            $userID = $_SESSION['userID'];
            $currentDate = date("Y-m-d H:i:s");

            
			if ($stmt->execute()) {
                $historyStmt = $db->prepare('INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES (?, ?, ?, ?)');
                if ($historyStmt->execute(array($ticketID, $userID, $updateDescription, $currentDate))) {
                    return true;
                }
            }
            return false;
		} catch (PDOException $e) {
			return false;
		}
	}

    function updateTicketDepartment($ticketID, $previousDepartmentID, $departmentID) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('UPDATE ticket SET department_id = :department_id WHERE id = :id');
            $stmt->bindParam(':department_id', $departmentID);
            $stmt->bindParam(':id', $ticketID);

            $departmentName = getDepartmentName($departmentID);
            $previousDepartmentName = getDepartmentName($previousDepartmentID);
            $role = $_SESSION['userinfo']['role'];
            $updateDescription = "Department updated from " . $previousDepartmentName . " to " . $departmentName . " by " . $role . " " . $_SESSION['username'];
            $userID = $_SESSION['userID'];
            $current_date = date("Y-m-d H:i:s");
        
            if ($stmt->execute()) {
                $historyStmt = $db->prepare('INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES (?, ?, ?, ?)');
                if ($historyStmt->execute(array($ticketID, $userID, $updateDescription, $current_date))) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateTicketStatus($ticketID, $status, $previousStatus) {
        $db = getDatabaseConnection();
        try {
            $currentDate = date("Y-m-d H:i:s");

            $stmt = $db->prepare('UPDATE ticket SET status = :status WHERE id = :id');
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id', $ticketID);

            $stmt_date = $db->prepare('UPDATE ticket SET closing_date = :closing_date WHERE id = :id');
            $stmt_date->bindParam(':id', $ticketID);
            if ($status == 'closed') {
                $stmt_date->bindParam(':closing_date', $currentDate);
                if (!$stmt_date->execute()) {
                    $_SESSION['ERROR'] = 'Error updating ticket closing date';
                }
            }

            $role = $_SESSION['userinfo']['role'];
            $updateDescription = "Status updated from " . $previousStatus . " to " . $status . " by " . $role . " " . $_SESSION['username'];
            $userID = $_SESSION['userID'];
            
            if ($stmt->execute()) {
                $historyStmt = $db->prepare('INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES (?, ?, ?, ?)');
                if ($historyStmt->execute(array($ticketID, $userID, $updateDescription, $currentDate))) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateTicketPriority($ticketID, $priority, $previousPriority) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('UPDATE ticket SET priority = :priority WHERE id = :id');
            $stmt->bindParam(':priority', $priority);
            $stmt->bindParam(':id', $ticketID);

            $role = $_SESSION['userinfo']['role'];
            $updateDescription = "Priority updated from " . $previousPriority . " to " . $priority . " by " . $role . " " . $_SESSION['username'];
            $userID = $_SESSION['userID'];
            $currentDate = date("Y-m-d H:i:s");

            
            if ($stmt->execute()) {
                $historyStmt = $db->prepare('INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES (?, ?, ?, ?)');
                if ($historyStmt->execute(array($ticketID, $userID, $updateDescription, $currentDate))) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    function assignAgentTicket($ticketID, $agentID) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('UPDATE ticket SET agent_id = :agent_id WHERE id = :id');
            $stmt->bindParam(':agent_id', $agentID);
            $stmt->bindParam(':id', $ticketID);
        
            $agent = getUser($agentID);
            $role = $_SESSION['userinfo']['role'];
            $updateDescription = "Agent " . $agent['username'] . " assigned to ticket by " . $role . " " . $_SESSION['username'];
            $userID = $_SESSION['userID'];
            $currentDate = date("Y-m-d H:i:s");

            
            if ($stmt->execute()) {
                $historyStmt = $db->prepare('INSERT INTO ticket_update (ticket_id, user_id, description, update_date) VALUES (?, ?, ?, ?)');
                if ($historyStmt->execute(array($ticketID, $userID, $updateDescription, $currentDate))) {
                    return true;
                }
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
?>

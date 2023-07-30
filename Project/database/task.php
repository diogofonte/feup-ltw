<?php
    function getAllTasks(){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM task');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getTask($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM task WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function getTasksByTicket($ticket_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM task WHERE ticket_id = ?');
        $stmt->execute(array($ticket_id));
        return $stmt->fetchAll();
    }

    function getTasksByAgent($agent_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM task WHERE agent_id = ?');
        $stmt->execute(array($agent_id));
        return $stmt->fetchAll();
    }

    function getTasksByStatus($status){
        $db = getDatabaseConnection();
        // status can be 'to do', 'in progress', 'done'
        $stmt = $db->prepare('SELECT * FROM task WHERE status = ?');
        $stmt->execute(array($status));
        return $stmt->fetchAll();
    }
?>
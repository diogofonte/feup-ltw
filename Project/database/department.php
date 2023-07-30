<?php
    function getDepartment($departmentID) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM department WHERE id = :id');
        $stmt->bindParam(':id', $departmentID);
        $stmt->execute();
        return $stmt->fetch();
    }

    function getAllDepartments() {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM department');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addDepartment($departmentName, $departmentColor) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO department (name, color) VALUES (:name, :color)');
        $stmt->bindParam(':name', $departmentName);
        $stmt->bindParam(':color', $departmentColor);
        return $stmt->execute();
    }

    function deleteDepartment($departmentID) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('DELETE FROM department WHERE id = :id');
        $stmt->bindParam(':id', $departmentID);
        return $stmt->execute();
    }

    function getDepartmentID($departmentName) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT id FROM department WHERE name = :name');
        $stmt->bindParam(':name', $departmentName);
        $stmt->execute();
        return $stmt->fetch()['id'];
    }

    function getDepartmentName($departmentID) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM department WHERE id = :id');
        $stmt->bindParam(':id', $departmentID);
        $stmt->execute();
        return $stmt->fetch()['name'];
    }

    function departmentExists($departmentName) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM department WHERE name = :name');
        $stmt->bindParam(':name', $departmentName);
        $stmt->execute();
        return $stmt->fetch() != false;
    }

    function getAgentsByDepartment($departmentID) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM agent_department WHERE department_id = :id');
        $stmt->bindParam(':id', $departmentID);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function addAgentDepartment($departmentID, $agentID) {
        if (checkAgentDepartment($departmentID, $agentID)) return false;
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO agent_department (department_id, agent_id) VALUES (:department_id, :agent_id)');
        $stmt->bindParam(':department_id', $departmentID);
        $stmt->bindParam(':agent_id', $agentID);
        return $stmt->execute();
    }

    function removeAgentDepartment($departmentID, $agentID) {
        if (!checkAgentDepartment($departmentID, $agentID)) return false;
        $db = getDatabaseConnection();
        $stmt = $db->prepare('DELETE FROM agent_department WHERE department_id = :department_id AND agent_id = :agent_id');
        $stmt->bindParam(':department_id', $departmentID);
        $stmt->bindParam(':agent_id', $agentID);
        return $stmt->execute();
    }

    function checkAgentDepartment($departmentID, $agentID) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM agent_department WHERE department_id = :department_id AND agent_id = :agent_id');
        $stmt->bindParam(':department_id', $departmentID);
        $stmt->bindParam(':agent_id', $agentID);
        $stmt->execute();
        return $stmt->fetch() != false;
    }

    function editDepartment($departmentID, $newName, $newColor) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('UPDATE department SET name = :name, color = :color WHERE id = :id');
        $stmt->bindParam(':id', $departmentID);
        $stmt->bindParam(':name', $newName);
        $stmt->bindParam(':color', $newColor);
        return $stmt->execute();
    }
?>
<?php
    function getAllUsers(){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM user');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function confirmLogin($username, $password) {
        $db = getDatabaseConnection();
        $magic_word = "ltw";
        $password = $magic_word . $password;
        try {
            $password = hash('sha256', $password);
            $stmt = $db->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            if ($stmt->fetch() !== false) {
                return getID($username);
            }
            return -1;
        } catch (PDOException $e) {
            return null;
        }
    }

    function getUser($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    function deleteUser($userID) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('DELETE FROM user WHERE id = :id');
            $stmt->bindParam(':id', $userID);
            $stmt->execute();
            return true;
        }
        catch (PDOException $e) {
            return false;
        }
    }

    function getUsersByRole($role){
        $db = getDatabaseConnection();
        // role can be 'client', 'agent', 'admin'
        $stmt = $db->prepare('SELECT * FROM user WHERE role = ?');
        $stmt->execute(array($role));
        return $stmt->fetchAll();
    }

    // maybe add a function to get agents by department
    // function getAgentsByDepartment($department_id)

    function duplicateUsername($username) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch();
        
        } catch(PDOException $e) {
            return true;
        }
    }
    
    function duplicateEmail($email) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('SELECT * FROM user WHERE email = :email');
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch();
        
        } catch(PDOException $e) {
            return true;
        }
    }

    function createUser($username, $password, $name, $email) {
        $db = getDatabaseConnection();
        $magic_word = "ltw";
        $password = $magic_word . $password;
        try {
            $passwordhashed = hash('sha256', $password);
            $stmt = $db->prepare('INSERT INTO user (username, password, name, email, role, status) VALUES (:username, :password, :name, :email, :role, :status)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $passwordhashed);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindValue(':role', 'client');
            $stmt->bindValue(':status', 'active');
            $stmt->execute();
            return getID($username);
        } catch (PDOException $e) {
            return -1;
        }
    }

    function getID($username) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('SELECT * FROM user WHERE username = :username');
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            if ($row = $stmt->fetch())
                return $row['id'];
            return -1;
        } catch(PDOException $e) {
            return -1;
        }
    }

    function updateUserInfo($userID, $name, $username, $email){
        $db = getDatabaseConnection();
    
        try {
            $stmt = $db->prepare('UPDATE user SET name = :name, username = :username, email = :email WHERE id = :id');
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $userID);
            if ($stmt->execute()) return true;
            else return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    function updateUserPassword($userID, $newpassword){
        $magic_word = "ltw";
        $newpassword = $magic_word . $newpassword;
        $passwordhashed = hash('sha256', $newpassword);
        $db = getDatabaseConnection();
    
        try {
            $stmt = $db->prepare('UPDATE user SET password = :password WHERE id = :id');
            $stmt->bindParam(':password', $passwordhashed);
            $stmt->bindParam(':id', $userID);
            if ($stmt->execute()) return true;
            else return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    function updateUserPhoto($userID, $photoPath) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('UPDATE user SET photo = :photo WHERE id = :id');
            $stmt->bindParam(':photo', $photoPath);
            $stmt->bindParam(':id', $userID);
            if ($stmt->execute()) return true;
            else false;
        } catch (PDOException $e) {
            return false;
        }
    } 
    
    function getUserPhoto($userID) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('SELECT photo FROM user WHERE id = :id');
            $stmt->bindParam(':id', $userID);
            $stmt->execute();
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    function deleteUserPhoto($userID) {
        $db = getDatabaseConnection();
        $photo = "default.jpg";
        try {
            $stmt = $db->prepare('UPDATE user SET photo = :photo WHERE id = :id');
            $stmt->bindParam(':photo', $photo);
            $stmt->bindParam(':id', $userID);
            if ($stmt->execute()) return true;
            else return false;
        } catch (PDOException $e) {
            return false;
        }
    }

    function updateUserRole($userID, $role) {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('UPDATE user SET role = :role WHERE id = :id');
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':id', $userID);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    function getAgents() {
        $db = getDatabaseConnection();
        try {
            $stmt = $db->prepare('SELECT * FROM user WHERE role = "agent" OR role = "admin"');
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }
?>
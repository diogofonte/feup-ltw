<?php
    function getAllFAQ(){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM faq');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getFAQ($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM faq WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    function getFAQByDepartment($department_id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM faq WHERE department_id = ?');
        $stmt->execute(array($department_id));
        return $stmt->fetchAll();
    }

    function questionExists($question){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM faq WHERE question = ?');
        $stmt->execute(array($question));
        return $stmt->fetch() !== false;
    }

    function addFAQ($question, $answer){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO faq (question, answer) VALUES (?, ?)');
        return $stmt->execute(array($question, $answer));
    }

    function getFAQID($question){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT id FROM faq WHERE question = ?');
        $stmt->execute(array($question));
        return $stmt->fetch()['id'];
    }

    function deleteFAQ($id){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('DELETE FROM faq WHERE id = ?');
        return $stmt->execute(array($id));
    }

    function editFAQAnswer($id, $new_answer){
        $db = getDatabaseConnection();
        $stmt = $db->prepare('UPDATE faq SET answer = ? WHERE id = ?');
        return $stmt->execute(array($new_answer, $id));
    }
?>
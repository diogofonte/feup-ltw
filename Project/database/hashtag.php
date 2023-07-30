<?php
    function getAllHashtags() {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM hashtag');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function nameExists($name) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT * FROM hashtag WHERE name = ?');
        $stmt->execute(array($name));
        return $stmt->fetch() !== false;
    }

    function addHashtag($name) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO hashtag (name) VALUES (?)');
        return $stmt->execute(array($name));
    }

    function getHashtagID($name) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT id FROM hashtag WHERE name = ?');
        $stmt->execute(array($name));
        return $stmt->fetch()['id'];
    }

    function deleteHashtag($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('DELETE FROM hashtag WHERE id = ?');
        return $stmt->execute(array($id));
    }

    function editHashtag($id, $new_name) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('UPDATE hashtag SET name = ? WHERE id = ?');
        return $stmt->execute(array($new_name, $id));
    }

    function getHashtagName($id) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('SELECT name FROM hashtag WHERE id = ?');
        $stmt->execute(array($id));
        return $stmt->fetch()['name'];
    }
?>
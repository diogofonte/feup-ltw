<?php
    session_start();

    function setCurrentUser($userID, $username) {
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = intval($userID);
    }

    function getUserID() {
        if(isset($_SESSION['userID'])) {
            return $_SESSION['userID'];
        }
        return null;
    }

    function getUsername() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        }
        return null;
    }

    function logout() {
        session_destroy();
    }

    function isClient() {
        return isset($_SESSION['userID']) && $_SESSION['role'] === 'client'; //this 'role' can be used?
    }

    function isAgent() {
        return isset($_SESSION['userID']) && $_SESSION['role'] === 'agent'; //this 'role' can be used?
    }

    function isAdmin() {
        return isset($_SESSION['userID']) && $_SESSION['role'] === 'admin'; //this 'role' can be used?
    }

    function isGuest() {
        return !isset($_SESSION['userID']);
    }
?>
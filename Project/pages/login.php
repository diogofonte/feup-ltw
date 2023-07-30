<?php
    require_once('../includes/session.php');
    if (isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
    require_once('../templates/user/login.php');
    require_once('../templates/common/footer.php');
?>
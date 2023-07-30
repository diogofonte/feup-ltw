<?php
    require_once("../includes/init.php");
    if (isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
    require_once("../templates/user/signup.php");
    require_once("../templates/common/footer.php");
?>
<?php
    require_once('../includes/init.php');
    require_once('../database/user.php');

    $_SESSION['userinfo'] = getUser(getUserID());

    require_once('../templates/account/header.php');
    require_once('../templates/account/aside.php');
    require_once('../templates/account/main_page.php');
    require_once('../templates/common/footer.php');
?>
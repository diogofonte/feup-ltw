<?php
    require_once('../includes/init.php');
    require_once('../database/user.php');

    $users = getAllUsers();
    $control = 'people';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/people/people.php');
    require_once('../templates/common/footer.php');

    require_once('../templates/dialogs/delete_user.php');
    require_once('../templates/dialogs/change_user_role.php');
?>
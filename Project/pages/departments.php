<?php
    require_once('../includes/init.php');
    require_once('../database/user.php');
    require_once('../database/department.php');

    $departments = getAllDepartments();
    $control = 'departments';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/departments/departments.php');
    require_once('../templates/common/footer.php');

    require_once('../templates/dialogs/add_department.php');
    require_once('../templates/dialogs/delete_department.php');
    require_once('../templates/dialogs/edit_department.php');
    require_once('../templates/dialogs/add_remove_agent_department.php');
?>
<?php
    require_once('../includes/init.php');
    require_once('../database/ticket.php');
    require_once('../database/task.php');
    require_once('../database/user.php');
    require_once('../database/hashtag.php');

    $_SESSION['ticketinfo'] = getTicket($_SESSION['ticketID']);
    $control = 'ticket';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/contents/ticket.php');
    require_once('../templates/common/footer.php');

    require_once('../templates/dialogs/change_department.php');
    require_once('../templates/dialogs/change_status.php');
    require_once('../templates/dialogs/change_priority.php');
    require_once('../templates/dialogs/change_agent_ticket.php');
    require_once('../templates/dialogs/delete_ticket.php');
    require_once('../templates/dialogs/link_hashtag.php');
?>
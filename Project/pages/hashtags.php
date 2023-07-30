<?php
    require_once('../includes/init.php');
    require_once('../database/hashtag.php');

    $hashtags = getAllHashtags();
    $control = 'hashtags';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/hashtags/hashtags.php');
    require_once('../templates/common/footer.php');

    require_once('../templates/dialogs/add_hashtag.php');
    require_once('../templates/dialogs/delete_hashtag.php');
    require_once('../templates/dialogs/edit_hashtag.php');
?>
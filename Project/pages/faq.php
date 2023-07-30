<?php
    require_once('../includes/init.php');
    require_once('../database/faq.php');

    $faqs = getAllFAQ();
    $control = 'faq';

    require_once('../templates/common/secondary_header.php');
    require_once('../templates/common/aside.php');
    require_once('../templates/faq/faq.php');
    require_once('../templates/common/footer.php');

    require_once('../templates/dialogs/add_faq.php');
    require_once('../templates/dialogs/delete_faq.php');
    require_once('../templates/dialogs/edit_faq.php');
?>
<?php
    require_once('../includes/init.php');
    require_once('../database/faq.php');

    $faqID = $_POST['id'];

    if(!is_numeric($faqID)) {
        $_SESSION['ERROR'] = "Error deleting faq";
    } else {
        if(!deleteFAQ($faqID)){
            $_SESSION['ERROR'] = "Error deleting faq";   
        }
    }

    echo json_encode(array('id' => $faqID));
?>
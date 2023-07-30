<?php
    require_once('../includes/init.php');
    require_once('../database/faq.php');
    
    $faq = '';
    $FAQID = $_POST['id'];
    $new_answer = $_POST['answer'];

    
    if(!is_numeric($FAQID)) {
        $_SESSION['ERROR'] = "Error editing faq";
    } else {
        if(!editFAQAnswer($FAQID, $new_answer)){
            $_SESSION['ERROR'] = "Error editing faq";
        } else {
            $faq = array(
                'id' => $FAQID,
                'answer' => $new_answer,
            );
        }
    }

    echo json_encode($faq);
?>
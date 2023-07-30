<?php
    require_once('../includes/init.php');
    require_once('../database/faq.php');

    $question = trim($_POST['question']);
    $answer = trim($_POST['answer']);

    // check if already exists
    if (questionExists($question)) {
        $_SESSION['ERROR'] = 'Question already exists';
        $faq = '';
    } else {
        if (addFAQ($question, $answer)) {
            $faq = array(
                'id' => getFAQID($question),
                'question' => $question,
                'answer' => $answer
            );
        }
        else {
            $_SESSION['ERROR'] = 'Error adding question';
            $faq = '';
        }
    }

    echo json_encode($faq);
?>


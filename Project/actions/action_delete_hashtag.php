<?php
    require_once('../includes/init.php');
    require_once('../database/hashtag.php');

    $hashtagID = $_POST['id'];
    $hashtagName = '';
    $hashtag = '';

    if(!is_numeric($hashtagID)) {
        $_SESSION['ERROR'] = "Error deleting hashtag";
    } else {
        $hashtagName = getHashtagName($hashtagID);
        if(!deleteHashtag($hashtagID)){
            $_SESSION['ERROR'] = "Error deleting hashtag";   
        }
        else {
            $hashtag = array(
                'id' => $hashtagID,
                'name' => $hashtagName,
            );
        }
    }

    echo json_encode($hashtag);
?>
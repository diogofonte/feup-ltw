<?php
    require_once('../includes/init.php');
    require_once('../database/hashtag.php');
    
    $hashtag = '';
    $hashtagID = $_POST['id'];
    $new_name = $_POST['name'];
    
    if(!is_numeric($hashtagID)) {
        $_SESSION['ERROR'] = "Error editing hashtag";
    } else {
        $old_name = getHashtagName($hashtagID);
        if (nameExists($new_name)) {
            $_SESSION['ERROR'] = 'hashtag already exists';
        } else if(!editHashtag($hashtagID, $new_name)){
            $_SESSION['ERROR'] = "Error editing hashtag";
        } else {
            $hashtag = array(
                'id' => $hashtagID,
                'name' => $new_name,
                'old_name' => $old_name,
            );
        }
    }

    echo json_encode($hashtag);
?>
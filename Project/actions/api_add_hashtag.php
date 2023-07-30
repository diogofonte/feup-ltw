<?php
    require_once('../includes/init.php');
    require_once('../database/hashtag.php');

    $name = trim($_POST['name']);

    if (nameExists($name)) {
        $_SESSION['ERROR'] = 'hashtag already exists';
        $hashtag = '';
    } else {
        if (addHashtag($name)) {
            $hashtag = array(
                'id' => getHashtagID($name),
                'name' => $name,
            );
        }
        else {
            $_SESSION['ERROR'] = 'Error adding hashtag';
            $hashtag = '';
        }
    }

    echo json_encode($hashtag);
?>


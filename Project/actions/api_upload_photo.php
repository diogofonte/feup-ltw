<?php
    require_once("../includes/init.php");
    require_once("../database/user.php");

    $target_dir = "../profilePictures/";
    if (!isset($_FILES["fileToUpload"]["name"]) || $_FILES["fileToUpload"]["name"] == "" && (isset($_POST['reset']) && $_POST['reset'] === '1')) {
        deleteUserPhoto(getUserID());
    } else {
        $originalName = basename($_FILES["fileToUpload"]["name"]);    
        $imageFileType = pathinfo($originalName, PATHINFO_EXTENSION);
        $target_file = $target_dir . getUserID() . "." . $imageFileType;
        $uploadOk = 1;

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $_SESSION['ERROR'] = "ERROR: Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) unlink($target_file);

        if ($uploadOk == 0) $_SESSION['ERROR'] =  "Error uploading photo";
        else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                if (updateUserPhoto(getUserID(), getUserID() . "." . $imageFileType) == null)
                    $_SESSION['ERROR'] = "Error uploading photo";
            }
            else $_SESSION['ERROR'] =  "Error uploading photo";
        }
    }
    header("Location:".$_SERVER['HTTP_REFERER']."");
?>
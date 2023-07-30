<?php 
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Support Genius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assets/favicon.ico">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/linearicons/Web Font/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="register_header">
        <h1>Support Genius</h1>
        <h2>ERROR 404: Page not found</h2>
    </div>

<?php
  require_once('../templates/common/footer.php');
?>
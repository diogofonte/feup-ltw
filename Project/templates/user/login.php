<!DOCTYPE html>
<html>

<head>
    <title>Support Genius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/linearicons/Web%20Font/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <script src="../js/sidebar.js" defer></script>
    <script src="../js/project_edit.js" defer></script>
    <script src="../js/dialog.js" defer></script>
    <script src="../js/user_info.js" defer></script>
    <script src="../js/label.js" defer></script>
    <script src="../js/ticket.js" defer></script>
    <div id="register_container">
        <div class="register_header">
            <a href="signup.php" class="register_button">Sign Up</a>
            <h1>Support Genius</h1>
        </div>
        <div class="register_content login">
            <h1>Login</h1>
            <form action="../actions/action_login.php" method="post" class="register_form">
                <input name="username" type="text" placeholder="Username" required="required">
                <input name="password" type="password" placeholder="Password" required="required">
                <input class="edit_button" type="submit" name="Submit" value="Next">
            </form>
            <p id="error_messages" style="color: black">
                <?php if (isset($_SESSION['ERROR'])) echo htmlentities($_SESSION['ERROR']);
                unset($_SESSION['ERROR']) ?>
            </p>
        </div>
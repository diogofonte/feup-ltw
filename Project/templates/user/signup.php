<!DOCTYPE html>
<html>

<head>
    <title>Support Genius</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../assets/favicon.ico">
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
            <a href="login.php" class="register_button">Login</a>
            <h1>Support Genius</h1>
        </div>
        <div class="register_content signup">
            <h1>Sign Up</h1>
            <form action="../actions/action_sign_up.php" method="post" class="register_form">
                <input name="name" type="text" placeholder="Name" required="required">
                <input name="username" type="text" placeholder="Username" required="required">
                <span class="hint">Only lowercase and numbers, at least 6 characters.</span>
                <input name="email" type="email" placeholder="Email" required="required">
                <input name="password" type="password" placeholder="Password" required="required">
                <span class="hint">One uppercase, 1 symbol, 1 number, at least 6 characters.</span>
                <input name="passwordagain" type="password" placeholder="Repeat Password" required="required">
                <span class="hint">Must match new password.</span>
                <input class="edit_button" name="Submit" type="submit" value="Next">
            </form>
            <p> <?php echo htmlentities($error) ?> </p>
        </div>
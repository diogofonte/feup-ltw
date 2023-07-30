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
    <div id="main_container">
        <header>
            <nav>
                <span id="menu-icon" onclick="openNav()">
                    <span class="lnr lnr-menu"></span>
                </span>

                <div id="sidenav">
                    <a class="closebtn" onclick="closeNav()">
                        <span class="lnr lnr-cross"></span>
                    </a>
                    <nav>
                        <a class="menu_option" href="tickets.php">
                            <span class="lnr lnr-home"></span>
                            <p>Home</p>
                        </a>
                        <hr style="width:90%;margin:auto;">
                        <a class="menu_option">
                            <span class="lnr lnr-user"></span>
                            <p>Account</p>
                        </a>
                    </nav>
                </div>
            </nav>

            <a id="logo" href="tickets.php">
                <h1>Support Genius</h1>
            </a>

            <p id="error_messages">
                <?php echo htmlentities($error) ?>
            </p>

            <div id="header_buttons">
                <a href="../actions/action_logout.php">
                    <span class="lnr lnr-power-switch"></span>
                </a>
            </div>
        </header>
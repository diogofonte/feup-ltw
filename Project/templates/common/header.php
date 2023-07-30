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
    <script src="../js/events/tickets.js" defer></script>
    <script src="../js/events/header.js" defer></script>
    <div id="main_container">
        <header>
            <nav>
                <span id="menu-icon">
                    <span class="lnr lnr-menu"></span>
                </span>
                <div id="sidenav">
                    <a class="closebtn">
                        <span class="lnr lnr-cross"></span>
                    </a>
                    <nav>
                        <a class="menu_option" href="tickets.php">
                            <span class="lnr lnr-file-empty"></span>
                            <p>My Tickets</p>
                        </a>
                        <?php if (($_SESSION['userinfo']['role'] == 'agent') || ($_SESSION['userinfo']['role'] == 'admin')) { ?>
                            <a class="menu_option" href="global_tickets.php">
                                <span class="lnr lnr-earth"></span>
                                <p>Global Tickets</p>
                            </a>
                            <a class="menu_option" href="faq.php">
                                <span class="lnr lnr-question-circle"></span>
                                <p>FAQ</p>
                            </a>
                        <?php }
                        if ($_SESSION['userinfo']['role'] == 'admin') { ?>
                            <a class="menu_option" href="people.php">
                                <span class="lnr lnr-users"></span>
                                <p>People</p>
                            </a>
                            <a class="menu_option" href="departments.php">
                                <span class="lnr lnr-layers"></span>
                                <p>Departments</p>
                            </a>
                            <a class="menu_option" href="hashtags">
                                <span class="lnr lnr-tag"></span>
                                <p>Hashtags</p>
                            </a>
                        <?php } ?>
                    </nav>
                </div>
            </nav>
            <a id="logo" href="tickets.php">
                <h1>Support Genius</h1>
            </a>
            <p id="error_messages">
                <?php echo $error ?>
            </p>
            <div id="header_buttons">
                <a>
                    <div class="plus">
                        <span class="lnr lnr-cross"></span>
                    </div>
                </a>
                <a href="account.php">
                    <span class="lnr lnr-user"></span>
                </a>
            </div>
        </header>
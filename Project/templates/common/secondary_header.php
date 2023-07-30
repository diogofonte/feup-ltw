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
    <script src="../js/events/secondary_header.js" defer></script>
    <?php
    if ($control === 'hashtags') {
        echo '<script src="../js/events/hashtag.js" defer></script>';
    } else if ($control == 'departments') {
        echo '<script src="../js/events/department.js" defer></script>';
    } else if ($control == 'people') {
        echo '<script src="../js/events/people.js" defer></script>';
    } else if ($control == 'global_tickets') {
        echo '<script src="../js/events/global_ticket.js" defer></script>';
    } else if ($control == 'faq') {
        echo '<script src="../js/events/faq.js" defer></script>';
    } else if ($control == 'ticket') {
        echo '<script src="../js/events/ticket.js" defer></script>';
    }
    ?>
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
                            <a class="menu_option" href="hashtags.php">
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
                <a href="account.php">
                    <span class="lnr lnr-user"></span>
                </a>
            </div>
        </header>
<aside>
    <div id="aside_container">
        <nav>
            <!-- My Tickets -->
            <?php if ($control === 'tickets') {?>
                <a id="lists_menu_option" class="menu_option" href="tickets.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                    <span class="lnr lnr-file-empty"></span>
                    <p id="lists_menu_text">My Tickets</p>
                </a>
            <?php } else { ?>
                <a id="lists_menu_option" class="menu_option" href="tickets.php">
                    <span class="lnr lnr-file-empty"></span>
                    <p id="lists_menu_text">My Tickets</p>
                </a>
            <?php } ?>
            <!-- Global Tickets -->
            <?php if (($_SESSION['userinfo']['role'] === 'agent') || ($_SESSION['userinfo']['role'] === 'admin')) {?>
                <?php if ($control === 'global_tickets') {?>
                    <a id="lists_menu_option" class="menu_option" href="global_tickets.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                        <span class="lnr lnr-earth"></span>
                        <p id="lists_menu_text">Global tickets</p>
                    </a>
                <?php } else { ?>
                    <a id="lists_menu_option" class="menu_option" href="global_tickets.php">
                        <span class="lnr lnr-earth"></span>
                        <p id="lists_menu_text">Global tickets</p>
                    </a>
                <?php } ?>
            <?php } ?>
            <!-- FAQ -->
            <?php if ($control === 'faq') {?>
                <a id="lists_menu_option" class="menu_option" href="faq.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                    <span class="lnr lnr-question-circle"></span>
                    <p id="lists_menu_text">FAQ</p>
                </a>
            <?php } else { ?>
                <a id="lists_menu_option" class="menu_option" href="faq.php">
                    <span class="lnr lnr-question-circle"></span>
                    <p id="lists_menu_text">FAQ</p>
                </a>
            <?php } ?>
            <?php if ($_SESSION['userinfo']['role'] == 'admin') {?>
                <!-- People -->
                <?php if ($control === 'people') {?>
                    <a id="lists_menu_option" class="menu_option" href="people.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                        <span class="lnr lnr-users"></span>
                        <p id="lists_menu_text">People</p>
                    </a>
                <?php } else { ?>
                    <a id="lists_menu_option" class="menu_option" href="people.php">
                        <span class="lnr lnr-users"></span>
                        <p id="lists_menu_text">People</p>
                    </a>
                <?php } ?>
                <!-- Departments -->
                <?php if ($control === 'departments') {?>
                    <a id="lists_menu_option" class="menu_option" href="departments.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                        <span class="lnr lnr-layers"></span>
                        <p id="lists_menu_text">Departments</p>
                    </a>
                <?php } else { ?>
                    <a id="lists_menu_option" class="menu_option" href="departments.php">
                        <span class="lnr lnr-layers"></span>
                        <p id="lists_menu_text">Departments</p>
                    </a>
                <?php } ?>
                <!-- Hashtags -->
                <?php if ($control === 'hashtags') {?>
                    <a id="lists_menu_option" class="menu_option" href="hashtags.php" style="border:2px solid #2E4F4F; border-radius: 5px;">
                        <span class="lnr lnr-tag"></span>
                        <p id="lists_menu_text">Hashtags</p>
                    </a>
                <?php } else { ?>
                    <a id="lists_menu_option" class="menu_option" href="hashtags.php">
                        <span class="lnr lnr-tag"></span>
                        <p id="lists_menu_text">Hashtags</p>
                    </a>
                <?php } ?>
            <?php } ?>
        </nav>
    </div>
</aside>

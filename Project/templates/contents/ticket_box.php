<?php 
    if (!isset($_SESSION['ticketinfo'])) {
        header('Location: ../actions/action_show_ticket.php');
    }
?>

<h1>Ticket #<?php echo htmlentities($_SESSION['ticketinfo']['id']) ?></h1>
<h2>Title: <span style="font-weight: normal"><?php echo htmlentities($_SESSION['ticketinfo']['title']) ?></span></h2>
<h3>Description: </h3>
<p><?php echo htmlentities($_SESSION['ticketinfo']['description']) ?></p>
<p>
    <strong><em>Created Date: </em></strong><?php echo htmlentities($_SESSION['ticketinfo']['creation_date']) ?>
</p>
<?php if (getUser($_SESSION['ticketinfo']['user_id']) != null) { ?>
    <p><strong><em>Created By: </em></strong><?php echo htmlentities(getUser($_SESSION['ticketinfo']['user_id'])['username']) ?></p>
<?php } ?>
<p id="department">
    <strong><em>Department: </em></strong><?php echo htmlentities($_SESSION['ticketinfo']['name']) ?>
    &nbsp;
    <?php if ($_SESSION['userinfo']['role'] != 'client') { ?>
        <input class="edit_button" type="button" value="Change Department">
    <?php } ?>
</p>
<p id="status">
    <strong><em>Status: </em></strong><?php echo htmlentities(ucwords($_SESSION['ticketinfo']['status']))?>
    &nbsp;
    <?php if ($_SESSION['userinfo']['role'] != 'client') { ?>
        <input class="edit_button" type="button" value="Change Status">
    <?php } ?>
</p>
<p id="priority">
    <strong><em>Priority: </em></strong><?php echo htmlentities(ucwords($_SESSION['ticketinfo']['priority'])) ?>
    &nbsp;
    <?php if ($_SESSION['userinfo']['role'] != 'client') { ?>
        <input class="edit_button" type="button" value="Change Priority">
    <?php } ?>
</p>
<p id="agent">
    <?php  if ($_SESSION['ticketinfo']['agent_id'] != null) { ?>
        <strong><em>Assigned To: </em></strong><?php echo htmlentities(getUser($_SESSION['ticketinfo']['agent_id'])['username']) ?>
        &nbsp;
    <?php } ?>
    <?php if ($_SESSION['userinfo']['role'] != 'client') { 
        if (is_numeric($_SESSION['ticketinfo']['agent_id'])) { ?>
        <input class="edit_button" type="button" value="Change Agent">
    <?php } else { ?>
        <input class="edit_button" type="button" value="Assign Agent">
    <?php }
    } ?>
</p>
<!-- HASHTAGS -->
<hr>
<section id="messages">
    <h1>Messages</h1>
    <ul>
        <?php if (getTicketMessages($_SESSION['ticketinfo']['id']) != null) { ?>
            <?php foreach (getTicketMessages($_SESSION['ticketinfo']['id']) as $message) { ?>
                <li>
                    <p><?php echo '<strong>'; echo htmlentities(getUser(strval($message['user_id']))['username']) . '</strong> '; echo htmlentities($message['message']); echo ' <strong>'; echo htmlentities($message['message_date']); echo '</strong>';?></p>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <div>
        <label for="comment"><h3 style="font-weight:normal">New message: </h3>
        <input type="text" name="comment" id="comment"></textarea>
        </label>
        <input class="edit_button" type="button" value="Submit">
    </div>
</section>
<section id="history">
    <h1>History</h1>
    <ul>
        <?php if (getTicketUpdates($_SESSION['ticketinfo']['id']) != null) { ?>
            <?php foreach (getTicketUpdates($_SESSION['ticketinfo']['id']) as $update) { ?>
                <li>
                    <p><?php echo htmlentities($update['description']); echo ' <strong>'; echo htmlentities($update['update_date']); echo '</strong>';?></p>
                </li>
            <?php } ?>
        <?php } else { ?>
            <li>
                <p>No updates yet.</p>
            </li>
        <?php } ?>
    </ul>
    <input type="hidden" name="ticketID" value="<?php echo htmlentities($_SESSION['ticketinfo']['id'])?>">
    <input class="delete_button" type="button" value="Delete Ticket">
</section>
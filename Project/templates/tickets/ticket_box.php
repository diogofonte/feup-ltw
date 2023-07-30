<?php
    require_once('../includes/init.php');
    require_once('../database/ticket.php');

    foreach ($tickets as $ticket) { ?>
        <div class="list_box <?php echo "color".htmlentities(substr($ticket['color'],1))?>">
            <div id="list_box_header">
                <h1><?php echo htmlentities($ticket['title'])?> #<?php echo htmlentities($ticket['id'])?></h1>
                <button>
                    <i class="fa fa-bookmark" aria-hidden="true" style="color: <?php echo htmlentities($ticket['color'])?>"></i>
                </button>
            </div>
            <form action="../../actions/action_show_ticket.php" method="post" style="margin: auto">
                <input type="hidden" name="ticket_id" value="<?php echo htmlentities($ticket['id'])?>">
                <input type="submit" value="See More" class="edit_button">
            </form>
        </div>
<?php }?>
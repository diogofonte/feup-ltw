<?php
    require_once('../includes/init.php');
    require_once('../database/user.php');

    $agents = getAgents();
?>
<div id="dialog7" class="modal">
    <div class="modal-content">
        <div id="label_form">
            <input type="hidden" name="assignAgentDepartment">
            <p>Choose the Agent</p>
            <?php foreach($agents as $agent) { ?>
                <input type="radio" id="Agent<?php echo htmlentities($agent['username']) ?>" name="agent" />
                <label for="Agent<?php echo htmlentities($agent['username']) ?>"><?php echo htmlentities($agent['username']) . ' - ' . htmlentities($agent['role']) ?></label>
            <?php } ?>
            <div class="buttons">
                <input type="button" value="Cancel" class="edit_button">
                <input type="button" value="Submit" class="edit_button">
            </div>
        </div>
    </div>
</div>

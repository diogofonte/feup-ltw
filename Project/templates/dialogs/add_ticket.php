<?php
    require_once('../includes/init.php');
    require_once('../database/department.php');

    $departments = getAllDepartments();
?>

<div id="dialog17" class="modal">
    <div class="modal-content">
        <div id="label_form">
            <h3>Pick a Department</h3>
            <?php foreach($departments as $department) { ?>
                <input type="radio" id="Department<?php echo htmlentities($department['id']) ?>" name="department" />
                <label for="Department<?php echo htmlentities($department['id']) ?>"><?php echo htmlentities($department['name'])?></label>
            <?php }?>
            <h3>Title</h3>
            <input type="text" id="title" name="title" placeholder="Title">
            <h3>Description</h3>
            <textarea id="description" name="description" placeholder="Description"></textarea>
            <h3>Choose the Priority</h3>
                <input type="radio" id="PriorityLow" name="priority" />
                <label for="PriorityLow">Low</label>
                <input type="radio" id="PriorityMedium" name="priority" />
                <label for="PriorityMedium">Medium</label>
                <input type="radio" id="PriorityHigh" name="priority" />
                <label for="PriorityHigh">High</label>
            <div class="buttons">
                <input type="button" value="Cancel" class="edit_button">
                <input type="button" value="Submit" class="edit_button">
            </div>
        </div>
    </div>
</div>
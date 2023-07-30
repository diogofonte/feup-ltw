<?php
    require_once('../includes/init.php');
    require_once('../database/department.php');

    $departments = getAllDepartments();
?>

<div id="dialog13" class="modal">
    <div class="modal-content">
        <div id="label_form">
            <p>Pick a Department</p>
            <?php foreach($departments as $department) { ?>
                <input type="radio" id="Department<?php echo htmlentities($department['id']) ?>" name="department" />
                <label for="Department<?php echo htmlentities($department['id']) ?>"><?php echo htmlentities($department['name'])?></label>
            <?php }?>

            <div class="buttons">
                <input type="button" value="Cancel" class="edit_button">
                <input type="button" value="Submit" class="edit_button">
            </div>
        </div>
    </div>
</div>
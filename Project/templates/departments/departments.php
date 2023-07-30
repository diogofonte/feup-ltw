<main style="background-color: #948f8c">
    <section>
        <?php if ($_SESSION['userinfo']['role'] == 'admin') {?>
            <a href="/pages/departments.php"><input class="add_button" type="button" value="add new department"></a>
            <ul class="manage_accordion">
                <?php foreach($departments as $department) { 
                    $agents = getAgentsByDepartment($department['id']);
                ?>
                    <li>
                        <input type="checkbox" name="manage_accordion" id="<?php echo htmlentities($department['id']) ?>">
                        <label for="<?php echo htmlentities($department['id']) ?>">
                            <?php echo htmlentities($department['name']) ?>&nbsp;
                            <div class="circle" style="background: <?php echo htmlentities($department['color']) ?>"></div>
                        </label>
                        <div class="manage_content">
                            
                            <?php if (!empty($agents)) { ?>
                                    <p><em style="font-weight:bold">Assigned To: </em></p>
                                <?php foreach ($agents as $agent) {
                                    $user = getUser($agent['agent_id']);
                                    echo '<p><span class="lnr lnr-arrow-right">&nbsp;</span>' . htmlentities($user['username']) . '</p>';
                                }
                            } ?>
                            
                            <?php if ($_SESSION['userinfo']['role'] == 'admin') { ?>
                                <input class="edit_button" type="button" value="Change Agent">
                            <?php } ?>
                            <input type="hidden" name="departmentID" value="<?php echo htmlentities($department['id']) ?>">
                            <input class="edit_button" type="button" value="Edit">
                            <input class="delete_button" type="button" value="Delete">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </section>
</main>
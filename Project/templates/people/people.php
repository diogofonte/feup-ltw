<main style="background-color: #948f8c">
    <section>
        <ul class="manage_accordion">
            <?php if ($_SESSION['userinfo']['role'] == 'admin') {?>
                <?php foreach($users as $user) { ?>
                    <li>
                        <input type="checkbox" name="manage_accordion" id="<?php echo htmlentities($user['id']) ?>">
                        <label for="<?php echo htmlentities($user['id']) ?>">
                            <?php echo htmlentities($user['username']) ?> - <?php echo htmlentities($user['role']) ?>
                            <?php if ($_SESSION['userinfo']['role'] == 'admin' && htmlentities($user['role']) != 'admin') { ?>
                                <input type="hidden" name="userID" value="<?php echo htmlentities($user['id']) ?>">
                                <input class="change_permissions_button edit_button" type="button" value="Change">
                            <?php } ?>
                        </label>
                        <div class="manage_content">
                            <p><strong>Username: </strong><?php echo htmlentities($user['username']) ?></p>
                            <p><strong>E-mail: </strong><?php echo htmlentities($user['email']) ?></p>
                            <p><strong>Status: </strong><?php echo htmlentities($user['status']) ?></p>
                            <input class="delete_button" type="button" value="Delete">
                        </div>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </section>
</main>
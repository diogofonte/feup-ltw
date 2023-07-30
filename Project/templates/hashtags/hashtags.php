<main style="background-color: #948f8c">
    <section>
        <?php if (($_SESSION['userinfo']['role'] == 'agent') || ($_SESSION['userinfo']['role'] == 'admin')) {?>
            <a href="/pages/hashtags.php"><input class="add_button" type="button" value="add new hashtag"></a>
        <?php } ?>
        <ul class="fixed_accordion">
            <?php if (($_SESSION['userinfo']['role'] == 'agent') || ($_SESSION['userinfo']['role'] == 'admin')) {?>
                <?php foreach ($hashtags as $hashtag) { ?>
                    <li>
                        <p>#<?php echo htmlentities($hashtag['name']) ?></p>
                        <div>
                            <input type="hidden" name="hashtagID" value="<?php echo htmlentities($hashtag['id']) ?>">
                            <input class="edit_button" type="button" value="Edit">
                            <input class="delete_button" type="button" value="Delete">
                        </div>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </section>
</main>
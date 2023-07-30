<main style="background-color: #948f8c">
    <div>
        <?php if (($_SESSION['userinfo']['role'] == 'agent') || ($_SESSION['userinfo']['role'] == 'admin')) {?>
            <a href="/pages/faq.php"><input class="add_button" type="button" value="Add New FAQ"></a>
        <?php } ?>
        <ul class="manage_accordion">
            <?php foreach ($faqs as $faq) { ?>
                <li>
                    <input type="checkbox" name="manage_accordion" id="<?php echo htmlentities($faq['id']) ?>">
                    <label for="<?php echo htmlentities($faq['id']) ?>"><?php echo htmlentities($faq['question']) ?></label>
                    <div class="manage_content">
                        <p><?php echo htmlentities($faq['answer']) ?></p>
                        <?php if (($_SESSION['userinfo']['role'] == 'agent') || ($_SESSION['userinfo']['role'] == 'admin')) {?>
                            <input type="hidden" name="FAQID" value="<?php echo htmlentities($faq['id']) ?>">
                            <input class="edit_button" type="button" value="Edit">
                            <input class="delete_button" type="button" value="Delete">
                        <?php } ?>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
</main>
<div id="dialog18" class="modal">
    <div class="modal-content">
        <div id="label_form">
            <input type="hidden" name="hashtagID">
            <p>Choose the hashtag</p>
            <?php foreach (getAllHashtags() as $hashtag) { ?>
                <input type="radio" id="<?php echo htmlentities($hashtag['id']) ?>" name="hashtagID" />
                <label for="<?php echo htmlentities($hashtag['id']) ?>"><?php echo htmlentities($hashtag['name']) ?></label>
            <?php } ?>
            <div class="buttons">
                <input type="button" value="Cancel" class="edit_button" >
                <input type="button" value="Submit" class="edit_button">
            </div>
        </div>
    </div>
</div>
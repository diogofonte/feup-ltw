<div id="dialog7" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete your account? This action is permanent.</p>
        <div class="buttons">
            <input onclick="closeDialog('Delete Account')" type="button" value="Cancel">
            <form action="../actions/action_delete_account.php" method="post">
                <input type="submit" name="Submit" value="Delete">
            </form>
        </div>
    </div>
</div>
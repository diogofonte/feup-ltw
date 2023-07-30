<?php
require_once(__DIR__ . '/../../includes/init.php');
require_once(__DIR__ . '/../dialogs/delete_account.php');
?>

<h1>Personal Information</h1>
<div class="content">
    <div id="account">
        <div id="fields">
            <form action="../actions/action_update_user.php" method="post" class="register_form">
                <label>Name</label>
                <input name="name" type="text" placeholder="Name" value="<?php echo htmlentities($_SESSION['userinfo']['name']) ?>" required="required">
                <label>Username</label>
                <input name="username" type="text" placeholder="Username" value="<?php echo htmlentities($_SESSION['userinfo']['username']) ?>" required="required">
                <span class="hint">Only lowercase and numbers, at least 6 characters</span>
                <label>Email</label>
                <input name="email" type="email" placeholder="Email" value="<?php echo htmlentities($_SESSION['userinfo']['email']) ?>" required="required">
                <label>Password</label>
                <input name="currpassword" type="password" placeholder="Password" required="required">
                <span class="hint">One uppercase, 1 symbol, 1 number, at least 6 characters</span>
                <h5> Optional </h5>
                <input name="password" type="password" placeholder="New Password">
                <span class="hint">One uppercase, 1 symbol, 1 number, at least 6 characters</span>
                <input name="passwordagain" type="password" placeholder="Repeat New Password">
                <span class="hint">Must match new password</span>
                <input type="submit" name="Submit" value="Update" class="edit_button">
            </form>
            <hr>
            <input onclick="openDialog('Delete Account')" type="submit" value="Delete Account" class="delete_button">
        </div>
        <div id="photo_field">
            <form action="../actions/api_upload_photo.php" method="post" enctype="multipart/form-data">
                <label>Photo</label>
                <img id="photo" src="<?php echo  htmlentities('../profilePictures/' . $_SESSION['userinfo']['photo']) ?>" alt="Profile Picture">
                <input type="file" name="fileToUpload" id="fileToUpload">
                <label>Reset profile picture: <input type="checkbox" name="reset" id="reset" value="1"></label>
                <input type="submit" name="Submit" value="Upload" class="edit_button">
                <input type="text" name="role" id="role" value="<?php echo htmlentities($_SESSION['userinfo']['role']) ?>" readonly>
            </form>
        </div>
    </div>
</div>
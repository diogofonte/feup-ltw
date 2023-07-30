<?php
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	require_once('../includes/init.php');
	require_once('../database/user.php');


	if (duplicateUsername($username)) {
		$_SESSION['ERROR'] = 'Duplicated Username';
		header("Location:" . $_SERVER['HTTP_REFERER']);
	} else if(duplicateEmail($email)) {
		$_SESSION['ERROR'] = 'Duplicated Email';
		header("Location:" . $_SERVER['HTTP_REFERER']);
	} else {
		$userID = createUser($username, $password, $name, $email);
		if ($userID != -1) {
			echo 'User Registered successfully';
			setCurrentUser($userID, $username);
			$_SESSION['userinfo'] = getUser($userID);
			header("Location: ../index.php");	
		} else {
			$_SESSION['ERROR'] = 'ERROR';
			header("Location:" . $_SERVER['HTTP_REFERER']);
		}
	}
?>
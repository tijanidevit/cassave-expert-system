<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';

	$session = new Session();
	$users = new users();

	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$password = md5($_POST['password']);

		if ($users->user_login($email,$password)) {
			$session->create_session('farmer',$email);
			echo 1;
		}
		else{
			echo 0;
		}
	}
?>
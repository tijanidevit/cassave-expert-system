<?php 
	include_once '../core/session.class.php';
	include_once '../core/users.class.php';
	include_once '../core/core.function.php';
	echo register();
	function register()
	{
		$session = new Session();
		$users = new users();
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$fullname = $_POST['fullname'];
			$password = md5($_POST['password']);

			if ($users->check_email($email)) {
				return displayWarning($email.' has already been registered. Try a unique one');
			}

			if ($users->register_user($fullname,$email,$password)) {
				$session->create_session('farmer',$email);
				return 1;
			}
			else{
				return displayWarning('Error With Server! Try again.');
			}
		}
	}
?>
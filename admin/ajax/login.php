<?php 
	include_once '../../core/session.class.php';
	include_once '../../core/admin.class.php';
	include_once '../../core/core.function.php';

	$session = new Session();
	$admin = new Admin();

	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		if ($admin->admin_login($username,$password)) {
			$session->create_session('admin','admin');
			echo 1;
		}
		else{
			echo 0;
		}
	}
?>
<!--SESSION.PHP-->
<?php
	include("config.php");
	session_start();

	if (!isset($_SESSION['login_user'])) {
		header("location:login.php");
		die();
	}
?>
<?php 
	include("connect.php");
	unset($_SESSION['login_admin']);
	header("Location: login_admin.php");
 ?>
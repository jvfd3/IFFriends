<?php 
	session_start();
	if (!$_SESSION['usuario']) {
		header('Location: index1.php');
		exit();		
	}
?>
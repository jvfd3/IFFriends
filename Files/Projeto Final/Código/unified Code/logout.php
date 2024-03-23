<?php
	session_start();
	session_destroy();
	$consulta = "UPDATE `usuario` SET `online`='0' WHERE `idusuario`='".$_SESSION['id']."'";
	$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
	header('Location: index.php');
	exit();
?>
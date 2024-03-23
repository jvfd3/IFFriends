<?php 
	session_start();
	include('conexao.php'); 
	$postagem = isset($_GET['postagem'])?$_GET['postagem']:"";
	$postando="INSERT INTO `postagem` (postagem_texto) VALUES ('$postagem')";
	if (mysqli_query($conexao, $postando)) {
		$_SESSION['autorizado'] = true;
		header('Location: pagina-pricipal.php');
        exit();
	} else {
		$_SESSION['nao_autorizado'] = true;
		header('Location: pagina-pricipal.php');
        exit();
	}
?>
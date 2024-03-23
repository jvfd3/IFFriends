<?php 
	session_start();
	include('conexao.php');
	
	$id = $_SESSION['id'];

	$postagem = isset($_POST['postagem'])?$_POST['postagem']:"";
	$data = date('Y-m-d');
	if ($postagem != "" && $postagem != " ") {
		$postando="INSERT INTO `postagem` (data_postagem, postagemtexto, usuario_idusuario) VALUES ('$data', '$postagem', '$id')";
	}
	echo"<br>";
	echo "$postando<br>";
	if (mysqli_query($conexao, $postando)) {
		$_SESSION['autorizado'] = true;
		$_SESSION['postagem'] = $postagem;
		echo "<br>ok";
		header('Location: pagina-pricipal.php');
        exit();
	} else {
		$_SESSION['nao_autorizado'] = true;
		echo "<br>erro";
		header('Location: pagina-pricipal.php');
        exit();
	}
?>
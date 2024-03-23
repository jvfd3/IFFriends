<?php
	session_start();
	include('conexao.php');
	$usuario = mysqli_real_escape_string($conexao, $_POST['tEmail']);
	$senha = mysqli_real_escape_string($conexao, $_POST['tSenha']);
	
	if($_POST['tLembrar'] == "on") {//lembrar do email digitado
		$_SESSION['email']=$usuario;
		$_SESSION['lembrar']="on";
	}

	if(!empty($_POST['tEmail']) || !empty($_POST['tSenha'])) {//verificar se passou algum campo vazio
		$query = "select * from usuario where email = '{$usuario}' and senha = ('{$senha}')";
		$result = mysqli_query($conexao, $query);
		$row = mysqli_num_rows($result);
	
		if($row == 1) {//confirma se existe o usuario
			$query = "SELECT `idusuario` FROM `usuario` WHERE email = '{$usuario}'";
			$result = mysqli_query ($conexao, $query);
			
			$row=$result->fetch_assoc();//Deixar o usuario online
			$query = "UPDATE `usuario` SET `online`='1' WHERE `idusuario`='".$row['idusuario']."'";
			$resultado = mysqli_query ($conexao, $query);
			$_SESSION['id'] = $row['idusuario'];
			$_SESSION['usuario'] = true;
			header('Location: pagina-pricipal.php');
			exit();
		}
	}
	//notificar que algum dos dados informados estão errados
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
?>
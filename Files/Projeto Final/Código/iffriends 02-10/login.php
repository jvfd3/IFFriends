<?php
			session_start();
			include('conexao.php');

			if(empty($_POST['tEmail']) || empty($_POST['tSenha'])) {
				header('Location: index.php');
				exit();
			}

			$usuario = mysqli_real_escape_string($conexao, $_POST['tEmail']);
			$senha = mysqli_real_escape_string($conexao, $_POST['tSenha']);

			$query = "select idusuario, from usuario where usuario = '{$usuario}' and senha = md5('{$senha}')";

			$result = mysqli_query($conexao, $query);

			$row = mysqli_num_rows($result);

			if($row == 1) {
				$_SESSION['usuario'] = $usuario;
				header('Location: login.html');
				exit();
			} else {
				$_SESSION['nao_autenticado'] = true;
				header('Location: index1.php');
				exit();
			}
?>
<?php
			session_start();
			include('conexao.php');
			$usuario = mysqli_real_escape_string($conexao, $_POST['tEmail']);
			$senha = mysqli_real_escape_string($conexao, $_POST['tSenha']);
			if ($_POST['tLembrar']==on) {
				$_SESSION['email']=$usuario;
				$_SESSION['lembrar']="on";
			}			
			
			if(empty($_POST['tEmail']) || empty($_POST['tSenha'])) {
				header('Location: index.php');
				exit();
			}

			$query = "select * from usuario where email = '{$usuario}' and senha = ('{$senha}')";

			$result = mysqli_query($conexao, $query);

			$row = mysqli_num_rows($result);

			if($row == 1) {
				$_SESSION['usuario'] = $usuario;
				$_SESSION['verificar'] = $row;
				header('Location: pagina-pricipal.php');
				exit();
			} else {
				$_SESSION['nao_autenticado'] = true;
				header('Location: index.php');
				exit();
			}
?>
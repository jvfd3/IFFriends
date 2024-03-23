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
				$consulta = "SELECT `idusuario` FROM `usuario` WHERE email = '{$usuario}'";
				$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
				$quant = mysqli_num_rows($resultado);
				for($i=0;$i<$quant;$i++){
					$rows=$resultado->fetch_assoc();
					$id = $rows['idusuario'];
				}
				$_SESSION['usuario'] = $usuario;
				$_SESSION['verificar'] = $row;
				$_SESSION['id'] = $id;
				$consulta = "UPDATE `usuario` SET `online`='1' WHERE `idusuario`='$id'";
				$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
				header('Location: pagina-pricipal.php');
				exit();
			} else {
				$_SESSION['nao_autenticado'] = true;
				header('Location: index.php');
				exit();
			}
?>
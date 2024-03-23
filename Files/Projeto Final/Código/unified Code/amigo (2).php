<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/amigo.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
			<?php 
			include ('conexao.php');
			include('menu.php');
			include('amigos-online.php');
			?>

			<center>
				<div id="amizade">
					<h1 id="titulo">Amigos</h1><br>
					<table id="amizade">
						<?php
						$id=isset($_SESSION['idpessoa'])?$_SESSION['idpessoa']:$_GET['id'];
							$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE usuario_idusuario='$id' or idamizade_amigo='$id' and data_confirmacao is not null ";
							$resultado = mysqli_query($conexao, $consulta) or die('error');
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							if ($rows['idamizade_amigo']!=$id) {
							$idamigo=$rows['idamizade_amigo'];
							$consulta1 = "SELECT `nome`, `local_foto_perfil`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							echo "<tr id='amizade'> 
							<td id='amizade'> <a href='perfilamigo.php?id=".$idamigo."'> <img src='".$rows1['local_foto_perfil'].$rows1['foto_perfil']."' width=100%></a> </td> 
							<td id='amizade'>".$rows1['nome']."	</td> </tr>";
							}
							else{
								$idamigo=$rows['usuario_idusuario'];
							$consulta1 = "SELECT `nome`, `local_foto_perfil`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							echo "<tr id='amizade'>
							<td id='amizade'> <a href='perfilamigo.php?id=".$idamigo."'> <img src='".$rows1['local_foto_perfil'].$rows1['foto_perfil']."' width='100%'> </a> </td>
							<td id='amizade'>".$rows1['nome']."</td> </tr>";
							}
						}
						?>
					</table>
				</div>
			</center>
		<!-- fim de mostrar amigo -->
	</body>
</html>
<?php 
	include ('conexao.php');
	include('menu.php');
	include('amigos-online.php');
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

			<center>
				<div id="postagens">
				<font size="5" face=arial><b>
					<h1 id="titulo">Amigos</h1><br>
					<table id="amizade">
						<?php
						$id=$_GET['id'];
							
							$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE `data_confirmacao` is not null and (`usuario_idusuario`='$id' or `idamizade_amigo`='$id')";
							$resultado = mysqli_query($conexao, $consulta) or die('error');
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							if ($rows['idamizade_amigo']!=$id) {
							$idamigo=$rows['idamizade_amigo'];
							$consulta1 = "SELECT `nome`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							echo "<tr id='amizade'> 
							<td id='amizade'>";
							if($rows1['foto_perfil'] != ""){
								echo " 
								<a id='link' href='perfilamigo.php?id=".$idamigo."'><img src=".$rows1['foto_perfil']." width=100%>
								</a></td>";}
								else{echo "
								<a id='link' href='perfilamigo.php?id=".$idamigo."'><img src='_imagens/profpic.jpg' width=100%>
								</a></td>";
							}
								echo"<td id='amizade'><a id='link' href='perfilamigo.php?id=".$idamigo."'> ".$rows1['nome']."</a>	
								</td></tr>";
						}
							else{
								$idamigo=$rows['usuario_idusuario'];
							$consulta1 = "SELECT `nome`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							echo "<tr id='amizade'> 
							<td id='amizade'> 
								";
							if($rows1['foto_perfil'] != ""){
								echo "<a id='link' href='perfilamigo.php?id=".$idamigo."'><img src=".$rows1['foto_perfil']." width=100%></a></td>";}
								else{echo "<a id='link' href='perfilamigo.php?id=".$idamigo."'><img src='_imagens/profpic.jpg' width=100%></a></td>";} 
							echo"<td id='amizade'><a id='link' href='perfilamigo.php?id=".$idamigo."'> ".$rows1['nome']."</a>	
							</td> </tr>";
							}
						}
						unset($id);
						?>
					</table>
					</b></font>
				</div>
			</center>
		<!-- fim de mostrar amigo -->
	</body>
</html>
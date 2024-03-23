<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="_css/login.css">
</head>
<body>
	<!-- menu da pagina -->
<!-- ver amigos online -->
			<div id="online">
						<center><h1>Online</h1></center>
						<hr>
			</div>
			<div id="amigo">
				<center>
					<table>
						<?php
						$id=$_SESSION['id'];
							$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE usuario_idusuario='$id' or idamizade_amigo='$id' and data_confirmacao is not null ";
							$resultado = mysqli_query($conexao, $consulta) or die('error');
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							if ($rows['idamizade_amigo']!=$id) {
							$idamigo=$rows['idamizade_amigo'];
							$consulta1 = "SELECT `nome`, `foto_perfil`, `online` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							}
							else{
								$idamigo=$rows['usuario_idusuario'];
							$consulta1 = "SELECT `nome`, `foto_perfil`, `online` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							}
							$nome = $rows1['nome'];
							$foto = $rows1['foto_perfil'];
							$online = $rows1['online'];
							if ($online == 1) {
							echo "<tr><td><img src='_imagens/bola-verde-png.png' width=50px></td>";
								if($foto != ""){
								echo "<td><img src=".$foto." width=50px></td>";}
								else{echo "<td><img src=_imagens/profpic.jpg width=50px></td>";}

								echo "<td>$nome</td></tr>";
							}
							else{
								echo "<tr>
								<td><img src='_imagens/bola-cinza-png-3.png' width=50px></td>";
								if($foto != ""){
								echo "<td><img src=".$foto." width=50px></td>";}
								else{echo "<td><img src=_imagens/profpic.jpg width=50px></td>";}

								echo "<td>$nome</td></tr>";
							}
						}
							?>
						<!-- <tr><td>icone</td><td>foto</td><td>nome</td></tr> aqui ira aparecer os amigos online -->
					</table>
				</center>
			</div>
		<!-- fim de amigos online -->
		<!-- pesqusa de amigos -->
		<!-- Fim da pesquisa de amigos-->
	</body>
</html>
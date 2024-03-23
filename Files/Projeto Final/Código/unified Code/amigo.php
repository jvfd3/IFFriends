<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<script src='nightly.min.js'></script>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/amigo.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<!-- menu da pagina -->
			<?php 
			include ('conexao.php');
			include('menu.php');
			include('amigos-online.php');
			?>
		<!-- Fim de menu -->

		<!-- ver amigos online -->
		<!-- Fim da pesquisa de amigos-->

		<!-- mostrar amigos -->
			<center>
				<div id="amizade">
					<h1 id="titulo">Amigos</h1><br>
					<div>
						<table>
							<tr>
								<td>
									<div id="divPesquisa">
										<form method="post" action="amigo.php">
											<input type="text" id="tBusca" name="busca" placeholder="Pesquisar"/>
											<button id="bBusca" type="submit"><img src="_imagens/1.png"/></button>
										</form>
										<?php
											$id=$_SESSION['idpessoa'];
											$busca=isset($_POST['busca'])?$_POST['busca']:"-";
											/*if ($busca != "") {
												$consulta = "SELECT `idusuario` FROM `usuario` WHERE `nome` like '$busca%' or `nome_social` like '$busca%'";
												$resultado = mysqli_query($conexao, $consulta) or die('error');
											    $quant = mysqli_num_rows($resultado);
											    for($i=0;$i<$quant;$i++){
											    $rows=$resultado->fetch_assoc();
												$idpessoa = $rows['idusuario'];
												$consulta1 = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE usuario_idusuario='$id' and idamizade_amigo='$idpessoa' or usuario_idusuario='$idpessoa' and idamizade_amigo='$id' and data_confirmacao is not null ";
												$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
												$quant1 = mysqli_num_rows($resultado1);
												for($i=0;$i<$quant1;$i++){
												$rows1=$resultado->fetch_assoc();
												if ($rows1['idamizade_amigo']!=$id) {
													//print_r($rows1);
												$idamigo=$rows1['idamizade_amigo'];
												$consulta2 = "SELECT `nome`, `local_foto_perfil`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
												echo "$consulta1";
												//$resultado2 = mysqli_query($conexao, $consulta2) or die('error');
												//$rows2=$resultado1->fetch_assoc();
												//echo "<tr id='amizade'> 
													//<td id='amizade'> 
													//<a href='perfilamigo.php?id=".$idamigo."'> 
														//<img src='".$rows2['local_foto_perfil'].$rows2['foto_perfil']."' width=100%></a> 
													//</td> 
													//<td id='amizade'>".$rows2['nome']."
													//</td> 
												//</tr>";
												}
												else{
													$idamigo=$rows1['usuario_idusuario'];
												$consulta2 = "SELECT `nome`, `local_foto_perfil`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
												$resultado2 = mysqli_query($conexao, $consulta2) or die('error');
												$rows2=$resultado2->fetch_assoc();
												//echo "<tr id='amizade'>";
												//echo "<td id='amizade'> <a href='perfilamigo.php?id=".$idamigo."'> <img src='".$rows2['local_foto_perfil'].$rows2['foto_perfil']."' width='100%'> </a> </td>";
												//echo "<td id='amizade'>".$rows1['nome']."</td> </tr>";
												}
											}
										}
										}*/
										?>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<table id="amizade">
						<?php
							if ($busca == "-"){ 
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
								<td id='amizade'> 
								<a href='perfilamigo.php?id=".$idamigo."'> 
									<img src='".$rows1['local_foto_perfil'].$rows1['foto_perfil']."' width=100%></a> 
								</td> 
								<td id='amizade'>".$rows1['nome']."
								</td> 
							</tr>";
							}
							else{
								$idamigo=$rows['usuario_idusuario'];
							$consulta1 = "SELECT `nome`, `local_foto_perfil`, `foto_perfil` FROM `usuario` WHERE `idusuario`='$idamigo'";
							$resultado1 = mysqli_query($conexao, $consulta1) or die('error');
							$rows1=$resultado1->fetch_assoc();
							echo "<tr id='amizade'>";
							echo "<td id='amizade'> <a href='perfilamigo.php?id=".$idamigo."'> <img src='".$rows1['local_foto_perfil'].$rows1['foto_perfil']."' width='100%'> </a> </td>";
							echo "<td id='amizade'>".$rows1['nome']."</td> </tr>";
							}
							}
						}
						?>
					</table>
				</div>
			</center>
		<!-- fim de mostrar amigo -->
	</body>
</html>
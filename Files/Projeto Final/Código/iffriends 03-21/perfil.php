<?php
	include('verifica-login.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<script src='nightly.min.js'></script>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/perfil.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
			
	</head>
	<body>
		<!-- menu da pagina -->
			<?php include('menu.php'); ?>
		<!-- Fim de menu -->

		<!-- ver amigos online -->
			<?php include('amigos-online.php'); ?>
		<!-- Fim da pesquisa de amigos-->

		<!-- mostar perfil de outro usuario -->
			<div id="postagens">
				<center>
					<table id="or"><!-- onde vai conter as opções -->
						<tr> <td rowspan="6"><center><?php include('foto_perfil.php'); ?></a></td></tr>


							<?php
								$id=$_SESSION['id'];
								$consulta = "SELECT * FROM `usuario` WHERE idusuario='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=0;$i<$quant;$i++){
									$rows=$resultado->fetch_assoc();
									//$nome = $rows['nome_foto'];
									//$local = $rows['local_foto'];
									//echo "<li id='fotos01'><img src='$local$nome' id='fotos'></li>";
								}
							?>


						<tr><td> <a href=editperf.php> <img src="_imagens/editperf.png" width=100></a></td></tr>
						<tr><td> </td></tr>
						<tr><td></td></tr>					

						<tr><td> <a href=fotos.php> <img src="_imagens/fotos.png" width=100> </a> </td></tr>
						<tr><td> <?php echo "<a href='amigo.php?id=".$_SESSION['id']."'> <img src='_imagens/amigos.png' width=100> </a>" ?> </td></tr>
					</table>

					<br><label><h1></h1></label><br>
					<div id="or">
						<table id="ordem"><!-- onde vai ser mostrado os dados do usuario do perfil -->
							<tr>
								<td id="or"><label>Nome:</label></td> 
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$nome = $rows['nome'];
									}
									echo "$nome";
									$_SESSION['nome']=$nome;
									?>
									</label><td>
							</tr>

							<tr>
								<td id="or"><label>E-mail:</label></td>
								<td><label>
									<?php
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$email = $rows['email'];
									}
									echo "$email";
									$_SESSION['email']=$email;
									?>
								</label></td> 
							</tr>

							<tr>
								<td id="or"><label>Cidade:</label> </td>
								<td><label><?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$cidade = $rows['cidade'];
									}
									$_SESSION['cidade']=$cidade;
									echo "$cidade";
									?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Bairro:</label> </td>
								<td><label><?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$bairro = $rows['bairro'];
									}
									$_SESSION['bairro']=$bairro;
									echo "$bairro";
									?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Curso:</label></td> 
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$curso = $rows['curso'];
									}
									$_SESSION['curso']=$curso;
									echo "$curso";
									?>
								</label></td>
							</tr>

							<tr>
								<td id="or"><label>Data de nascimento:</label> </td>
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$date = $rows['data_de_nascimento'];
									}
									echo "$date";
									$_SESSION['data']=$date;
									?>
								</label></td>
							</tr>

							<tr>
								<td id="or"><label>Telefone:</label></td> 
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$Telefone = $rows['telefone'];
									}
									echo "$Telefone";
									$_SESSION['telefone']=$Telefone;
									?>
								</label></td>
							</tr>

							<tr>
								<td id="or"><label>Gênero:</label></td> 
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$genero = $rows['genero'];
									}
									echo "$genero";
									$_SESSION['genero']=$genero;
									?>
								</label></td>
							</tr>

							<tr>
								<td id="or"><label>Nome Social:</label> </td>
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									for($i=0;$i<$quant;$i++){
										$rows=$resultado->fetch_assoc();
										$nome_social = $rows['nome_social'];
									}
									echo "$nome_social";
									$_SESSION['nome_social']=$nome_social;
									?>
								</label></td>
							</tr>	
						</table>
					</div>
				</center>
			</div>
		<!-- fim de mostar perfil de outro usuario-->
	</body>
</html>
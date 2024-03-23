<?php
	include('conexao.php');
	include('menu.php');
	include('amigos-online.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/perfil.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
			
	</head>
	<body>
<font size="5" face="arial">
		<!-- mostar perfil de outro usuario -->
			<div id="postagens">
				<center>
					<table id="or"><!-- onde vai conter as opções -->
						<tr> <td rowspan="6"><center><?php include('foto_perfil.php'); ?></a></td></tr>

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
								<td id="or"><label><b>Nome:</b></label></td> 
								<td><label>
									<?php
									$id=$_SESSION['id'];
									$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
									$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
									$quant = mysqli_num_rows($resultado);
									$i=0;
									if($i<$quant){
										$rows=$resultado->fetch_assoc();
										$nome = $rows['nome'];
										$email = $rows['email'];
										$cidade = $rows['cidade'];
										$bairro = $rows['bairro'];
										$curso = $rows['curso'];
										$date = $rows['data_de_nascimento'];
										$Telefone = $rows['telefone'];
										$genero = $rows['genero'];
										$nome_social = $rows['nome_social'];
										$senha = $rows['senha'];
										$rsenha = $rows['rsenha'];
									}
									$_SESSION['nome']=$nome;
									$_SESSION['email']=$email;
									$_SESSION['cidade']=$cidade;
									$_SESSION['bairro']=$bairro;
									$_SESSION['curso']=$curso;
									$_SESSION['data']=$date;
									$_SESSION['telefone']=$Telefone;
									$_SESSION['genero']=$genero;
									$_SESSION['nome_social']=$nome_social;
									$_SESSION['senha'] = $senha;
									$_SESSION['rsenha'] = $rsenha;
									echo "$nome";
									?>
									</label><td>
							</tr>

							<tr>
								<td id="or"><label><b>E-mail:</b></label></td>
								<td><label><?php echo $_SESSION['email']; ?></label></td> 
							</tr>

							<tr>
								<td id="or"><label><b>Cidade:</b></label> </td>
								<td><label><?php echo $_SESSION['cidade']; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Bairro:</b></label> </td>
								<td><label><?php echo $_SESSION['bairro']; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Curso:</b></label></td> 
								<td><label><?php echo $_SESSION['curso']; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Data de nascimento:</b></label> </td>
								<td><label><?php echo $_SESSION['data']; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Telefone:</b></label></td> 
								<td><label><?php echo $_SESSION['telefone'];?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Gênero:</b></label></td> 
								<td><label><?php echo $_SESSION['genero']; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Nome Social:</b></label> </td>
								<td><label><?php echo $_SESSION['nome_social']; ?>
								</label></td>
							</tr>	
						</table>
					</div>
				</center>
			</div>
			</font>
		<!-- fim de mostar perfil de outro usuario-->
	</body>
</html>
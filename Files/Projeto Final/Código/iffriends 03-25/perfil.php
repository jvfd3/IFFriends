<?php
	include('conexao.php');
	include('menu.php');
	include('amigos-online.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>	<!-- Nome que pagina tem -->
		<meta charset="UTF-8"/>

		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/perfil.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->

	</head>
	
	<body>

		<!-- mostar perfil do usuário -->

		<div id="postagens">
			<center>
				<table id="tabsup" ><!--  -->
				<!-- <table border=1> -->
					<tr>
						<td rowspan="4" style=width:250px><?php include('foto_perfil.php'); ?></a>
						</td>
					</tr>

					<tr>
						<td id="colsup" > <a href=editperf.php> <img src="_imagens/editperf.png" width=100></a>
						</td>
					</tr>
					
					<tr>
						<td id="colsup" > <a href=fotos.php> <img src="_imagens/fotos.png" width=100> </a>
						</td>
					</tr>
					
					<tr>
						<td id="colsup" > <?php echo "<a href='amigo.php?id=".$_SESSION['id']."'> <img src='_imagens/amigos.png' width=100> </a>" ?>
						</td>
					</tr>
				</table>
			</center>
			
				<br>
				<br>
				
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

					?>
				
				<br>
				<center>
				<div id="cxtab">
					
						<table id="tabinf" ><!-- onde vai ser mostrado os dados do usuario do perfil -->
							<!--	Os ids das colunas não foram utilizados mas estão no perfil.css	-->
							<tr>
								<td id=""><label>Nome:</label></td>
								<td id=""><label><?php echo "$nome";?></label></td>
							</tr>

							<tr>
								<td id=""><label>E-mail:</label></td>
								<td id=""><label><?php echo $_SESSION['email']; ?></label></td> 
							</tr>

							<tr>
								<td id=""><label>Cidade:</label> </td>
								<td id=""><label><?php echo $_SESSION['cidade']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Bairro:</label> </td>
								<td id=""><label><?php echo $_SESSION['bairro']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Curso:</label></td> 
								<td id=""><label><?php echo $_SESSION['curso']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Data de nascimento:</label> </td>
								<td id=""><label><?php echo $_SESSION['data']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Telefone:</label></td> 
								<td id=""><label><?php echo $_SESSION['telefone']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Gênero:</label></td> 
								<td id=""><label><?php echo $_SESSION['genero']; ?></label></td>
							</tr>

							<tr>
								<td id=""><label>Nome Social:</label> </td>
								<td id=""><label><?php echo $_SESSION['nome_social']; ?></label></td>
							</tr>	
						</table>
					</center>
				</div>
		
		</div>
	</body>
</html>
<?php
session_start();
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
		<?php include('menu.php'); ?>

		<!-- ver amigos online -->
			<?php include('amigos-online.php'); ?>
		<!-- Fim da pesquisa de amigos-->

		<!-- mostar perfil -->
			<div id="postagens">
				<center>
					<?php $mensagem=isset($_SESSION['solicitacao'])?$_SESSION['solicitacao']:"";
						echo $mensagem; 
						unset($_SESSION['solicitacao']) ?>
					<table id="or"><!-- onde vai conter as opções -->
						<?php
							include ('conexao.php');
							$id= (isset($_GET['id'])?$_GET['id'] : '');
							$_SESSION['idpessoa'] = $id;
							$consulta = "SELECT * FROM `usuario` WHERE idusuario='$id'";
							$resultado = mysqli_query($conexao, $consulta) or die('error');
						    $quant = mysqli_num_rows($resultado);
						    for($i=0;$i<$quant;$i++){
								$rows=$resultado->fetch_assoc();
								$nome = $rows['nome'];
								$email = $rows['email'];
								$cidade = $rows['cidade'];
								$Curso = $rows['curso'];
								$bairro = $rows['bairro'];
								$data = $rows['data_de_nascimento'];
								$telefone = $rows['telefone'];
								$genero = $rows['genero'];
								$nomes = $rows['nome_social'];
								$foto = $rows['local_foto_perfil'].$rows['foto_perfil'];
							}
						?>

						<tr> 
							<td rowspan="4">
							<?php 
							if ($foto=="")	{
								echo "<center><img src=_imagens/profpic.jpg width=200 height=200> </center>";
											}
							else	{
								echo "<center><img src=$foto width=200 height=200></center>";
									};
							?>
						
							</td>

							<td> <a href="adicionar.php"> <img src="_imagens/addamigo.png" width=100> </a></td>
						</tr>
						<tr><td></td></tr>
						<tr>
							<td> <a href=fotosamigo.php> <img src="_imagens/fotos.png" width=100> </a> </td>
						</tr>
						<tr>
							<td> <a href=amigo.php> <img src="_imagens/amigos.png" width=100> </a> </td>
						</tr>
					</table>

					<br><label><h1>Informações</h1></label><br>
					<div id="or">
						<table id="ordem"><!-- onde vai ser mostrado os dados do usuario -->
							<tr>
								<td id="or"><label>Nome:</label></td> 
								<td><label><?php echo $nome; ?></label><td>
							</tr>

							<tr>
								<td id="or"><label>E-mail:</label></td>
								<td><label><?php echo $email; ?></label></td> 
							</tr>

							<tr>
								<td id="or"><label>Cidade:</label> </td>
								<td><label><?php echo $cidade; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Bairro:</label> </td>
								<td><label><?php echo $bairro; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Curso:</label></td> 
								<td><label><?php echo $Curso; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Data de nascimento:</label> </td>
								<td><label><?php echo $data; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Telefone:</label></td> 
								<td><label><?php echo $telefone; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Gênero:</label></td> 
								<td><label><?php echo $genero; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label>Nome Social:</label> </td>
								<td><label><?php echo $nomes; ?></label></td>
							</tr>
						</table>
					</div>
				</center>
			</div>
		<!-- fim mostrar pefril -->
	</body>
</html>
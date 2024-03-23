<?php 
include('menu.php');
include ('conexao.php');
include('amigos-online.php'); 
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/perfil.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
	<font size="5" face="arial">
			<div id="postagens">
				<center>
					<?php $mensagem=isset($_SESSION['solicitacao'])?$_SESSION['solicitacao']:"";
						echo $mensagem; 
						unset($_SESSION['solicitacao']) ?>
					<table id="or"><!-- onde vai conter as opções -->
						<?php
							$id= (isset($_GET['id'])?$_GET['id'] : '');
							if ($id == $_SESSION['id']) {
								header('location: perfil.php');
							}
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
								$foto = $rows['foto_perfil'];
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
							<td> <?php echo "<a href=amigo.php?id=".$id.">"?> <img src="_imagens/amigos.png" width=100> </a> </td>
						</tr>
					</table>

					<br><label><h1>Informações</h1></label><br>
					<div id="or">
						<table id="ordem"><!-- onde vai ser mostrado os dados do usuario -->
							<tr>
								<td id="or"><label><b>Nome:</b></label></td> 
								<td><label><?php echo $nome; ?></label><td>
							</tr>

							<tr>
								<td id="or"><label><b>E-mail:</b></label></td>
								<td><label><?php echo $email; ?></label></td> 
							</tr>

							<tr>
								<td id="or"><label><b>Cidade:</b></label> </td>
								<td><label><?php echo $cidade; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Bairro:</b></label> </td>
								<td><label><?php echo $bairro; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Curso:</b></label></td> 
								<td><label><?php echo $Curso; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Data de nascimento:</b></label> </td>
								<td><label><?php echo $data; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Telefone:</b></label></td> 
								<td><label><?php echo $telefone; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Gênero:</b></label></td> 
								<td><label><?php echo $genero; ?></label></td>
							</tr>

							<tr>
								<td id="or"><label><b>Nome Social:</b></label> </td>
								<td><label><?php echo $nomes; ?></label></td>
							</tr>
						</table>
					</div>
				</center>
			</div>
			</font>
		<!-- fim mostrar pefril -->
	</body>
</html>
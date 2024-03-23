<?php
	include('verifica-login.php');
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<!-- menu da pagina -->
			<div id="interface">
					<!-- Incio da barra de pesquisa -->
					<table>
						<tr>
							<td>
								<form method="post" action="pesquisa.php">
								<div id="divBusca">
								<input type="text" id="txtBusca" name="busca" placeholder="Buscar..."/>
								<button id="btnBusca">
									<img src="_imagens/1.png"/>
								</button>
								</div>
								</form>
							</td>
							<td>
								<div id="sair"><a href="logout.php">sair</a></div>
							</td>
						<!-- Fim da barra de pesquisa -->
						</tr>
					</table>
			</div>
		<!-- Fim de menu -->

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
							$consulta = "SELECT * FROM `amizade` WHERE data_confirmacao IS NOT NULL and idamizade_amigo='{$id}'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							$idamigo = $rows['usuario_idusuario'];
							$consulta1="SELECT * FROM `usuario` WHERE idusuario='{$idamigo}'";
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							$rows1=$resultado1->fetch_assoc();
							$nome = $rows1['nome'];
							$foto = $rows1['foto_perfil'];
							//$icone = $rows1[''];
							echo "<tr><td>icone</td><td>$foto</td><td>$nome</td></tr>";
							}
							?>
						<!-- <tr><td>icone</td><td>foto</td><td>nome</td></tr> aqui ira aparecer os amigos online -->
					</table>
				</center>
			</div>
		<!-- fim de amigos online -->
		<!-- pesqusa de amigos -->
			<div id="busca">
				<table id="busca">
					<tr>
						<td id="pesquisa">
							<div id="divPesquisa">
								<input type="text" id="tBusca" placeholder="Pesquisar"/>
								<button id="bBusca"><img src="_imagens/1.png"/></button>
							</div>
						</td>
					</tr>
				</table>
			</div>
		<!-- Fim da pesquisa de amigos-->

		<!-- postagens -->
			<div id="postagens">
				<center>
					<table id="postagens">
						<tr>
							<td id="postagens"><a href=perfil.php> <img src="_imagens/profpic.jpg" width=70></a></td>

							<form method="post" action="postagem.php">
								<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"> </textarea></td>
													
							<td id="postagens2"> <input type="submit" value="Enviar" id="botao"></td>
							</form>
						</tr>
					</table>
				</center>
				<hr>
				<center>
					<table>
						<!-- Exibição da solicitações -->
						<?php
							$id=$_SESSION['id'];
							$consulta = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							$idamigo = $rows['usuario_idusuario'];
							$consulta1="SELECT * FROM `usuario` WHERE idusuario='{$idamigo}'";
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							$rows1=$resultado1->fetch_assoc();
							$nome = $rows1['nome'];
							echo "<form method='post' action='pagina-pricipal.php'>Aceitar solicitação de amizade de $nome 
								<button type='submit' name='aceitou' value='$idamigo'>aceitar</button>
									<button type='submit' name='naoaceitou' value='$idamigo'>não aceito</button><br></form>";
							}
						?>
						<!-- Se aceitou ou não a solicitação -->
						<?php
							$aceitou=isset($_POST['aceitou'])?$_POST['aceitou']:"";
							$naoaceitou=isset($_POST['naoaceitou'])?$_POST['naoaceitou']:"";
							$data=date('Y-m-d');
							if ($aceitou >= 1) {
							$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}' and usuario_idusuario='{$aceitou}'";
							$resultado2=mysqli_query($conexao, $consulta2);
							$rows2=$resultado2->fetch_assoc();
							$idamizade = $rows2['idamizade'];
							$teste="update `amizade` set data_confirmacao='$data' postagem_usuario_idusuario='$aceitou' where idamizade='$idamizade'";
							$enviar=mysqli_query($conexao, $teste) or die ('error');
							}
							elseif ($naoaceitou >= 1) {
								$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}' and usuario_idusuario='{$naoaceitou}'";
								$resultado2=mysqli_query($conexao, $consulta2);
								$rows2=$resultado2->fetch_assoc();
								$idamizade = $rows2['idamizade'];
								$teste="DELETE FROM `amizade` WHERE idamizade='$idamizade'";
								$enviar=mysqli_query($conexao, $teste) or die ('error');
							}
						?>
						<!-- Exibir o que vc postou -->
						<?php
				            if(isset($_SESSION['autorizado'])):
				            echo "
				            <div>
				            <tr><td><center>".$_SESSION['postagem']."</center></td></tr>
				            </div>";
				            
				            endif;
				            unset($_SESSION['autorizado']);
				          ?>
				          <?php
				            if(isset($_SESSION['nao_autorizado'])):?>
				            <?php
				            endif;
				            unset($_SESSION['nao_autorizado']);
				          ?>
				          <!-- Mostrar postagens -->
						<?php
							$consulta = "SELECT * FROM `amizade` WHERE 'idamizade_amigo'='$id' and 'usuario_idusuario'='$id'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							$idamigo = $rows['usuario_idusuario'];
				            $consulta = "SELECT * FROM `postagem` WHERE `usuario_idusuario`=$id and  ";
				            $resultado = mysqli_query($conexao, $consulta) or die('error');
				            $quant = mysqli_num_rows($resultado);
				            for($i=0;$i<$quant;$i++){
								$rows=$resultado->fetch_assoc();
								$postagem = $rows['postagemtexto'];
								echo "<div><tr><td><center>$postagem<br></center></td></tr></div>";
							}
				            }
				            mysqli_close($conexao);
						 ?>
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
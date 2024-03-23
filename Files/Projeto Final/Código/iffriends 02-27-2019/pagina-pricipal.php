<?php
	include('verifica-login.php');
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
								<div id="divBusca">
								<input type="text" id="txtBusca" placeholder="Buscar..."/>
									<a href="pesquisa.html"><button id="btnBusca"><img src="_imagens/1.png"/></button></a>
								</div>
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
						<tr><td>icone</td><td>foto</td><td>nome</td></tr><!-- aqui ira aparecer os amigos online -->
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

							<form method="get" action="postagem.php">
								<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"> </textarea></td>
													
							<td id="postagens2"> <input type="submit" value="Enviar" id="botao"></td>
							</form>
						</tr>
					</table>
				</center>
				<hr>
				<center>
					<table>
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
						<?php
							include('conexao.php'); 
				            $consulta = "SELECT * FROM `postagem` ORDER BY `postagem`.`idpostagem`";
				            $resultado = mysqli_query($conexao, $consulta) or die('error');
				            $quant = mysqli_num_rows($resultado);
				            for($i=0;$i<$quant;$i++){
								$rows=$resultado->fetch_assoc();
								$postagem = $rows['postagemtexto'];
								echo "<div><tr><td><center>$postagem<br></center></td></tr></div>";
							}
				            
				            mysqli_close($conexao);
						 ?>
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
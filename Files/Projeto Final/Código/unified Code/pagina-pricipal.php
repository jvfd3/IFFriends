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
							<td id="postagens"><a href=perfil.html> <img src="_imagens/profpic.jpg" width=70></a></td>
							<form method="get" action="pagina-pricipal.php">
								<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"> </textarea> <input type="file" name=""></td>
													
							<td id="postagens2"> <input type="submit" name="enviar" value="Enviar" id="botao"></td>
							</form>
						</tr>
					</table>
				</center>
				<hr>
				<center>
					<table>
						<?php
							include('conexao.php'); 
							$postagem = isset($_GET['postagem'])?$_GET['postagem']:"";
							$postando="INSERT INTO `postagem` (postagem_texto) VALUES ('$postagem')";
							if (mysqli_query($conexao, $postando)) {
								echo "<tr><td><center>$postagem</center</td></tr>";
				               
				            } else {
				               echo "erro";
				            }
				            /*mysqli_close($conexao);
				            include('conexao.php');
				            $consulta = "SELECT * FROM `postagem` WHERE 1";
				            $resultado = mysqli_query($consulta, $conexao);
				            echo "$resultado";
				            $quant = mysqli_num_rows($resultado);
				            for($i=0;$i<$quant;$i++){
				            	$exibir= mysql_result($resultado,$i,"postagem_texto");
				            	echo "$exibir";
				            }
				            	echo "leo";*/
      						
						 ?>
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
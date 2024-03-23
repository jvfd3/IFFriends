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
							
							<!-- JV: não sei quais as diferenças de usar o inputtext ou o text area para esse caso, mas usei o input pra conseguir usar o placeholder -->
					<!--	<td id="postagens1"><input type="text" name="postagem" id="idpostagem" size="90%" maxlength="90" placeholder="Compartilhe os seus pensamentos"></td><td>&nbsp;</td>-->
						<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"> </textarea>
												
							<td id="postagens2"> <input type="submit" name="enviar" value="Enviar" id="botao"></td>
						</tr>
					</table>
				</center>
				<hr>

				<center>
					<table>
						
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
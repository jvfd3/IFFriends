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
			<div id="interface">
				<!-- Incio da barra de pesquisa -->
					<div id="divBusca">
						<input type="text" id="txtBusca" placeholder="Buscar..."/>
							<a href="pesquisa.html"><button id="btnBusca"><img src="_imagens/1.png"/></button></a>
					</div>
				<!-- Fim da barra de pesquisa -->
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
						<tr><td></td></tr><!-- aqui ira aparecer os amigos online -->
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

		<!-- mostrar amigos -->
			<center>
				<div id="amizade">
					<h1 id="titulo">Amigos</h1><br>
					<div>
						<table>
							<tr>
								<td>
									<div id="divPesquisa">
										<input type="text" id="tBusca" placeholder="Pesquisar"/>
										<button id="bBusca"><img src="_imagens/1.png"/></button>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<table id="amizade">
						<tr id="amizade">
							<td id="amizade"> <a href=amigo1.jpg> <img src="_imagens/amigo1.jpg" width=100> </a> </td>
							<td id="amizade"> amigo 1</td>
						</tr>
						<tr id="amizade">
							<td id="amizade"> <a href=amigo2.jpg> <img src="_imagens/amigo2.jpg" width=100> </a> </td>
							<td id="amizade"> amigo 2</td>
						</tr>
						<tr id="amizade">
							<td id="amizade"> <a href=amigo3.jpg> <img src="_imagens/amigo3.jpg" width=100> </a> </td>
							<td id="amizade"> amigo 3</td>
						</tr>
						<tr id="amizade">
							<td id="amizade"> <a href=amigo4.jpg> <img src="_imagens/amigo4.jpg" width=100> </a> </td>
							<td id="amizade"> amigo 4</td>
						</tr>
					</table>
				</div>
			</center>
		<!-- fim de mostrar amigo -->
	</body>
</html>
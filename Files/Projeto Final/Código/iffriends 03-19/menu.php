<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="_css/login.css">
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
								<button id="btnBusca" type="submit">
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

</body>
</html>
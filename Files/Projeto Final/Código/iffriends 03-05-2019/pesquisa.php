<?php
session_start();
if ($_POST['busca'] != "") {
	$busca = $_POST['busca'];
}
else{ header("Location: ".$_SERVER['HTTP_REFERER']."");}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<script src='nightly.min.js'></script>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/pagina.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<!-- menu da pagina -->
			<div id="interface">
				<td>
							<!-- Incio da barra de pesquisa -->
								<div id="divBusca">
									<input type="text" id="txtBusca" placeholder="Buscar..."/>
									<button id="btnBusca"><img src="_imagens/1.png"/></button>
								</div>
							<!-- Fim da barra de pesquisa -->
						</td>
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

		<div id="pagina">
			<!-- informações sobre a pagina -->
					<div id="info">
							<center><h1><font size="5"> Filtrar Resultado</font></h1>
							<input type="radio" name="filtro" value="usuario">Usuário<br>
							<input type="radio" name="filtro" value="campi">Campi<br>
							<select>
								<option selected="curso">curso</option>
							</select>
							</center>
					</div>	
			<!-- fim de informações sobre a pagina -->

			<!-- Nome do que esta sendo buscado -->
				<div id="foto">
					<h1><?php echo $busca ?></h1>
					<hr>
					<?php
					include ('conexao.php');
					$consulta = "SELECT * FROM `usuario` WHERE nome='$busca'";
					$resultado = mysqli_query($conexao, $consulta) or die('error');
				    $quant = mysqli_num_rows($resultado);
				    for($i=0;$i<$quant;$i++){
					$rows=$resultado->fetch_assoc();
					$usuario = $rows['nome'];
					$_SESSION['idpessoa'] = $rows['idusuario'];
					echo "<a href='perfilamigo.php'>$usuario<br></a>";}
					?>
				</div>
			<!-- fim da are do que esta sendo buscado -->
			
			<!-- mostra o resuldado da busca -->
				<div id="poste">
					<center>
						<table id="poste">
							
						</table>
					</center>
				</div>
			<!-- fim do que esta sendo buscado -->
		</div>
</body>
</html>
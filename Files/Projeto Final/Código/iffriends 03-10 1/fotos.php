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
		<link rel="stylesheet" type="text/css" href="_css/fotos.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<!-- menu da pagina -->
			<div id="interface">
				<table>
					<tr>
						<td>
							<!-- Incio da barra de pesquisa -->
								<div id="divBusca">
									<input type="text" id="txtBusca" placeholder="Buscar..."/>
									<a href="pesquisa.html"><button id="btnBusca"><img src="_imagens/1.png"/></button>
								</div>
							<!-- Fim da barra de pesquisa -->
						</td>
						<td>
							<div id="sair"><a href="logout.php">sair</a></div>
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
		<!-- pesquisa de amigos -->
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

		<!-- area de foto -->
			<div id="postagens">
				<center>
					<?php
						if(isset($_SESSION['error1'])){echo $_SESSION['error1']; unset($_SESSION['error1']);}
						if(isset($_SESSION['error2'])){echo $_SESSION['error2'];unset($_SESSION['error2']);}
						if(isset($_SESSION['error3'])){echo $_SESSION['error3'];unset($_SESSION['error3']);}
						if(isset($_SESSION['error4'])){echo $_SESSION['error4'];unset($_SESSION['error4']);}
						if(isset($_SESSION['error5'])){echo $_SESSION['error5'];unset($_SESSION['error5']);}
						if(isset($_SESSION['error6'])){echo $_SESSION['error6'];unset($_SESSION['error6']);}
						if(isset($_SESSION['error7'])){echo $_SESSION['error7'];unset($_SESSION['error7']);}
						if(isset($_SESSION['sucesso'])){echo $_SESSION['sucesso'];unset($_SESSION['sucesso']);}
					?>
					<fieldset>
						<div id="titulo">
							<font size=5 face=arial color=cyan >	 Fotos	</font>
							<a>
							  	<div >
								  <div>
								    <br>Adicione sua foto
								  </div>
								</div>
								  <div>
								  	<form method="post" action="guarda-foto.php" enctype="multipart/form-data">
								  <input role="button" type="file" name="arquivo">
								 <!--Envia para o guarda-foto.php -->
								 <?php 
								  $_SESSION['origem']="fotos";
								  ?>
								  
								  <button type="submit">Salvar</button>
								  </form>
								</div>
							</a>
						</div>

						<ul id="album-fotos">
							<?php
								include ('conexao.php');
								$id=$_SESSION['id'];
								$consulta = "SELECT * FROM `albuns` WHERE usuario_idusuario='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=0;$i<$quant;$i++){
									$rows=$resultado->fetch_assoc();
									$nome = $rows['nome_foto'];
									$local = $rows['local_foto'];
									echo "<li id='fotos01'><img src='$local$nome' id='fotos'></li>";
								}
							?>
						</ul>
					</fieldset>
				</center>
			</div>
		<!-- are de foto -->
	</body>
</html>
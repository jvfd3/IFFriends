<?php
	include('menu.php');
	include('conexao.php');
	include('amigos-online.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="_css/fotos.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
			<div id="postagens">
				<center>
					<fieldset>
						<div id="titulo">
							<font size=5 face=arial color=cyan >	 Fotos	</font>
						</div>

						
						<ul id="album-fotos">
							<?php
								$id=$_SESSION['idpessoa'];
								$consulta = "SELECT `nome_foto` FROM `albuns` WHERE `usuario_idusuario`='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=0;$i<$quant;$i++){
									$rows=$resultado->fetch_assoc();
									//print_r($rows);
									$foto = $rows['nome_foto'];
									//echo "<br>$local";
									//echo "<img src='fotos/8/Album/511143270.jpg'>";
									echo "<li id='fotos01'><img src='$foto' id='fotos'></li>";
								}
							?>
						</ul>
					</fieldset>
				</center>
			</div>
		<!-- are de foto -->
	</body>
</html>
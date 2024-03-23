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
			<?php include('menu.php'); ?>
		<!-- Fim de menu -->

		<!-- ver amigos online -->
			<?php include('amigos-online.php'); ?>
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
						</div>

						<ul id="album-fotos">
							<?php
								include ('conexao.php');
								$id=$_SESSION['idpessoa'];
								$consulta = "SELECT * FROM `albuns` WHERE usuario_idusuario='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=0;$i<$quant;$i++){
									$rows=$resultado->fetch_assoc();
									$local = $rows['foto_album'];
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
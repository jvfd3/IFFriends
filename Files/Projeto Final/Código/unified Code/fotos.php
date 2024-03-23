<?php 
	include ('conexao.php');
	include('menu.php');
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
							<font size=5 face=arial color=cyan > Fotos	</font>
							<a>
								  <div>
								    <br>
								  </div>
								  <div>
								  	<?php 
								  $_SESSION['origem']="fotos";
								  ?>
								  	<form method="post" action="guarda-foto.php" enctype="multipart/form-data">
								  <div id="fotos1"><input role="button" type="file" name="arquivo" accept="image/jpeg, image/png" id="foto">
								  <div id="foto"><label for="foto" id="foto">Adicione sua foto</label></div>
								 <!--Envia para o guarda-foto.php -->
								  
								  <button type="submit" id="foto">Salvar</button></div>
								  </form>
								</div>
							</a>
						</div>

						<ul id="album-fotos">
							<?php
								$id=$_SESSION['id'];
								 $_SESSION['origem']="fotos";
								$consulta = "SELECT `nome_foto` FROM `albuns` WHERE usuario_idusuario='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=0;$i<$quant;$i++){
									$rows=$resultado->fetch_assoc();
									$foto = $rows['nome_foto'];
								
									echo "<li id='fotos01'><img src='$foto' id='fotos'  alt='Error na imagem'></li>";
								}
							?>
						</ul>
					</fieldset>
				</center>
			</div>
		<!-- are de foto -->
	</body>
</html>
<?php 
	include ('conexao.php');
	include('menu.php');
	include('amigos-online.php'); 
	error_reporting(0);
  ini_set(“display_errors”, 0 );
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
	<font face="arial">

		<!-- area de foto -->
			<div id="postagens">
				<center>
					<?php
						if(isset($_SESSION['error1'])){echo $_SESSION['error1']; unset($_SESSION['error1']);}
						if(isset($_SESSION['error2'])){echo $_SESSION['error2'];unset($_SESSION['error2']);}
						if(isset($_SESSION['error3'])){echo $_SESSION['error3'];unset($_SESSION['error3']);}
						if(isset($_SESSION['error4'])){echo $_SESSION['error4'];unset($_SESSION['error4']);}
						if(isset($_SESSION['error5'])){echo $_SESSION['error5'];unset($_SESSION['error5']);}
						if(isset($_SESSION['sucesso'])){echo $_SESSION['sucesso'];unset($_SESSION['sucesso']);}
					?>
					<fieldset>
						<div id="titulo">
							<font size=5 face=arial ><b>Fotos</b></font>
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
								  <label for="foto" id="foto">Escolha sua foto</label>
								 <!--Envia para o guarda-foto.php -->
								  
								  <button type="submit" id="foto">Envie</button></div>
								  </form>
								</div>
							</a>
						</div>

						<ul class="gallery">
							<?php
								$id=$_SESSION['id'];
								 $_SESSION['origem']="fotos";
								$consulta = "SELECT `nome_foto` FROM `albuns` WHERE usuario_idusuario='$id'";
								$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
								$quant = mysqli_num_rows($resultado);
								for($i=1;$i<=$quant;$i++){
									$rows=$resultado->fetch_assoc();
									$foto[] = $rows['nome_foto'];}
									$quant=count($foto);
									for($i=0;$i<$quant;$i++){
										if ($i == 0) {$a=$quant;}else{$a=$i-1;}
										if ($i == $quant) {$b=1;}else{$b=$i+1;}

									echo "<li>
				<a href='#".$foto[$i]."'><img id='foto' src='".$foto[$i]."' alt=''></a>
				<article id='".$foto[$i]."'>
					<figure>
						<a href='#img'><img id='foto1' src='".$foto[$i]."' alt=''></a>
					    <figcaption>".$quant[$i-1]."</figcaption>
					</figure>
					<nav>
						<a class='close' href='#close'>Close</a>
						<a class='arrow prev' href='#";if ($i == 0) {$a=$quant;echo $foto[$a];}else{$a=$i-1;echo $foto[$a];}echo"'>Previous</a>
						<a class='arrow next' href='#";if ($i == $quant) {$b=1;echo $foto[$b];}else{$b=$i+1;echo $foto[$b];}echo"'>Next</a>
					</nav>
				</article>
			</li>

			<?php endfor; ?>";
								}
							?></div>
						</ul>
					</fieldset>
				</center>
			</div>
			</font>
		<!-- are de foto -->
	</body>
</html>
</script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>IFFTool</title>
		<link rel="stylesheet" type="text/css" href="_css/inicio.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/php" href="fundo.php">
		<?php
		$a=@$_POST['cor'];
		$b="#ffffff";
		?>
	<style> 
		body{ 
		background-color: <?php switch ($a) {case "": echo $b;break; default: echo $a;
		break;}?>;
		} 
	</style>
	</head>

	<body>
		<div id="1">
		<div id="foto">
		<a href="index.php"><img src="_imagens/LogoIFF1.png"></a>
		</div>
		<button id="modo" class="lamp" type="button" aria-label="night-mode">Modo Noturno </button>
		
		<form method="post" action="index.php">
		<input type="color" name="cor"/>
		<button type="submit" name="mudaCor" id="cmuda" value="Mudar cor">muda cor</button>
		</form>

		<div id="inicio">
			<form id="Login">
				<div>
					<label for="cEmail">E-mail:</label>
 					<input type="email" name="tEmail" id="cEmail" />
				</div>

				<div>
					<label for="cSenha">Senha:</label>
					<input type="password" name="tSenha" id="cSenha" />
				</div>

				<div>
					<label for="cLembrarSenha">Lembrar-me</label><input type="checkbox" name="tLembrarSenha" id="cLembrarSenha" value="LembrarSenha">
				</div>

				<div class="button1">
					<button type="submit">Login</button>
				</div>
				<div class="button">
					<a href="cadastro.php"> <button type="button">Cadastro</button> </a>
				</div>
			</form>
		</div>
	</div>
	</body>
</html>

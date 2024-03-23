<?php
	session_start();
	isset($_SESSION['usuario'])?header('Location: pagina-pricipal.php'):"";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/><!-- Coloca acentuação -->
		<title>IFFRIENDS</title> <!-- Nome que pagina tem -->
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
		
		<!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="stylesheet" type="text/css" href="_css/estilo.css"> 
		<link rel="stylesheet" type="text/css" href="_css/estilo-1.css" media="screen and (min-width: 420px)">
		<link rel="stylesheet" type="text/css" href="_css/estilo-2.css" media="screen and (max-width: 870px)">
		<style>
			body{
				background-image:url("_imagens/bgverde.jpg");
				background-attachment:fixed;
				background-size:100% 100%;
				background-repeat:no-repeat;
			}
		</style>	
	</head>
	
	<body>
  			<div id="primeira">
    		<header id="cabecalho">
      		<p align=center> <a href="index.php"><img src="_imagens/logo3circle.png"></a></p><!-- Cria um link na logo OBS: tem que trocar o href no futuro -->
    		</header>
    		</div>
    	<!-- Fim da Primeira divisão da pagina -->

		<!-- terceira divisão da pagina -->
			<div id="inicio">
				<!-- Inicio do formulario -->
					<?php
						if(isset($_SESSION['nao_autenticado'])):
					?>
					<div class="notification">
						<font color=white><p>ERRO: Usuário ou senha inválidos.</p></font>
					</div>
					<?php
						endif;
						unset($_SESSION['nao_autenticado']);
					?>
					<form id="Login" method="post" action="login.php" ><!-- tem que fazer o action -->
						<table id="login">
							<tr>
								<td><label for="cEmail">E-mail:</label></td>
				 				<td><input type="email" name="tEmail" id="cEmail" size="50" maxlength="113" value="<?php if(isset($_SESSION['email'])):?>
				 				<?php echo $_SESSION['email'] ;?>
				 				<?php endif; unset($_SESSION['email']);?>"/></td>
							</tr>

							<tr>
								<td><label for="cSenha">Senha:</label></td>
								<td><input type="password" name="tSenha" id="cSenha" size="50"/></td>
							</tr>
						</table>

						<div id="lembrar">
									<label for="cLembrar">Lembrar-me</label><input type="checkbox" name="tLembrar" id="cLembrar" value="on" <?php if(isset($_SESSION['lembrar'])):?> checked <?php endif; unset($_SESSION['lembrar']);?> >
								</div>

						<div id="button1">
							<button type="submit" class="button">Login</button>
						</div>

						<div id="button">
							<a href="cadastro.php"><button type="button" class="button">Cadastro</button></a><!-- tera que trocar o href no futuro -->
						</div>
					</form>
				<!-- Fim do formulario -->
			</div>
		<!-- Fim da terceira divisão da pagina -->
	</body>
</html>
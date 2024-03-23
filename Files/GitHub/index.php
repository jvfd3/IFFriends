<?php
	/* Vai inicializar as variáveis de outros arquivos e não linha 4 não vai permitir que quem longou acesse essa pagina */
	session_start();
	isset($_SESSION['usuario'])?header('Location: pagina-pricipal.php'):"";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>IFFRIENDS</title>

		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="_css/estilo.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
	</head>
	
	<body>
		<div class="container">
			<!-- Inicio da logo -->
				<div id="logo">
					<header class="text-center">
						<a href="index.php">
							<img src="_imagens/logo3circle.png" class="img-fluid rounded mx-auto d-block">
						</a>
					</header>
				</div>
    		<!-- Fim da Primeira logo -->
			
			<!-- Inicio notifição de longin errado -->
				<?php
					if(isset($_SESSION['nao_autenticado'])):
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<p class="text-center">ERRO: E-mail ou Senha inválidos.</p>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
  					</button>
				</div>
				<?php
					endif;
					unset($_SESSION['nao_autenticado']);
				?>
			<!-- Fim notifição de longin errado -->

			<!-- Incio do formulario -->
					<form method="post" action="login.php">
						<div class="form-group row">
							<label for="cEmail" class="col-sm-2 col-form-label">E-mail:</label>
							<div class="col-sm-10">
								<input type="email" name="tEmail" id="cEmail" class="form-control" size="50" maxlength="113" 
									value="
										<?php if(isset($_SESSION['email'])):?>
										<?php echo $_SESSION['email'] ;?>
										<?php endif; unset($_SESSION['email']);?>
									"
								/><!-- Value vai voltar o email se tiver marcado lembrar-me -->
							</div>
						</div>

						<div class="form-group row">
							<label for="cSenha" class="col-sm-2 col-form-label">Senha:</label>
							<div class="col-sm-10">
								<input type="password" name="tSenha" id="cSenha" class="form-control" size="50"/>
							</div>
						</div>
						
						<div class="container text-center">
							<label for="cLembrar">Lembrar-me</label>
							<input type="checkbox" name="tLembrar" id="cLembrar" value="on" 
								<?php if(isset($_SESSION['lembrar'])):?> 
								checked <?php endif; unset($_SESSION['lembrar']);?> 
							>
						</div>

						<div class="btn-toolbar d-flex justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
							<div class="btn-group mr-2" role="group" aria-label="First group">
								<button type="submit" class="btn btn-light mb-2">Login</button>
							</div>
					</form>
							<div class="btn-group mr-2" role="group" aria-label="Second group">
								<a href="cadastro.php">
									<button type="button" class="btn btn-light mb-2">Cadastro</button>
								</a>
							</div>
						</div>
					
			<!-- Fim do formulario -->
			
		</div>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
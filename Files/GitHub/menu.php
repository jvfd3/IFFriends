<?php
include('verifica-login.php');
?>
<!-- menu da pagina -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<!-- Imagem do usuario -->
			<a class=" navbar-brand" href="pagina-pricipal.php">
				<img id='imgperf' <?php include('foto_perfil.php'); ?> width=30 height=30>
			</a>
		<!-- Fim de imagem de usuario -->
				
		<!-- Botão aparece em tela pequenas -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" 
			data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
			aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		<!-- Fim botão aparece em tela pequenas -->

		<div class="collapse navbar-collapse col-11" id="navbarSupportedContent">
			<!-- Barra de pequesa -->
				<form method="post" action="pesquisa.php" class="form-row col-xl form-inline">
					<input type="text" id="txtBusca" class="form-control col-9" name="busca" 
					placeholder="Buscar..." aria-label="Search"/>
							
					<button id="btnBusca" type="submit" class="form-control col-2 btn btn">
						<img src="_imagens/1.png"/>
					</button>	
				</form>
			<!-- Fim de barra de pequisa -->
					
			<!-- Menu de opções -->
				<ul class=" navbar-nav mr-auto"> 
					<li class="nav-item dropdown">
						<a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<b>Configuração</b>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="pagina-pricipal.php">Inicio</a>
							<a class="dropdown-item" href="perfil.php">Perfil</a>
							<a class="dropdown-item" href="fotos.php">Fotos</a>
							<?php echo "<a class='dropdown-item' href='amigo.php?id=".$_SESSION['id']."'>";?>Amigos</a>
							<a class="dropdown-item" href="logout.php"><b>Sair</b></a>
						</div>		
					</li>
				</ul>
			<!-- Fim de menu de opções -->
						
		</div>
	</nav>
<!-- Fim de menu -->

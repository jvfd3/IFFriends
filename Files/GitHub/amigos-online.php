<?php
/*include('verifica-login.php');*/
session_start();
include('conexao.php')
?><link rel="stylesheet" type="text/css" href="_css/login.css">
<!-- ver amigos online -->
	<div id="on" class="float-xl-right chatbox chatbox--tray chatbox--empty">
		<!-- Parte do titulo -->
			<div id="online" class="chatbox__title">
				<h1 id="texto" class="text-center"><a>Online</a></h1>
			</div>
		<!-- Fim do titulo -->
		<!-- Area que mostrar os usuarios -->
			<div id="amigo">
				<?php
					$id=$_SESSION['id'];//Vai pegar o id do usuario
					$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE 
					data_confirmacao is not null and (usuario_idusuario='$id' or idamizade_amigo='$id')";// buscar pelos amigos que apessoa tem
					$resultado = mysqli_query($conexao, $consulta);
					$quant = mysqli_num_rows($resultado);
					for($i=0;$i<$quant;$i++){//listar os amigos
						$rows=$resultado->fetch_assoc();
						$idamigo=$rows['idamizade_amigo']!=$id?$rows['idamizade_amigo']:$idamigo=$rows['usuario_idusuario'];
						$consulta1 = "SELECT `nome`, `foto_perfil`, `online` FROM `usuario` WHERE `idusuario`='$idamigo'";
						$resultado1 = mysqli_query($conexao, $consulta1);
						$rows1=$resultado1->fetch_assoc();
										
						echo "<div id='nome-a'>";
						if ($rows1['online'] == 1) {
							echo "<img src='_imagens/bola-verde-png.png' width=50px>";
						}else{
							echo "<img src='_imagens/bola-cinza-png-3.png' width=50px>";
						}

						if($foto != ""){
							echo "<img src=".$rows1['foto_perfil']." width=50px>";
						}else{
							echo "<img src=_imagens/profpic.jpg width=50px>";
						}

						echo "<b>".$rows1['nome']."</b></div>";
					}
				?>
			</div>
		<!-- Fim da area que mostar os usuarios -->
	</div>
<!-- Fim ver amigos online -->

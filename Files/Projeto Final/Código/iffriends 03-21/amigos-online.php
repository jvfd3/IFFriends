<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="_css/login.css">
</head>
<!-- ver amigos online -->
			<div id="online">
						<center><h1>Online</h1></center>
						<hr>
			</div>
			<div id="amigo">
				<center>
					<table>
						<?php
						/*$id=$_SESSION['id'];
							$consulta = "SELECT * FROM `amizade` WHERE data_confirmacao IS NOT NULL and idamizade_amigo='{$id}'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							$idamigo = $rows['usuario_idusuario'];
							$consulta1="SELECT * FROM `usuario` WHERE idusuario='{$idamigo}'";
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							$rows1=$resultado1->fetch_assoc();
							$nome = $rows1['nome'];
							$foto = $rows1['foto_perfil'];
							//$icone = $rows1[''];
							echo "<tr><td>icone</td><td>$foto</td><td>$nome</td></tr>";
							}*/
							?>
						<!-- <tr><td>icone</td><td>foto</td><td>nome</td></tr> aqui ira aparecer os amigos online -->
					</table>
				</center>
			</div>
		<!-- fim de amigos online -->
		<!-- pesqusa de amigos -->
		<!-- Fim da pesquisa de amigos-->
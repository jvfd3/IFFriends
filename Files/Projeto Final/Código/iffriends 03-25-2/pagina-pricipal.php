<?php
	include('conexao.php');
	include('menu.php');
	include('amigos-online.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
			<div id="postagens">
				<center>
					<table id="postagens">
						<tr id="postagens">
							<td id="postagens"><a href=perfil.php> <?php include('foto_perfil.php'); ?></a></td>

							<form method="post" action="postagem.php" enctype="multipart/form-data">
								<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"></textarea>
									<input type="file" name="arquivo" role="button" accept="video/mp4, image/jpeg" id="foto-video">
									<label for="foto-video"><img id="foto" src="_imagens/teste.png"></label></td>
													
							<td id="postagens2"> <input type="submit" value="Enviar" id="botao"></td>
							</form>
						</tr>
					</table>
				</center>
				<hr>
				<center>
					<table id="postagens1">

					<!--Exibição da solicitações -->
						<?php
							$id=$_SESSION['id'];
							$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE data_confirmacao is null and (usuario_idusuario='{$id}' or idamizade_amigo='{$id}')";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							for($i=0;$i<$quant;$i++){
							$rows=$resultado->fetch_assoc();
							if($rows['idamizade_amigo'] != $id){
								$idamigo = $rows['idamizade_amigo'];
							$consulta1="SELECT * FROM `usuario` WHERE idusuario='{$idamigo}'";
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							$rows1=$resultado1->fetch_assoc();
							$nome = $rows1['nome'];
							if ($quant1 >= 1) {
							echo "<form method='post' action='aceita.php'>Aceitar olicitação de amizade de $nome<button type='submit' name='aceitou' value='$idamigo'>aceitar</button> 	<button type='submit' name='naoaceitou' value='$idamigo'>não aceito</button><br></form>";
								}
							}
							}
						?>
					<!--Fim exibição da solicitações -->

					<!-- Mostra postagem --> 
						<?php
							$consulta = "SELECT usuario_idusuario FROM `amizade` WHERE data_confirmacao is not null and `idamizade_amigo`='$id'";
							$consulta1 = "SELECT idamizade_amigo FROM `amizade` WHERE data_confirmacao is not null and `usuario_idusuario`='$id'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							for($i=0;$i<$quant or $i<$quant1;$i++){
							$rows=$resultado->fetch_assoc();
							$rows1=$resultado1->fetch_assoc();
							if($rows["usuario_idusuario"] != ""){$ids [] = $rows["usuario_idusuario"];}
							if($rows1['idamizade_amigo'] != ""){$ids [] = $rows1['idamizade_amigo'];}
							}
							if ($quant == 1 or $quant1 == 1){
							$quant2 = count($ids);
							$quant3 = $quant2 - 1;
							for($i=0;$i<$quant2;$i++){
							if ($i == 0) {
							$idamigo =  "'".$id."' or '".$ids[$i]."'" ;
							}
							elseif ($i > 0 && $i < $quant3) {
							$idamigo = $idamigo." or '".$ids[$i]."'";
							}
							elseif ($i == $quant3) {
							$idamigo = $idamigo." or '".$ids[$i]."'";
							}
							}
							}elseif ($quant == 0 && $quant1 == 0) 
								{$idamigo = "'".$id."' ";}
							$consulta = "SELECT * FROM `postagem` WHERE `usuario_idusuario`=".$idamigo." ORDER BY `data_postagem`  DESC, `idpostagem` DESC";
							$consulta1 = "SELECT `nome`, `nome_social`, `foto_perfil` FROM `usuario` WHERE `idusuario`=".$idamigo."";
					            $resultado1 = mysqli_query($conexao, $consulta) or die('');
					            $quant1 = mysqli_num_rows($resultado1);
					            $resultado2 = mysqli_query($conexao, $consulta1) or die('');
					            $quant2 = mysqli_num_rows($resultado2);
					            if ($quant1 == 0) {
					            }
					            echo "<div><tr><center id='mostra'>";
					            for($a=0;$a<$quant1;$a++){
									$rows=$resultado1->fetch_assoc();
									$rows1=$resultado2->fetch_assoc();

									if ($rows1['nome_social']!="") {$nome=$rows1['nome_social'];}else{$nome=$rows1['nome'];}
									if ($rows1['foto_perfil']!="") {$foto=$rows1['foto_perfil'];}else{$foto="_imagens/profpic.jpg";}
									$postagem = $rows['postagemtexto'];
									$postagem1 = $rows['postagem-fv'];
									$extensao = @end(explode('.', $postagem1));
									if (isset($postagem) && $postagem1=="") {
										echo "<td class='postagens1'>$postagem</td></tr>";
									}elseif (isset($postagem) && isset($postagem1)) {
										if ($extensao == "mp4") {
										echo "<td class='postagens1'>$postagem<br><br>";
										echo "<video controls>
										<source id='postagens1' src=".$postagem1." type='video/mp4'>
										Desculpa mas não é possivel exibir o video
										</video><br></td>";
									}else{
										echo "<td class='postagens1'>$postagem<br><br>";
										echo "<img id='postagens1' src=".$postagem1."><br></td>";
									}
									}
									else{
										if ($extensao == "mp4") {
											echo "<td class='postagens1'><video controls>
										<source id='postagens1' src=".$postagem1." type='video/mp4'>
										Desculpa mas não é possivel exibir o video
										</video><br></td>";
									}else{
										echo "<td class='postagens1'><img id='postagens1' src=".$postagem1."><br></td>";
									}
									}
									echo "<br></center></tr>";
							}
								echo "</div>";
				            mysqli_close($conexao);
						 ?>
					<!-- Fim mostra postagem --> 
					</table>
				</center>
			</div>
	</body>
</html>
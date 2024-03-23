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
		<!-- postagens -->
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
					<?php
						if(isset($_SESSION['error'])):
					?>
					<div>
						<font color=white><p><?php echo $_SESSION['error']; ?></p></font>
					</div>
					<?php
						endif;
						unset($_SESSION['error']);
					?>
					<?php
						if(isset($_SESSION['sucesso'])):
					?>
					<div class="notification">
						<font color=white><p><?php echo $_SESSION['sucesso']; ?></p></font>
					</div>
					<?php
						endif;
						unset($_SESSION['sucesso']);
					?>
					<table id="postagens1">
						 <!--Exibição da solicitações -->
						<?php
							$id=$_SESSION['id'];
							$consulta = "SELECT * FROM `amizade` WHERE data_confirmacao is null and usuario_idusuario='{$id}'";
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
							if ($quant1 >= 1) {
							echo "<form method='post' action='pagina-pricipal.php'>Aceitar solicitação de amizade de $nome 
								<button type='submit' name='aceitou' value='$idamigo'>aceitar</button>
									<button type='submit' name='naoaceitou' value='$idamigo'>não aceito</button><br></form>";
								}
							}
						?>
						<!-- Se aceitou ou não a solicitação--> 
						<?php
							$aceitou=isset($_POST['aceitou'])?$_POST['aceitou']:"0";
							$naoaceitou=isset($_POST['naoaceitou'])?$_POST['naoaceitou']:"0";
							$data=date('Y-m-d');
							if ($aceitou >= 1) {
							$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}' or usuario_idusuario='{$aceitou}'";
							$resultado2=mysqli_query($conexao, $consulta2)or die('error');
							$rows2=$resultado2->fetch_assoc();
							$idamizade = $rows2['idamizade'];
							$teste="update `amizade` set data_confirmacao='$data' where idamizade='$idamizade'";
							$enviar=mysqli_query($conexao, $teste) or die ('error1');
							header("Location: pagina-pricipal.php");
							}
							elseif ($naoaceitou >= 1) {
								$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}' and usuario_idusuario='{$naoaceitou}'";
								$resultado2=mysqli_query($conexao, $consulta2);
								$rows2=$resultado2->fetch_assoc();
								$idamizade = $rows2['idamizade'];
								$teste="DELETE FROM `amizade` WHERE idamizade='$idamizade'";
								$enviar=mysqli_query($conexao, $teste) or die ('error2');
								header("Location: pagina-pricipal.php");
							}
						?>
						<?php
							$consulta = "SELECT usuario_idusuario FROM `amizade` WHERE data_confirmacao is not null and `idamizade_amigo`='$id'";
							$consulta1 = "SELECT idamizade_amigo FROM `amizade` WHERE data_confirmacao is not null and `usuario_idusuario`='$id'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							if($quant > 0 && $quant1 > 0){
							for($i=0;$i<$quant or $i<$quant1;$i++){
							$rows=$resultado->fetch_assoc();
							$rows1=$resultado1->fetch_assoc();
							$ids [] = $rows["usuario_idusuario"];
							$ids [] = $rows1['idamizade_amigo'];
							}
							$quant2 = count($ids);
							for($i=0;$i<$quant2;$i++){
								if ($i == 0) {
									$idamigo =  "'".$id."' or '".$ids[$i]."' or '" ;
								}
								elseif ($i > 0 && $i <= $quant) {
									$idamigo = " ".$idamigo.$ids[$i]."' or '";
								}
								elseif ($i > $quant) {
									$idamigo = "".$idamigo.$ids[$i]."'";
								}
								
							}
							}
							elseif ($quant === 0 && $quant1 === 0) 
								{$idamigo =  "'".$id."' ";}
							$consulta = "SELECT * FROM `postagem` WHERE `usuario_idusuario`=".$idamigo." ORDER BY `data_postagem`  DESC, `idpostagem` DESC";
					            $resultado1 = mysqli_query($conexao, $consulta) or die('');
					            $quant1 = mysqli_num_rows($resultado1);
					            if ($quant1 == 0) {
					            }
					            echo "<div><tr><center id='mostra'>";
					            for($a=0;$a<$quant1;$a++){
									$rows=$resultado1->fetch_assoc();
									$postagem = $rows['postagemtexto'];
									$postagem1 = $rows['postagem-fv'];
									$extensao = @end(explode('.', $postagem1));
									if (isset($postagem) && $postagem1=="") {
										echo "<td bgcolor='green'>$postagem</td></tr>";
									}elseif (isset($postagem) && isset($postagem1)) {
										if ($extensao == "mp4") {
										echo "<td bgcolor='green'>$postagem<br><br>";
										echo "<video controls>
										<source id='postagens1' src=".$postagem1." type='video/mp4'>
										Desculpa mas não é possivel exibir o video
										</video><br></td>";
									}else{
										echo "<td bgcolor='green'>$postagem<br><br>";
										echo "<img id='postagens1' src=".$postagem1."><br></td>";
									}
									}
									else{
										if ($extensao == "mp4") {
											echo "<td bgcolor='green'><video controls>
										<source id='postagens1' src=".$postagem1." type='video/mp4'>
										Desculpa mas não é possivel exibir o video
										</video><br></td>";
									}else{
										echo "<td bgcolor='green'><img id='postagens1' src=".$postagem1."><br></td>";
									}
									}
									echo "<br></center></tr>";
							}
								echo "</div>";
				            mysqli_close($conexao);
						 ?>
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
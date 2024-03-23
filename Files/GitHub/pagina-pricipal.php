<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>IFFTool</title> <!-- Nome que pagina tem -->

		<link rel="stylesheet" type="text/css" href="_css/menu-e-online.css">
		<link rel="stylesheet" type="text/css" href="_css/login.css"> <!-- Onde fica o arquivo de estilo da pagina -->
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
	   	<script src="_javascript/funcoes.js" type="text/javascript"></script>
	</head>
	<body>
		<?php
			error_reporting(0);
			include('conexao.php');
			include('menu.php');
			include('amigos-online.php');
			$id=$_SESSION['id'];
		?>
		<div id="postagens" class="container">
			<!-- Inicio da area de postagem -->
				<div id="postagens1" class="row col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
						
					<div id="postagens2" class="col-xl-2">
						<a href=perfil.php> 
							<img id='imgperf1' <?php include('foto_perfil.php'); ?> width='150' height='150'>
						</a>
					</div>

					<form method="post" action="postagem.php" enctype="multipart/form-data">
						<div id="postagens3" class="input-group col-xl-12">
							<div class="col-xl-8 form-group">
								<textarea name="postagem" id="idpostagem" rows="4" class="form-control"
								placeholder="Compartilhe os seus pensamentos"></textarea>
							</div>

							<div class="col-1"></div>
							
							<div id="postagens4" class="col-sm-2">
								<div class="row input-wrapper">
									<label for='input-file'>foto/videos</label>
									<input id='input-file' type='file' value='' name="arquivo" role="button" accept="video/mp4, image/jpeg" class="custom-file-input"/>
									<span id='file-name'></span>
								</div>

								<div class="row">
									<input type="submit" value="Enviar" id="botao" class="btn">
								</div>
							</div>
						</div>
					</form>
							
				</div>
			<!-- Fim da area de postagem -->
			<hr>

			<!--Exibição da solicitações -->
				<?php /**falta colocar link e a foto da pessoa */
					$consulta = "SELECT `usuario_idusuario`, `idamizade_amigo` FROM `amizade` WHERE data_confirmacao is null and (usuario_idusuario='{$id}' or idamizade_amigo='{$id}')";
					$resultado=mysqli_query($conexao, $consulta);
					$quant = mysqli_num_rows($resultado);
					for($i=0;$i<$quant;$i++){
						$rows=$resultado->fetch_assoc();
						if($rows['idamizade_amigo'] != $id){
							$idamigo = $rows['idamizade_amigo'];
							$consulta1="SELECT * FROM `usuario` WHERE idusuario='{$idamigo}'";
							$resultado1=mysqli_query($conexao, $consulta1);
							$rows1=$resultado1->fetch_assoc();
							echo "
								<div class='row col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center'>
								<form method='post' action='aceita.php'>
									<p><b>Solicitação de amizade</b></p>
									<p>".$rows1['nome']."</p> 
									<button type='submit' name='aceitou' value='$idamigo' class='btn btn-primary'>Aceitar</button> 	
									<button type='submit' name='naoaceitou' value='$idamigo' class='btn btn-secondary'>Não aceito</button>	
								</form>
								</div>
							";
						}
					}
				?>
			<!--Fim exibição da solicitações -->

			<!-- Inicio da area de publicações -->	
				
				<!-- Mostra postagem --> 
					<?php
						//busca pela amizade da pessoa. idamizade_amigo é quem pede amizade
							$consulta = "SELECT usuario_idusuario FROM `amizade` WHERE data_confirmacao is not null and `idamizade_amigo`='$id'";
							$consulta1 = "SELECT idamizade_amigo FROM `amizade` WHERE data_confirmacao is not null and `usuario_idusuario`='$id'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
						//Fim de busca pela amizade da pessoa
						
						//listar as amizades
							$idamigo = "'".$id."'";
							for($i=0;$i<$quant or $i<$quant1;$i++){
								$rows=$resultado->fetch_assoc();
								$rows1=$resultado1->fetch_assoc();
								if($rows["usuario_idusuario"] != "" && $rows["usuario_idusuario"] != $id){$ids [] = $rows["usuario_idusuario"];}
								if($rows1['idamizade_amigo'] != "" && $rows1["usuario_idusuario"] != $id){$ids [] = $rows1['idamizade_amigo'];}
							}
							if ($quant >= 1 or $quant1 >= 1){
								$quant = count($ids);
								for($i=0;$i<$quant;$i++){
									$idamigo = $idamigo." or '".$ids[$i]."'";
								}
							}
						//Fim de listar as amizades

						//Busca publicações
							$consulta = "SELECT * FROM `postagem` WHERE `usuario_idusuario`=".$idamigo." ORDER BY `data_postagem`  DESC, `idpostagem` DESC";
							$consulta1 = "SELECT `nome`, `nome_social`, `foto_perfil` FROM `usuario` WHERE `idusuario`=".$idamigo."";
							$resultado1 = mysqli_query($conexao, $consulta);
					        $quant1 = mysqli_num_rows($resultado1);
					        $resultado2 = mysqli_query($conexao, $consulta1);
					        $quant2 = mysqli_num_rows($resultado2);
					        if ($quant1 == 0) {
					        }else{
					            echo "<div id='publicacao'>";
					            for($a=0;$a<$quant1;$a++){
									$rows=$resultado1->fetch_assoc();//publicações
									$rows1=$resultado2->fetch_assoc();//dados do usuario
										
									if ($rows1['nome_social']!="") {$nome=$rows1['nome_social'];}else{$nome=$rows1['nome'];}
									if ($rows1['foto_perfil']!="") {$foto=$rows1['foto_perfil'];}else{$foto="_imagens/profpic.jpg";}
									echo $consulta1;
									$postagem = $rows['postagemtexto'];//texto
									$postagem1 = $rows['postagem-fv'];// Video ou foto

									//$extensao = @end(explode('.', $postagem1));
									echo "
										<div>
											<img src='".$foto."' id='imgperf1' width='50' height='50'>
											$nome
										</div>
									";
									echo"<div id='publicacao1' class='row col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center'>";
									if (isset($postagem) && $postagem1=="") {
										echo "<p class='text-center'><font face=arial>$postagem</font></p>";
									}elseif (isset($postagem) && isset($postagem1)) {
										if ($extensao == "mp4") {
										echo "<td class='postagens1'><font face=arial>$postagem</font><br><br>";
										echo "<video controls>
										<source id='postagens1' src=".$postagem1." type='video/mp4'>
										Desculpa mas não é possivel exibir o video
										</video><br></td>";
									}else{
										echo "<td class='postagens1'><font face=arial>$postagem</font><br><br>";
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
									echo "</div><br>";
							}
						}
				            mysqli_close($conexao);
						 ?>
					<!-- Fim mostra postagem --> 
					
					</table>
			</div>
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>
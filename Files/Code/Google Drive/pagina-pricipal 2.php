<?php
	include('verifica-login.php');
	include('conexao.php');
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
		<?php 
		include('menu.php');
		include('amigos-online.php');
		?>
		
		<!-- postagens -->
			<div id="postagens">
				<center>
					<table id="postagens">
						<tr>
							<td id="postagens"><a href=perfil.php> <?php include('foto_perfil.php'); ?></a></td>

							<form method="post" action="postagem.php">
								<td id="postagens1"><textarea name="postagem" id="idpostagem" rows="4" placeholder="Compartilhe os seus pensamentos"> </textarea></td>
													
							<td id="postagens2"> <input type="submit" value="Enviar" id="botao"></td>
							</form>
						</tr>
					</table>
				</center>
				<hr>
				<center>
					<table>
						<!-- Exibição da solicitações -->
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
						<!-- Se aceitou ou não a solicitação -->
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
							$enviar=mysqli_query($conexao, $teste) or die ('error');
							header("Location: pagina-pricipal.php");
							}
							elseif ($naoaceitou >= 1) {
								$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$id}' and usuario_idusuario='{$naoaceitou}'";
								$resultado2=mysqli_query($conexao, $consulta2);
								$rows2=$resultado2->fetch_assoc();
								$idamizade = $rows2['idamizade'];
								$teste="DELETE FROM `amizade` WHERE idamizade='$idamizade'";
								$enviar=mysqli_query($conexao, $teste) or die ('error');
								header("Location: pagina-pricipal.php");
							}
						?>
						<!-- Exibir o que vc postou -->
						<?php
				            if(isset($_SESSION['autorizado'])):
				            echo "
				            <div>
				            <tr><td><center>".$_SESSION['postagem']."</center></td></tr>
				            </div>";
				            
				            endif;
				            unset($_SESSION['autorizado']);
				          ?>
				          <?php
				            if(isset($_SESSION['nao_autorizado'])):?>
				            <?php
				            endif;
				            unset($_SESSION['nao_autorizado']);
				          ?>
				          <!-- Mostrar postagens -->
						<?php
							$consulta = "SELECT usuario_idusuario FROM `amizade` WHERE data_confirmacao is not null and `idamizade_amigo`='$id'";
							$consulta1 = "SELECT idamizade_amigo FROM `amizade` WHERE data_confirmacao is not null and `usuario_idusuario`='$id'";
							$resultado=mysqli_query($conexao, $consulta);
							$quant = mysqli_num_rows($resultado);
							$resultado1=mysqli_query($conexao, $consulta1);
							$quant1 = mysqli_num_rows($resultado1);
							if($quant > 0 or $quant1 > 0){
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
							elseif ($quant === 0 && $quant1 === 0) {$idamigo =  "'".$id."' ";}
							$consulta = "SELECT * FROM `postagem` WHERE `usuario_idusuario`=".$idamigo." ORDER BY `data_postagem` ASC";
					            $resultado1 = mysqli_query($conexao, $consulta) or die('error');
					            $quant1 = mysqli_num_rows($resultado1);
					            if ($quant1 == 0) {
					            }
					            for($a=0;$a<$quant1;$a++){
									$rows=$resultado1->fetch_assoc();
									$postagem = $rows['postagemtexto'];
									echo "<div><tr><td><center>$postagem<br></center></td></tr></div>";
								}
				            mysqli_close($conexao);
						 ?>
					</table>
				</center>
			</div>
		<!-- fim da postagem -->
	</body>
</html>
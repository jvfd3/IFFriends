<?php
session_start();
if ($_POST['busca'] != "") {
	$busca = $_POST['busca'];
}
//else{ header("Location: ".$_SERVER['HTTP_REFERER']."");}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title>
		<meta charset="UTF-8"/>
		<title>IFFTool</title> <!-- Nome que pagina tem -->
		
		<link rel="stylesheet" type="text/css" href="_css/pagina.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<?php include('menu.php');?>
		<!-- ver amigos online -->
		<?php include('amigos-online.php'); ?>
		<!-- Fim da pesquisa de amigos-->

		<div id="pagina">
			<!-- Nome do que esta sendo buscado -->
				<div id="foto">
					<h1><?php echo $busca ?></h1>
					<hr>
					<?php
					include ('conexao.php');
					$consulta = "SELECT * FROM `usuario` WHERE nome like '$busca%' or nome_social like '$busca%'";
					$resultado = mysqli_query($conexao, $consulta) or die('error');
				    $quant = mysqli_num_rows($resultado);
				    for($i=0;$i<$quant;$i++){
				    $rows = mysqli_fetch_array($resultado);
					$usuario[] = $rows['nome'];
					$idpessoa[] = $rows['idusuario'];
					echo "<br><br><table>";
						echo "<tr><td><a href='perfilamigo.php?id=".$idpessoa[$i]."' >$usuario[$i]</a></td</tr>";
					}
					echo "</tabel><br>";
					?>
				</div>
			<!-- fim da are do que esta sendo buscado -->
			
			<!-- mostra o resuldado da busca -->
				
			<!-- fim do que esta sendo buscado -->
		</div>
</body>
</html>
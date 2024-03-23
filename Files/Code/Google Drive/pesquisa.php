<?php
include('menu.php');
include ('conexao.php');
include('amigos-online.php');
if ($_POST['busca'] == "") {
	header("Location: ".$_SERVER['HTTP_REFERER']."");
}
else{$busca = $_POST['busca']; }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IFFriends</title><!-- Nome que pagina tem -->
		<meta charset="UTF-8"/>
	
		
		<link rel="stylesheet" type="text/css" href="_css/pesquisa.css">
		<link rel="shortcut icon" href="_imagens/icone.ico" type="image/x-icon" /><!-- Icone que fica na pagina -->
	</head>
	<body>
		<font face="arial">
		<div id="postagens">
	
			<!-- Nome do que está sendo buscado -->
				<div id="foto">
					<h1><?php echo $busca ?></h1>
					<hr> </hr>

					
						<table>
					
					<?php
					$consulta = "SELECT * FROM `usuario` WHERE nome like '%$busca%' or nome_social like '%$busca%'";
					$resultado = mysqli_query($conexao, $consulta) or die('error');
				    $quant = mysqli_num_rows($resultado);
				    for($i=0;$i<$quant;$i++){
				    $rows = mysqli_fetch_array($resultado);
					$usuario[] = $rows['nome'];
					$idpessoa[] = $rows['idusuario'];
					$foto[] = $rows['foto_perfil'];
					
					echo "<tr><td style=width:120px>";
					if ($foto[$i]=="")	{	echo "<img src=_imagens/profpic.jpg width=100 height=100>";	}
					else 				{	echo "<img src=$foto[$i] width=100 height=100>";			};
					echo "</td>";
				
					echo "<td style=width:180px>";
					echo "<a href='perfilamigo.php?id=".$idpessoa[$i]."' >";
					echo "<font size=32 color=black>";
					echo "$usuario[$i]";
					echo "</font>";
					echo "</a>";
					echo "</td></tr>";
							
					};	
					?>
					
					</table>
						<br>
				</div>
			<!-- fim da are do que esta sendo buscado -->
			
			<!-- mostra o resuldado da busca -->
				
			<!-- fim do que esta sendo buscado -->
		</div>
		</font>
</body>
</html>
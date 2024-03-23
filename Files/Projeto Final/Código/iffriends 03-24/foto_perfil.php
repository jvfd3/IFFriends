<?php
	
$id=$_SESSION['id'];
$consulta= "SELECT `foto_perfil` FROM `usuario` WHERE idusuario='$id'";
$resultado = mysqli_query($conexao, $consulta)or die ('Não foi possível conectar');
	$rows=$resultado->fetch_assoc();
	$foto=$rows['foto_perfil'];
	if ($foto==""){
		echo "<center><img id='imgperf' src=_imagens/profpic.jpg width=200 height=200> </center>";
		}
	else {	echo "<center><img id='imgperf' src=$foto width=200 height=200></center>";	};

?>
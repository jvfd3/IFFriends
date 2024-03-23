<?php
		session_start();
		include('conexao.php');
		$id=$_SESSION['id'];
		echo "$id";
		$consulta = "SELECT * FROM `usuario` WHERE idusuario = '$id'";
		$resultado = mysqli_query ($conexao, $consulta) or die ('Não foi possível conectar');
		$quant = mysqli_num_rows($resultado);
		echo "$consulta";
		$a="cidade";
		
		echo "$a";
		for($i=0;$i<$quant;$i++){
			$rows=$resultado->fetch_assoc();		
			$nome = $rows['$a'];		
		}
		echo "$nome";

?>
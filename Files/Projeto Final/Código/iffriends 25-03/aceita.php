<?php
session_start();
include('conexao.php');
	$aceitou=isset($_POST['aceitou'])?$_POST['aceitou']:"0";
	$naoaceitou=isset($_POST['naoaceitou'])?$_POST['naoaceitou']:"0";
	$data=date('Y-m-d');
	$id=$_SESSION['id'];
	if ($aceitou >= 1) {
	$consulta = "SELECT idamizade_amigo, usuario_idusuario FROM `amizade` WHERE data_confirmacao is null and (idamizade_amigo='{$aceitou}' and usuario_idusuario='{$id}' or idamizade_amigo='{$id}' and usuario_idusuario='{$aceitou}')";
	$resultado=mysqli_query($conexao, $consulta)or die('error');
	$rows=$resultado->fetch_assoc();
	if ($rows['idamizade_amigo'] != $id) {
		$teste="update `amizade` set data_confirmacao='$data' where idamizade_amigo='".$rows['idamizade_amigo']."' and usuario_idusuario='$id'";
	}else{$teste="update `amizade` set data_confirmacao='$data' where idamizade_amigo='$id' and usuario_idusuario='".$rows['usuario_idusuario']."'";}
	if(mysqli_query($conexao, $teste)){
	header("Location: pagina-pricipal.php");
	}}
	elseif ($naoaceitou >= 1) {
		$consulta2 = "SELECT * FROM `amizade` WHERE data_confirmacao is null and idamizade_amigo='{$naoaceitou}' and usuario_idusuario='{$id}'";
		$resultado2=mysqli_query($conexao, $consulta2);
		$rows2=$resultado2->fetch_assoc();
		$idamizade = $rows2['idamizade'];
		$teste="DELETE FROM `amizade` WHERE idamizade='$idamizade'";
		$enviar=mysqli_query($conexao, $teste) or die ('error2');
		header("Location: pagina-pricipal.php");
	}
?>
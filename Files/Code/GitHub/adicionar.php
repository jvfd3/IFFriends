<?php  
session_start();
include('conexao.php');
$data=date('Y-m-d');
$amigo=$_SESSION['idpessoa'];
$id=$_SESSION['id'];
$consulta = "SELECT idamizade_amigo, usuario_idusuario FROM `amizade` where `idamizade_amigo`='$amigo' and usuario_idusuario='$id' or `idamizade_amigo`='$id' and usuario_idusuario='$amigo'";
$resultado=mysqli_query($conexao, $consulta);
$quant = mysqli_num_rows($resultado);
if ($quant==0) {
	$teste="insert into `amizade`(idamizade_amigo, data_solicitacao, usuario_idusuario) values ('$id', '$data', '$amigo')";
	mysqli_query($conexao, $teste) or die ('error');
	$_SESSION['solicitacao']= "<font color=lime green><b>Solicitação enviada com sucesso!</font></b>";
	header("Location: ".$_SERVER['HTTP_REFERER']."");
	exit();
}
$_SESSION['solicitacao']= "<font color=red><b>Impossível enviar solicitação!</font></b>";
header("Location: ".$_SERVER['HTTP_REFERER']."");
exit();
?>
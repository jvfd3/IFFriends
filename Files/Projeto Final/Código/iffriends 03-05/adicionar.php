<meta charset="UTF-8"/>
<?php  
session_start();
include('conexao.php');
$data=date('Y-d-m');
$amigo=$_SESSION['idpessoa'];
$id=$_SESSION['id'];
$consulta = "SELECT * FROM `amizade` ORDER BY `idamizade_amigo`='$amigo' and usuario_idusuario='$id'";
$resultado=mysqli_query($conexao, $consulta);
$quant = mysqli_num_rows($resultado);
for($i=0;$i<$quant;$i++){
$rows=$resultado->fetch_assoc();
print_r($rows);
$idamigo = $rows['usuario_idusuario'];
$idusuario = $rows['idamizade_amigo'];
}
if ($quant==0) {
	$teste="insert into `amizade`(idamizade_amigo, data_solicitacao, usuario_idusuario, postagem_usuario_idusuario) values ('$amigo', '$data', '$id', '$id')";
	mysqli_query($conexao, $teste);
	$_SESSION['solicitacao']= "enviado com sucesso sua solicitação";
	header("Location: ".$_SERVER['HTTP_REFERER']."");
	exit();
}
$_SESSION['solicitacao']= "já foi enviado sua solicitação";
header("Location: ".$_SERVER['HTTP_REFERER']."");
exit();
?>
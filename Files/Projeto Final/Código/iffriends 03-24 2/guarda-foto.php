<?php
include('verifica-login.php');  
include ('conexao.php');
$id=$_SESSION['id'];
if(isset($_FILES['arquivo'])){
		$codigo_galeria = $_SESSION['id'];
		//INFO IMAGEM
		$file = $_FILES['arquivo'];
		$numFile1 = $file['name'];
		$numFile=count(array_filter($file));

		//REQUISITOS
		$permite 	= array('image/jpeg', 'image/png');
		$maxSize	= 1024 * 1024 * 5;
		
		if ($_SESSION['origem']=="fotos"){
			$folder		= 'fotos/'.$id.'/Album';}
		
		else if($_SESSION['origem']=="editperf"){
			$folder		= 'fotos/'.$id.'/ProfPic';}
		
		//MENSAGENS
		$msg = array();
		/*$errorMsg = array(
			1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
			2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
			3 => 'o upload do arquivo foi feito parcialmente',
			4 => 'Não foi feito o upload do arquivo'
		);*/
				$name 	= $file['name'];
				$type	= $file['type'];
				$size	= $file['size'];
				$error	= $file['error'];
				$tmp	= $file['tmp_name'];
				$extensao = @end(explode('.', $name));
				$novoNome = rand().".$extensao";
				$pasta = $folder.'/'.$novoNome;
				if($error != 0){
					$_SESSION['error3'] = $errorMsg[$error];
				}
				else if(!in_array($type, $permite)){
					$_SESSION['error4'] = "<b>$name :</b> Erro arquivo não suportada!";
				}
				else if($size > $maxSize){
					$_SESSION['error5'] = "<b>$name :</b> Erro arquivo ultrapassa o limite de 5MB";
				}
				else{
						if($_SESSION['origem']=="fotos"){
							if(move_uploaded_file($tmp, $pasta)){
								$inserir ="INSERT INTO `albuns` (`nome_foto`, `usuario_idusuario`) VALUES ('$pasta', '$id')";
						
							if (mysqli_query($conexao, $inserir)) {
								$_SESSION['sucesso'] = "<div class='alert alert-success'><b>Cadastrada com sucesso!</b></div>";}
							else{$_SESSION['error6'] = "<div class='alert alert-danger'>Não pôde ser cadastrada!</div>";}
							}
							unset($_SESSION['origem']);
							//header('Location: fotos.php');
							//exit();
						}
						
						elseif($_SESSION['origem']=="editperf"){
							
						
							$_SESSION['folder']=$folder;
								if(move_uploaded_file($tmp, $pasta)){
								$inserir = "UPDATE `usuario` SET `foto_perfil`='$pasta' WHERE idusuario='$id'";

							if (mysqli_query($conexao, $inserir)) {
								$_SESSION['sucesso'] = "<div class='alert alert-success'><b>Cadastrada com sucesso!</b></div>";}
								else{$_SESSION['error6'] = "<div class='alert alert-danger'>Não pôde ser cadastrada!</div>";}
								}
								unset($_SESSION['origem']);
							//header('Location: editperf.php');
							//exit();	
						}
					}		
			}
header("Location: ".$_SERVER['HTTP_REFERER']."");
exit();
?>
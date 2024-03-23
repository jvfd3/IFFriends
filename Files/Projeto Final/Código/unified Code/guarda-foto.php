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

		//PASTA
		$folder		= 'fotos/'.$id.'/';
		
		//REQUISITOS
		$permite 	= array('image/jpeg', 'image/png');
		$maxSize	= 1024 * 1024 * 5;
		
		//MENSAGENS
		$msg = array();
		$errorMsg = array(
			1 => 'O arquivo no upload é maior do que o limite definido em upload_max_filesize no php.ini.',
			2 => 'O arquivo ultrapassa o limite de tamanho em MAX_FILE_SIZE que foi especificado no formulário HTML',
			3 => 'o upload do arquivo foi feito parcialmente',
			4 => 'Não foi feito o upload do arquivo'
		);
		if($numFile <= 0){
			$_SESSION['error1'] = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Selecione pelo menos 3 fotos para galeria!
					</div>';
		}
		else if($numFile >=10){
			$_SESSION['error2'] = '<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						Você ultrapassou o limite de upload. Selecione até 9 fotos e tente novamente!
					</div>';
		}else{
				$name 	= $file['name'];
				$type	= $file['type'];
				$size	= $file['size'];
				$error	= $file['error'];
				$tmp	= $file['tmp_name'];

			for($i = 0; $i < $numFile; $i++){
				$extensao = @end(explode('.', $name));
				$novoNome = rand().".$extensao";
				if($error != 0){
					$_SESSION['error3'] = $errorMsg[$error];
				}
				else if(!in_array($type, $permite)){
					$_SESSION['error4'] = "<b>$name :</b> Erro imagem não suportada!";
				}
				else if($size > $maxSize){
					$_SESSION['error5'] = "<b>$name :</b> Erro imagem ultrapassa o limite de 5MB";
				}
				else{
					
					if(move_uploaded_file($tmp, $folder.'/'.$novoNome)){
						$inserir ="INSERT INTO `albuns` (nome_foto, local_foto, usuario_idusuario) VALUES ('$novoNome', '$folder', '$id')";
						if ( mysqli_query($conexao, $inserir)) {
							$_SESSION['sucesso'] = "<div class='alert alert-success'>cadastrada com Sucesso!</div>";
						}else{
							$_SESSION['error6'] = "<div class='alert alert-danger'>não pôde ser cadastrada!</div>";
						}}//else{
						//$_SESSION['error7'] = "<b>$name :</b> Desculpe! Ocorreu um erro...";}
				
				foreach($msg as $pop);
			}
		}
	}
}
header('Location: fotos.php');
exit();
?>
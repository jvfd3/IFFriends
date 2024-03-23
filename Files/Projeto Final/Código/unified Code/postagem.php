<?php 
	session_start();
	include('conexao.php');
	
	$id = $_SESSION['id'];
	$postagem = isset($_POST['postagem'])?$_POST['postagem']:"";
	$postagem1 = isset($_FILES['arquivo'])?$_FILES['arquivo']:"";
	$data = date('Y-m-d');
	if (isset($postagem1)) {
		$file = $_FILES['arquivo'];
		$numFile1 = $file['name'];
		$numFile=count(array_filter($file));
		$permite 	= array('video/mp4, image/jpeg');
		$maxSize	= 1024 * 1024 * 15;
		$folder		= 'fotos/'.$id.'/postagem';
		$name 	= $file['name'];
		$type	= $file['type'];
		$size	= $file['size'];
		$error	= $file['error'];
		$tmp	= $file['tmp_name'];
		$extensao = @end(explode('.', $name));
		$novoNome = rand().".$extensao";
		$pasta = $folder.'/'.$novoNome;
	if ($postagem != "" && $postagem1['name'] != "") {
		$postando="INSERT INTO `postagem` (data_postagem, postagemtexto, `postagem-fv`, usuario_idusuario) VALUES ('$data', '$postagem', '$pasta', '$id')";
	}
	elseif ($postagem != "") {
		$postando="INSERT INTO `postagem` (data_postagem, postagemtexto, usuario_idusuario) VALUES ('$data', '$postagem', '$id')";
		if (mysqli_query($conexao, $postando)) {
		header('Location: pagina-pricipal.php');
        exit();}
	}
	elseif ($postagem1 != "") {
		$postando="INSERT INTO `postagem` (data_postagem, `postagem-fv`, usuario_idusuario) VALUES ('$data', '$pasta', '$id')";
	}
	if(move_uploaded_file($tmp, $pasta)){}
	elseif($size > $maxSize){
					$_SESSION['error'] = "<b>$name :</b> Erro arquivo ultrapassa o limite de 15MB";
				}
		elseif(!in_array($type, $permite)){
					$_SESSION['error'] = "<b>$name :</b> Erro arquivo não suportada!";
				}
		else{$_SESSION['error'] = "<div class='alert alert-danger'>não pôde ser enviado o arquivo!</div>";}
		}
	if (mysqli_query($conexao, $postando)) {
		header('Location: pagina-pricipal.php');
        exit();
    }
	else {
		header('Location: pagina-pricipal.php');
        exit();
	}
?>
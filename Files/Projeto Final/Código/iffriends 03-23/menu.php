<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="_css/login.css">
   	<script type="text/javascript">
	    startList = function() {
	    if (document.all&&document.getElementById) {
	    navRoot = document.getElementById("menuDropDown");
	    for (i=0; i<navRoot.childNodes.length; i++) {
	    node = navRoot.childNodes[i];
	    if (node.nodeName=="LI") {
	    node.onmouseover=function() {
	    this.className+=" over";
	      }
	      node.onmouseout=function() {
	      this.className=this.className.replace
	      (" over", "");
	       }
	       }
	      }
	     }
	    }
	    window.onload=startList;
	</script>
</head>
<body>
	<style>
		body{
			background-image:url("_imagens/bgverde.jpg");
			background-attachment:fixed;
			background-size:100% 100%;
			background-repeat:no-repeat;
		}
	</style>
	<!-- menu da pagina -->
			<div id="interface">
					<!-- Incio da barra de pesquisa -->
					<table>
						<tr>
							<td>
								<form method="post" action="pesquisa.php">
								<div id="divBusca">
								<input type="text" id="txtBusca" name="busca" placeholder="Buscar..."/>
								<button id="btnBusca" type="submit">
									<img src="_imagens/1.png"/>
								</button>
								</div>
								</form>
							</td>
							<td>
								<nav id="menu">
									<ul> 
									    <li><a href="#">configuração</a>
									      <ul> 
									        <li><a href="pagina-pricipal.php">inicio</a></li> 
									        <li><a href="perfil.php">perfil</a></li> 
									        <li><a href="fotos.php">fotos</a></li> 
									        <li><a href="amigos.php">amigos</a></li>
									        <li><?php echo "<a href='amigo.php?id=".$_SESSION['id']."'>"; ?>sair</a></li> 
									      </ul> 
										</li>
									</ul>
								</nav>
							</td>
						<!-- Fim da barra de pesquisa -->
						</tr>
					</table>
			</div>
		<!-- Fim de menu -->

</body>
</html>
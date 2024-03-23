<?php 
function mudacor() {

			$a=@$_POST['cor'];
			$b="#ffffff";
			return "
		<style> 
			body{ 
				background-color: <?php switch ($a) {case '': echo $b;break; default: echo $a;
				break;}?>;
			} 
		</style>
		";
	}
?>
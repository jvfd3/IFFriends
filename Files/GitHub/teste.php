<?php
$a=5;
$quant2 = 9999;
$quant3 = $quant2 - 1;
	for($i=0;$i<$quant2;$i++){
	if ($i == 0) {
	$idamigo =  "'".'-1'."' or '".$i."'" ;
	}
	elseif ($i > 0 && $i < $quant3) {
	$idamigo = $idamigo." or '".$i."'";
	}
	elseif ($i == $quant3) {
	$idamigo = $idamigo." or '".$i."'";
	}
}
echo "<br>$idamigo";
?>
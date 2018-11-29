<?php
require 'Controller.php';
require 'Bd.php';
$f=$_GET['Ser'];
$C = new Controller($bd);
$services = $C->getProducts($f);
$i=0;
echo '<span class="bigtitle">Products :</span><span class="label label-danger" style="font-family: Michroma; margin-top:1%; margin-right:2.5%; font-size:0.8em; float:right;">Pleas do not order before contacting me</span>
		<div style="display: flex; overflow: scroll;" id="data2">';
foreach ($services as $service) {
	echo '<div class="product" id="p'.$i.'" onmouseenter="fade2('.$i.')" onmouseleave="clair2('.$i.')">
			<a href="#/" onclick="modal2('.$service->getId().')">
			<img src="../Img/Products/NameLogo/'.$service->getName().'.jpg">
			</a>
		  </div>
	';
	$i++;
}
echo "</div>";
?>
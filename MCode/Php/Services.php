<?php
require 'Controller.php';
require 'Bd.php';
$f=$_GET['Ser'];
$C = new Controller($bd);
$services = $C->getServices($f);
$i=0;
echo '<span class="bigtitle">Services :</span><span class="label label-danger" style="font-family: Michroma; margin-top:1%; margin-right:2.5%; font-size:0.8em; float:right;">Pleas do not order before contacting me</span>
		<div style="display: flex; overflow: scroll;" id="data">';
foreach ($services as $service) {
	echo '<div class="service" id="s'.$i.'" onmouseenter="fade('.$i.')" onmouseleave="clair('.$i.')">
			<a href="#/" onclick="modal('.$service->getId().')">
			<img src="../Img/Services/'.$service->getName().'.jpg">
			<br>
			<span class="sertitle">'.$service->getName().'</span>
			<span class="serprice">Starting at '.$service->getSprice().'$</span>
			</a>
		  </div>
	';
	$i++;
}
echo "</div>";
?>
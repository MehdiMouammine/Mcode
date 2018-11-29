<?php
require 'Controller.php';
require 'Bd.php';
$f=$_GET['Ser'];
$C = new Controller($bd);
$product = $C->getProduct($f);
if (isset($_COOKIE['Email'])) {
$buying='<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma;"><a href="https://www.paypal.me/Mouammine/'.$product->getPrice().'" class="btn btn-primary"><i class="fa fa-paypal"></i> Buy</a></div>';
}
else {
$buying='<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma;"><a href="../index.php" class="btn btn-warning"><i class="fa fa-paypal"></i> Log in to buy</a></div>';
}
echo '<a style="background-color: red; color: #FFF; margin-left: 98%; position: absolute;" class="btn btn-xs" href="#/" onclick="nomodal()" id="close"><i class="fa fa-times"></i></a>
	<div style="display:flex;">
    	<div style="width: 30%; background-color:#EEE;">
    		<img src="../Img/Products/Logo/'.$product->getName().'.jpg" style="width:80%; margin:10%; border-radius:0.8em;"><br>
            <div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma;"><i class="fa fa-money"></i> '.$product->getPrice().'$</div>
            '.$buying.'
    	</div>
    	<div style="width: 70%; background-color:#DDD;">
    		<span class="hugetitle">'.$product->getName().'</span>
    		<div style="font-size:1.3em; font-family: Orbitron; margin:3%;">'.$product->getDescription().'</div>
            <div style="display:flex; margin:2%;">
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'1.jpg" width="100%;" onclick="openModal(1)" ></div>
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'2.jpg" width="100%;" onclick="openModal(2)" ></div>
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'3.jpg" width="100%;" onclick="openModal(3)" ></div>
            </div>
            <div style="display:flex; margin:2%;">
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'4.jpg" width="100%;" onclick="openModal(4)" ></div>
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'5.jpg" width="100%;" onclick="openModal(5)" ></div>
                <div class="hover-shadow cursor" style="width:32%; margin:1%; border-radius:0.8em;"><img src="../Img/Products/Screens/'.$product->getName().'6.jpg" width="100%;" onclick="openModal(6)" ></div>
            </div>
    	</div>
    </div>';
?>
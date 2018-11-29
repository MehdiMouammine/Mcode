<?php
require 'Controller.php';
require 'Bd.php';
$f=$_GET['Ser'];
$C = new Controller($bd);
$product = $C->getProduct($f);
echo '
<div class="mySlides">
      <div class="numbertext">1 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'1.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'2.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'3.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">4 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'4.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">5 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'5.jpg" style="width:100%">
    </div>
    
    <div class="mySlides">
      <div class="numbertext">6 / 6</div>
      <img src="../Img/Products/Screens/'.$product->getName().'6.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'1.jpg" style="width:100%" onclick="currentSlide(1)">
    </div>
    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'2.jpg" style="width:100%" onclick="currentSlide(2)">
    </div>
    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'3.jpg" style="width:100%" onclick="currentSlide(3)">
    </div>
    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'4.jpg" style="width:100%" onclick="currentSlide(4)">
    </div>
    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'5.jpg" style="width:100%" onclick="currentSlide(5)">
    </div>
    <div class="column">
      <img class="demo cursor" src="../Img/Products/Screens/'.$product->getName().'6.jpg" style="width:100%" onclick="currentSlide(6)">
    </div>';
?>
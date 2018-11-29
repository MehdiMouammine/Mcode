<?php
require 'Controller.php';
require 'Bd.php';
$f=$_GET['Ser'];
$C = new Controller($bd);
$service = $C->getService($f);
if (isset($_COOKIE['Email'])) {
$buyings='<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="FCRASHVB5YJZC">
                        <div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma;">
                        <button value="submit" name="submit" alt="PayPal - The safer, easier way to pay online!" class="btn btn-primary btn-default"><i class="fa fa-paypal"></i> Buy</a></button>
                        </div>
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>';
$buyingm='<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="62GQN54UYDPAN">
                        <div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma;">
                        <button value="submit" name="submit" alt="PayPal - The safer, easier way to pay online!" class="btn btn-primary btn-default"><i class="fa fa-paypal"></i> Buy</a></button>
                        </div>
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form> ';
$buyingl='<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="7W942LRGSHMJ8">
                        <div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma;">
                        <button value="submit" name="submit" alt="PayPal - The safer, easier way to pay online!" class="btn btn-primary btn-default"><i class="fa fa-paypal"></i> Buy</a></button>
                        </div><img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>';
}
else {
$buyings='<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma;"><a href="../index.php" class="btn btn-warning"><i class="fa fa-paypal"></i> Log in to buy</a></div>';
$buyingm='<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma;"><a href="../index.php" class="btn btn-warning"><i class="fa fa-paypal"></i> Log in to buy</a></div>';
$buyingl='<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma;"><a href="../index.php" class="btn btn-warning"><i class="fa fa-paypal"></i> Log in to buy</a></div>';
}
echo '<a style="background-color: red; color: #FFF; margin-left: 98%; position: absolute;" class="btn btn-xs" href="#/" onclick="nomodal()" id="close"><i class="fa fa-times"></i></a>
	<div style="display:flex;">
    	<div style="width: 30%; background-color:#EEE;">
    		<img src="../Img/Services/'.$service->getName().'.jpg" style="width:96%; margin:2%; border-radius:0.8em;">
    	</div>
    	<div style="width: 70%; background-color:#DDD;">
    		<span class="hugetitle">'.$service->getName().'</span>
    		<div style="font-size:1.3em; font-family: Orbitron; margin:3%;">'.$service->getDescription().'</div>
    		<div style="display:flex; margin-bottom:5%;">
    			<div style="width:30%; margin-left:1.5%; margin-right:1.5%; background-color:#F8F8FF; border-radius:0.5em;">
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-ticket"></i> S-Pass</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:12% 2% 12% 2%; font-family: Orbitron; border-bottom: 0.15em solid #666;">'.$service->getSdesc().'</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-calendar"></i> '.$service->getSdays().' Days</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-money"></i> '.$service->getSprice().'$</div>
					'.$buyings.'
    			</div>
    			<div style="width:30%; margin-left:1.5%; margin-right:1.5%; background-color:#F8F8FF; border-radius:0.5em;">
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-ticket"></i> A-Pass</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:12% 2% 12% 2%; font-family: Orbitron; border-bottom: 0.15em solid #666;">'.$service->getMdesc().'</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-calendar"></i> '.$service->getMdays().' Days</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-money"></i> '.$service->getMprice().'$</div>
    				'.$buyingm.'
    			</div>
    			<div style="width:30%; margin-left:1.5%; margin-right:1.5%; background-color:#F8F8FF; border-radius:0.5em;">
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-ticket"></i> X-Pass</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:12% 2% 12% 2%; font-family: Orbitron; border-bottom: 0.15em solid #666;">'.$service->getLdesc().'</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-calendar"></i> '.$service->getLdays().' Days</div>
    				<div style="font-size:1.2em; text-align:center; margin:2%; padding:2%; color:green; font-family: Michroma; border-bottom: 0.15em solid #666;"><i class="fa fa-money"></i> '.$service->getLprice().'$</div>
    				'.$buyingl.'
    			</div>
    		</div>
    	</div>
      </div>';
?>
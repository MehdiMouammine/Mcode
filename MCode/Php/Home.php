<?php
require 'Controller.php';
require 'Bd.php';
$C = new Controller($bd);
$O=$C->getOwner("../Json/Owner.json");
$all = $C->getServices('');
$all2 = $C->getProducts('');
$content = 'content="freelance, work, programming, CV, engineer, AJAX, JSON, SQL, PL/SQL, MS Access, Oracle, Mysql, database, computer, coder, coding, web, java, c, c++, php, js, javascript, jquery, bootstrap, MCode, mcode, programmation, computer engineer, help coding, build website, web design, web development, development, program, application';
foreach ($all as $a) {
  $content = $content.", ".$a->getName();
}
foreach ($all2 as $a2) {
  $content = $content.", ".$a2->getName();
}
$content = $content.'"';
?>
<?php
$ff="";
$contact='';
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT Name FROM Users WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $name="";
  while ($donnees = $reponse->fetch()){$name =$donnees['Name']; }
  if (strlen($name)>5) {
  	$long = 44 - strlen($name);
  }
  else{
  	$long = 46 - strlen($name);
  }
  $user ='<div onmouseenter="grey(2)" id="b2" onmouseleave="normal(2)" style="margin-left:'.$long.'%; font-size: 1.2em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Michroma;"><a href="profile.php" style="text-decoration: none;"><div style="color: black;" id="a2"><i class="fa fa-user"></i> '.$name.'</div></a></div>
		<a href="logout.php" id="out" onmouseenter="out(3)" onmouseleave="lout(3)"  style="margin-left: 0.5%;margin-top: 0.5%; text-decoration: none; color: black; font-size: 2em;"><i class="fa fa-power-off"></i></a>
';
$contact='<span style="border-right: 0.1em solid #AAA;" class="contact"><a href="#/" onclick="mail()"><i class="fa fa-envelope"></i></a></span>
			<span style="border-right: 0.1em solid #AAA;" class="contact"><a href="#/" onclick="phone()"><i class="fa fa-mobile"></i></a></span>
			<span class="contact"><a href="#/" onclick="adresse()"><i class="fa fa-map-marker"></i></a></span>';
}
else {
  $user ='<div onmouseenter="grey(1)" id="b1" onmouseleave="normal(1)" style="background-color: #F8F8F8; margin-left:39%; font-size: 1.6em; color: black; padding-top: 0.7%; padding-left: 0.7%; padding-right: 0.7%; font-family: Michroma;"><a href="../index.php" style="text-decoration: none;"><div style="color: black;" id="a1"><i class="fa fa-user"></i> Log in</div></a></div>
';
}
if (isset($_GET['BUY']) && $_GET['BUY']=="OK") {
	$ff = '<a href="Home.php"><div class="alert alert-success" style="width:92%; margin-left:4%; margin-top:5%;"><strong>Success !</strong> Thank you for your purchase we will contact you as soon as your payment is verified</div></a>';
	mail($_COOKIE['Email'],"Purchase From MCode","Thank you ".$name." for your purchase we will contact you again as soon as your payment is verified");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MCode Home</title>
  	<meta name="keywords" <?php echo $content;?>>
  	<meta name="description" content="online CV for a computer engineer and website for his freelance work">
	<link rel="stylesheet" type="text/css" href="../Css/Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Michroma"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #DDD;" onload="recherche()">
<div id="bardiv">
<div id="logo"><a href="Home.php"><img src="../Img/Logo.png" style="width: 100%; margin-left: 7%;"></a></div> 
<div style="background-color: #C0C0C0; font-size: 1.6em; color: black; padding-top: 0.7%; padding-left: 0.7%; padding-right: 0.7%; margin-left: 1.5%; font-family: Michroma;"><a href="Home.php" style="text-decoration: none;"><div style="color: white;"> Home</div></a></div>
<div class="input-group" style=" margin-left: 2.5%;margin-top: 0.8%; width: 25%;">
  <div class="input-group-addon" style="background-color: #EEE; color: #000;"><i class="fa fa-search"></i></div>
  <input class="form-control" style="overflow:scroll; background: #DDD; color: #000; font-family: Orbitron;" onkeyup="recherche()" id="rech" placeholder="Search..." type="text"/>
</div>
<?php echo $user;?>
</div>
<br>
<?php echo $ff;?>
<div id="maindiv">
	<br>
	<div id="profile">
		<div class="basic" align="center">
			<img src="../Img/Owner.jpg" id="image">
			<br>
			<span id="name"><bold><?php echo $O->getName();?></bold></span>
			<span id="from"><bold><i class="fa fa-home"></i> <?php echo $O->getFrom();?></bold></span>
			<span id="birth"><bold><i class="fa fa-calendar"></i> <?php echo $O->getBirth();?></bold></span>
			<span id="desc"><bold><?php echo $O->getDescription();?></bold></span>
			<?php echo $contact;?>
			<br><br>
			<input type="text" name="affadresse" id="affadresse" value="<?php echo $O->getAdresse();?>" readonly class="afficheur">
			<input type="text" name="affphone" id="affphone" value="<?php echo $O->getPhone();?>" readonly class="afficheur">
			<input type="text" name="affmail" id="affmail" value="<?php echo $O->getEmail();?>" readonly class="afficheur">
		</div>
		<div class="basic">
			<a href="#/">
			<div onclick="languages()">
				<span class="title">Languages</span>
				<span id="larrow" class="arrow"><i class="fa fa-angle-right"></i></span>
			</div>
			</a>
			<div style="margin-left: 5%; margin-top: 3%; display: none" id="langs">
				<table width="70%">
				<?php
					foreach ($O->getLanguages() as $l) {
						echo '<tr style="font-size:1.1em; font-family:Orbitron; padding: 3%;"><td width="40%">'.$l[0].'</td><td width="20%"> - </td><td width="40%">'.$l[1].'</td>';		}
				?>
				</tr>
				</table>
			</div>
		</div>
		<div class="basic">
			<a href="#/">
			<div onclick="skills()">
				<span class="title">Skills</span>
				<span id="sarrow" class="arrow"><i class="fa fa-angle-right"></i></span>
			</div>
			</a>
			<div style="margin-left: 5%; margin-top: 3%; display: none" id="skis">
				<table width="95%">
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">Languages :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Languages") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">Frameworks :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Plateforms") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">Conception :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Conception") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">Databases :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Databases") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">Softwares :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Softwares") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
					<tr class="skilltype">
						<td width="40%" style="padding: 2% 0% 2% 0%;">OS :</td>
						<td style="padding: 2% 0% 2% 0%;">
							<?php
								$i = 0;
								foreach ($O->getSkills() as $s) {
									if ($s[0]== "Operating System") {if ($i != 0) { echo " - ";} echo " ".$s[1]." ";$i++;}		
								}
							?>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="basic">
			<a href="#/">
			<div onclick="education()">
				<span class="title">Education</span>
				<span id="earrow" class="arrow"><i class="fa fa-angle-right"></i></span>
			</div>
			</a>
			<div style="margin-left: 5%; margin-top: 3%; display: none" id="eds">
				<table width="80%">
				<?php
					foreach ($O->getEducations() as $e) {
						echo '<tr style="font-size:1.1em; font-family:Orbitron; vertical-align:top;"><td width="30%" style="padding: 2% 0% 2% 0%;">'.$e[0].'</td><td width="70%" style="padding: 2% 0% 2% 0%;">'.$e[1].'</td>';		}
				?>
				</tr>
				</table>
			</div>
		</div>
	</div>
	<div id="items">
		<div class="bigbasic" id="services">
		</div>
		<div class="bigbasic" id="products">
		</div>
	</div>
</div>
<div id="Modal" class="modal">
  <div class="modal-content panel" id="modalp" style="border: none; margin-top: 7%;">
  </div>
</div>
<div id="ImgModal" class="modal">
	<a style="background-color: red; color: #FFF; margin-left: 98%; position: absolute;" class="btn btn-xs" href="#/" onclick="closeModal()" id="close"><i class="fa fa-times"></i></a>
  	<div class="modal-content" style="background-color: black;" id="modalp2">
  	</div>
</div>
<script type="text/javascript" src="../Javascript/Home.js"></script>
</body>
</html>
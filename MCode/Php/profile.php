<?php
require 'Controller.php';
require 'Bd.php';
$ff="";
if (isset($_POST['del'])) {
  $reponse2 = $bd->query('SELECT id FROM Users WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $ii="";
  while ($donnees2 = $reponse2->fetch()){$ii=$donnees2['id'];}
  $reponsex = $bd->query('DELETE FROM Users WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $link = 'logout.php';
  header('Location:' .$link);
}
if (isset($_POST['nname'])) {
  $reponsex = $bd->query('UPDATE Users SET Name = \'' . $_POST['nname'] . '\'  WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Name changed</div></a>';
}
if (isset($_POST['npass'])) {
  $reponsex = $bd->query('UPDATE Users SET Password = \'' . $_POST['npass'] . '\'  WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Password changed</div></a>';
}
if (isset($_POST['nemail'])) {
  $reponse2 = $bd->query('SELECT Email FROM Users WHERE Email=\'' . $_POST['nemail'] . '\'');
  $em="";
  while ($donnees2 = $reponse2->fetch()){$em=$donnees2['Email'];}
  if ($em != $_POST['nemail']) {
      $reponsex = $bd->query('UPDATE Users SET Email = \'' . $_POST['nemail'] . '\'  WHERE Email=\'' . $_COOKIE['Email'] . '\'');
      setcookie("Email", $_POST['nemail'] , time() + (86400 * 30), "/");
      $_COOKIE['Email']=$_POST['nemail'];
      $ff = '<a href="profile.php"><div class="alert alert-success"><strong>Success !</strong> Email changed</div></a>';
    }
    else{
      $ff = '<a href="profile.php"><div class="alert alert-danger"><strong>Sorry !</strong> Email already used</div></a>';
    }
}
?>
<?php
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT Name , Password FROM Users WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $name="";
  while ($donnees = $reponse->fetch()){$name =$donnees['Name'];$pass = strlen($donnees['Password']);}
  if (strlen($name)>5) {
    $long = 44 - strlen($name);
  }
  else{
    $long = 46 - strlen($name);
  }
  $user ='<div style="margin-left:'.$long.'%; background-color: #C0C0C0; font-size: 1.2em; color: white; padding-top: 1%; padding-left: 0.7%; padding-right: 0.7%; font-family: Michroma;"><a href="profile.php" style="text-decoration: none;"><div style="color: black;" id="a2"><i class="fa fa-user"></i> '.$name.'</div></a></div>
    <a href="logout.php" id="out" onmouseenter="out(3)" onmouseleave="lout(3)"  style="margin-left: 0.5%;margin-top: 0.5%; text-decoration: none; color: black; font-size: 2em;"><i class="fa fa-power-off"></i></a>
';
}
else {
  $user ='<div onmouseenter="grey(1)" id="b1" onmouseleave="normal(1)" style="background-color: #F8F8F8; margin-left:39%; font-size: 1.6em; color: black; padding-top: 0.7%; padding-left: 0.7%; padding-right: 0.7%; font-family: Michroma;"><a href="../index.php" style="text-decoration: none;"><div style="color: black;" id="a1"><i class="fa fa-user"></i> Log in</div></a></div>
';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MCode Profile</title>
    <meta name="description" content="online CV for a computer engineer and website for his freelance work">
    <link rel="stylesheet" type="text/css" href="../Css/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Michroma"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #DDD">
<div id="bardiv">
<div id="logo"><a href="Home.php"><img src="../Img/Logo.png" style="width: 100%; margin-left: 7%;"></a></div> 
<div onmouseenter="grey(2)" id="b2" onmouseleave="normal(2)" style="font-size: 1.6em; color: black; padding-top: 0.7%; padding-left: 0.7%; padding-right: 0.7%; margin-left: 1.5%; font-family: Michroma;"><a href="Home.php" style="text-decoration: none;"><div style="color: black;"> Home</div></a></div>
<div class="input-group" style=" margin-left: 2.5%;margin-top: 0.8%; width: 25%;">
  <div class="input-group-addon" style="background-color: #EEE; color: #000;"><i class="fa fa-search"></i></div>
  <input class="form-control" style="overflow:scroll; background: #DDD; color: #000; font-family: Orbitron;" onkeyup="recherche()" id="rech" placeholder="Search..." type="text"/>
</div>
<?php echo $user;?>
</div>
<br>
<div style="width: 60%;margin-left: 20%; margin-top: 4%; padding: 2%;">
  <span style="color: black; font-size: 2em; font-family: Michroma;">Account :</span>
  <br><br><?php echo $ff; ?>
  <table width="100%"><tr><td width="11%">
  <span class="nns" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;">Name : </span>
  </td><td width="64%">
  <span class="nns" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;"><?php echo $name;?></span>
  </td><td width="25%" align="right">
  <a href="#/" class="nns" onclick="nam()" style="color: #00BFFF; font-family: Orbitron;">Change your name</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="nn" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-user"></i>
        </div>
        <input class="form-control" style="overflow:scroll; background: #333; color: white;" pattern=".{2,20}" id="nname" name="nname" type="text" required placeholder="New Name" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br>
  <table width="100%"><tr><td width="10.5%">
  <span class="ees" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;">Email : </span>
  </td><td width="64.5%">
  <span class="ees" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;"><?php echo $_COOKIE['Email'];?></span>
  </td><td width="25%" align="right">
  <a href="#/" onclick="emai()" class="ees" style="color: #00BFFF; font-family: Orbitron;">Change your email</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="ee" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-envelope"></i>
        </div>
        <input class="form-control" style="overflow:scroll; background: #333; color: white;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="nemail" name="nemail" type="text" required placeholder="New Email" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br>
  <table width="100%"><tr><td width="19%">
  <span class="pps" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;">Password : </span>
  </td><td width="56%">
  <span class="pps" style="margin-left: 1%; color: black; font-size: 1.5em; font-family: Orbitron;"><?php for ($i=0; $i < $pass; $i++) {echo "*";} ?></span>
  </td><td width="25%" align="right">
  <a href="#/" onclick="pas()" class="pps" style="color: #00BFFF; font-family: Orbitron;">Change your password</a><br>
  </td></tr></table>
  <form method="POST" action="profile.php">
      <div class="input-group" id="pp" style="width: 100%; display: none;">
        <div class="input-group-addon" style="background-color: #333; color: white;">
          <i class="fa fa-key"></i>
        </div>
        <input class="form-control nname" style="overflow:scroll; background: #333; color: white;" pattern=".{8,20}"  id="npass" name="npass" type="password" required placeholder="New Password" />
        <span class="input-group-btn">
             <button value="submit" class="btn btn-danger"><i class="fa fa-refresh"></i></button>
        </span>
      </div>
  </form>
  <hr style="border-color: black;">
  <br><br><br><br><br>
  <form action="profile.php" method="POST">
    <input type="hidden" name="del" value="ok">
    <button value="submit" class="btn btn-danger" style="margin-left: 80%; font-family: Orbitron;"><span class="glyphicon glyphicon-trash"></span> Delete Account</button>
  </form>
</div>
<script type="text/javascript" src="../Javascript/profile.js"></script>
</body>
</html>
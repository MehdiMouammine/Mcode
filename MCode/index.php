<?php
require 'Php/Bd.php';
if (isset($_COOKIE['Email'])) {
  $reponse = $bd->query('SELECT Email FROM Users WHERE Email=\'' . $_COOKIE['Email'] . '\'');
  $cok="";
  while ($donnees = $reponse->fetch()){$cok=$donnees['Email'];}
  if ($cok== $_COOKIE['Email']) {
      session_start();
      $_SESSION ['Email'] = $_COOKIE['Email'];
        $link = 'Php/Home.php';
        header('Location:' .$link);     
    }
    if ($cok!=$_COOKIE['Email']){
      $link = 'Php/logout.php';
      header('Location:' .$link);
    }
}
?>
<?php
require 'Php/Controller.php';
$C = new Controller($bd);
$O=$C->getOwner("Json/Owner.json");
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
<!DOCTYPE html>
<html style="height: 80%; margin: 0;">
<head> 
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
    <meta name="keywords" <?php echo $content;?>>
    <meta name="description" content="online CV for a computer engineer and website for his freelance work">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>MCode</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Michroma"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background: linear-gradient(to left, rgba(0,0,0,0)40%, rgba(255,255,255,1)60%), url('Img/background.jpg'); height: 100%; margin: 0;">
	<div style="width: 100%; margin-top: 10%; display: flex; align-items: center;">
		<img id="logo" src="Img/Logo.png" style="width: 40%; margin-top: 7%; align-self: center;">
		<div id="login" class="panel title2" style="border: none; display: none; margin-left: 4%; width: 35%;">
            <div class="panel-heading" style="background-color: #BBB; color: #818181;">
              <span class="panel-title"><i class="glyphicon glyphicon-log-in"></i> Log in</span>
            </div>
            <div style="background: #CCC; color: black;">
              <table width="95%" align="center">
                <tr>
                  <td>
                    <br>
                    <div class="alert alert-warning" style="display: none;" id="wrus"><strong>Attention !</strong> This Email dosen't exist</div>
                    <div class="alert alert-danger" style="display: none;" id="wrpa"><strong>Danger !</strong> Wrong Password</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group " style="margin: 2%;">
                  <label class="control-label" for="Email">Email</label>
                  <div class="input-group">
                    <div class="input-group-addon" style="background-color: #333; color: white;">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input class="form-control" style="overflow:scroll; background: #333; color: white;" id="Email" name="Email" type="text" required placeholder="Email" />
                  </div>
                </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group " style="margin: 2%;">
                  <label class="control-label" for="pass">Password</label>
                  <div class="input-group">
                    <div class="input-group-addon" style="background-color: #333; color: white;">
                      <i class="fa fa-key"></i>
                    </div>
                    <input class="form-control pass" style="overflow:scroll; background: #333; color: white;" id="pass" name="pass" type="password" required placeholder="Password" />
                  </div>
                </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br>
                    <div align="center">
                  <button class="btn btn-danger" onclick="unchange()" id="unbutlo"><span class="glyphicon glyphicon-arrow-left"></span> Back</button>
                  <button class="btn btn-warning" style="margin-left: 1%;" id="butlo"><span class="glyphicon glyphicon-log-in"></span> Log in</button><br><span style="color: white; font-family: Impact; font-size: 2em;">Or</span><br>
                  <button class="btn btn-success" onclick="change2()" id="unbutlo2"><span class="glyphicon glyphicon-user"></span> Sign up</button>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br>
                  </td>
                </tr>
              </table>
            </div>
          </div>
	</div>
  <div id="signup" class="panel title2" style="border: none; display: none; margin-left: 4%; width: 35%;">
            <div class="panel-heading" style="background-color: #BBB; color: #818181;">
              <span class="panel-title"><i class="glyphicon glyphicon-user"></i> Sign up</span>
            </div>
            <div style="background: #CCC; color: black;">
              <table width="95%" align="center">
                <tr>
                  <td>
                    <br>
                    <div class="alert alert-warning" style="display: none;" id="war1"><strong>Wrong !</strong> Pleas enter a valid email</div>
                    <div class="alert alert-warning" style="display: none;" id="war2"><strong>Wrong !</strong> Password is more than 8 characters</div>
                    <div class="alert alert-warning" style="display: none;" id="war3"><strong>Wrong !</strong> Name is more than 2 characters</div>
                    <div class="alert alert-danger" style="display: none;" id="war"><strong>Attention !</strong> This email already exist</div>
                    <div class="alert alert-success" style="display: none;" id="suc"><strong>Success !</strong> You can log in now</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group " style="margin: 2%;">
                  <label class="control-label" for="nEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-addon" style="background-color: #333; color: white;">
                      <i class="fa fa-envelope"></i>
                    </div>
                    <input class="form-control nEmail" style="overflow:scroll; background: #333; color: white;" id="nEmail" name="nEmail" type="text" required placeholder="Email" />
                  </div>
                </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="form-group " style="margin: 2%;">
                  <label class="control-label" for="npass">Password</label>
                  <div class="input-group">
                    <div class="input-group-addon" style="background-color: #333; color: white;">
                      <i class="fa fa-key"></i>
                    </div>
                    <input class="form-control npass" style="overflow:scroll; background: #333; color: white;" id="npass" name="npass" type="password" required placeholder="Password" />
                  </div>
                </div>
                  </td>
                </tr>
                <tr>
                <tr>
                  <td>
                    <div class="form-group " style="margin: 2%;">
                  <label class="control-label" for="nname">Name</label>
                  <div class="input-group">
                    <div class="input-group-addon" style="background-color: #333; color: white;">
                      <i class="fa fa-user"></i>
                    </div>
                    <input class="form-control nname" style="overflow:scroll; background: #333; color: white;" id="nname" name="nname" type="text" required placeholder="Name" />
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br>
                    <div align="center">
                  <button class="btn btn-success" id="butsi"><span class="glyphicon glyphicon-user"></span> Sign up</button><br><br>
                  <button class="btn btn-danger" onclick="unchange2()" id="unbutlo"><span class="glyphicon glyphicon-arrow-left"></span> Back</button></div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <br>
                  </td>
                </tr>
              </table>
            </div>
          </div>
  </div>
	<br>
	<div id="butts">
	<a style="margin-left: 15.3%; margin-top: 1%; font-size: 1.5em;" onclick="change()" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Log in</a><br>
  <a href="Php/Home.php" style="margin-left: 15.9%; margin-top: 1%; font-size: 1.5em;" class="btn btn-danger"><i class="fa fa-code"></i> Visit</a></div>
	</div>
</body>
<script type="text/javascript" src="Javascript/index.js"></script>
</html>
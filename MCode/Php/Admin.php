<?php
require 'Controller.php';
require 'Bd.php';
$C = new Controller($bd);
$O = $C->getOwner("../Json/Owner.json");
$alert ="";
if(isset($_POST["go"])){
$uploadOk = 1;
$check = getimagesize($_FILES["owimg"]["tmp_name"]);
$image_width = $check[0];
$image_height = $check[1];
if($check !== false) {
  $uploadOk = 1;
} 
else if ($check == false){
  $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> File is not an image</div></a>';
  $uploadOk = 0;
}
if ($image_width != $image_height) {
        $uploadOk = 0;
        $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> File is not a square image</div></a>';
}
if ($uploadOk == 1) {
$target_dir = "../Img/";
$target_name = "Owner.jpg";
$target_file = $target_dir . $target_name;
move_uploaded_file($_FILES["owimg"]["tmp_name"], $target_file);
$alert = '<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> Image was changed</div></a>';
}
}
if(isset($_POST["nsrna"])){
$uploadOk = 1;
$check = getimagesize($_FILES["srico"]["tmp_name"]);
$image_width = $check[0];
$image_height = $check[1];
if($check !== false) {
  $uploadOk = 1;
} 
else if ($check == false){
  $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> File is not an image</div></a>';
  $uploadOk = 0;
}
if ($image_width != 1600 || $image_height != 900) {
        $uploadOk = 0;
        $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Service image is different than 1600x900</div></a>';
}
if ($uploadOk == 1) {
$target_dir = "../Img/Services/";
$target_name = $_POST["nsrna"].".jpg";
$target_file = $target_dir . $target_name;
move_uploaded_file($_FILES["srico"]["tmp_name"], $target_file);
$C->newService($_POST["nsrna"], $_POST["nsrde"], $_POST["spade"], $_POST["mpade"], $_POST["lpade"], $_POST["spapr"], $_POST["lpada"], $_POST["mpapr"], $_POST["lpapr"], $_POST["spada"], $_POST["mpada"]);
$alert = '<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Service was addeded</div></a>';
}
}
if(isset($_POST["nprna"])){
$uploadOk = 1;
$check = getimagesize($_FILES["prico"]["tmp_name"]);
$check1 = getimagesize($_FILES["pricona"]["tmp_name"]);
$check2 = getimagesize($_FILES["prscre1"]["tmp_name"]);
$check3 = getimagesize($_FILES["prscre2"]["tmp_name"]);
$check4 = getimagesize($_FILES["prscre3"]["tmp_name"]);
$check5 = getimagesize($_FILES["prscre4"]["tmp_name"]);
$check6 = getimagesize($_FILES["prscre5"]["tmp_name"]);
$check7 = getimagesize($_FILES["prscre6"]["tmp_name"]);
$image_width = $check[0];$image_width1 = $check1[0];$image_width2 = $check2[0];$image_width3 = $check3[0];$image_width4 = $check4[0];$image_width5 = $check5[0];$image_width6 = $check6[0];$image_width7 = $check7[0];
$image_height = $check[1];$image_height1 = $check1[1];$image_height2 = $check2[1];$image_height3 = $check3[1];$image_height4 = $check4[1];$image_height5 = $check5[1];$image_height6 = $check6[1];$image_height7 = $check7[1];
if($check !== false) {$uploadOk = 1;}
else if ($check == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon file is not an image</div></a>';$uploadOk = 0;
} 
if($check1 !== false) {$uploadOk = 1;}
else if ($check1 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Name Image file is not an image</div></a>';$uploadOk = 0;
} 
if($check2 !== false) {$uploadOk = 1;}
else if ($check2 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen1 file is not an image</div></a>';$uploadOk = 0;
} 
if($check3 !== false) {$uploadOk = 1;}
else if ($check3 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen2 file is not an image</div></a>';$uploadOk = 0;
} 
if($check4 !== false) {$uploadOk = 1;}
else if ($check4 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen3 file is not an image</div></a>';$uploadOk = 0;
} 
if($check5 !== false) {$uploadOk = 1;}
else if ($check5 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen4 file is not an image</div></a>';$uploadOk = 0;
} 
if($check6 !== false) {$uploadOk = 1;}
else if ($check6 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen5 file is not an image</div></a>';$uploadOk = 0;
} 
if($check7 !== false) {$uploadOk = 1;}
else if ($check7 == false){$alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Screen6 file is not an image</div></a>';$uploadOk = 0;
} 
if ($image_width != $image_height) {
        $uploadOk = 0;
        $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Icon File is not a square image</div></a>';
}
if ($image_width2 == $image_width3 && $image_width3 == $image_width4 && $image_width4 == $image_width5 && $image_width5 == $image_width6 && $image_width6 == $image_width7) {
        $uploadOk = 1;   
}
else{
  $uploadOk = 0;
  $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> One of the screens images is not the same size as the others</div></a>';
}
if ($image_width1 != 1024 || $image_height1 != 786) {
        $uploadOk = 0;
        $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> Product image name is different than 1024x786</div></a>';
}
if ($image_height2 == $image_height3 && $image_height3 == $image_height4 && $image_height4 == $image_height5 && $image_height5 == $image_height6 && $image_height6 == $image_height7) {
        $uploadOk = 1;   
}
else{
  $uploadOk = 0;
  $alert = '<a href="Admin.php"><div class="alert alert-danger"><strong>Sorry !</strong> One of the screens images is not the same size as the others</div></a>';
}
if ($uploadOk == 1) {
$target_dir = "../Img/Products/Logo/";
$target_dir1 = "../Img/Products/NameLogo/";
$target_dir2 = "../Img/Products/Screens/";
$target_name = $_POST["nprna"].".jpg";
$target_name1 = $_POST["nprna"].".jpg";
$target_name2 = $_POST["nprna"]."1.jpg";
$target_name3 = $_POST["nprna"]."2.jpg";
$target_name4 = $_POST["nprna"]."3.jpg";
$target_name5 = $_POST["nprna"]."4.jpg";
$target_name6 = $_POST["nprna"]."5.jpg";
$target_name7 = $_POST["nprna"]."6.jpg";
$target_file = $target_dir . $target_name;
$target_file1 = $target_dir1 . $target_name1;
$target_file2 = $target_dir2 . $target_name2;
$target_file3 = $target_dir2 . $target_name3;
$target_file4 = $target_dir2 . $target_name4;
$target_file5 = $target_dir2 . $target_name5;
$target_file6 = $target_dir2 . $target_name6;
$target_file7 = $target_dir2 . $target_name7;
move_uploaded_file($_FILES["prico"]["tmp_name"], $target_file);
move_uploaded_file($_FILES["pricona"]["tmp_name"], $target_file1);
move_uploaded_file($_FILES["prscre1"]["tmp_name"], $target_file2);
move_uploaded_file($_FILES["prscre2"]["tmp_name"], $target_file3);
move_uploaded_file($_FILES["prscre3"]["tmp_name"], $target_file4);
move_uploaded_file($_FILES["prscre4"]["tmp_name"], $target_file5);
move_uploaded_file($_FILES["prscre5"]["tmp_name"], $target_file6);
move_uploaded_file($_FILES["prscre6"]["tmp_name"], $target_file7);
$C->newProduct($_POST["nprna"], $_POST["nprde"], $_POST["nprpr"]);
$alert = '<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Product was added</div></a>';
}
}
if (isset($_POST['nskna'])) {
  $C->newSkill($_POST['nskty'],$_POST['nskna']);
  $alert='<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Skill has been added</div></a>';
}
if (isset($_POST['dskna'])) {
  $C->deleteSkill($_POST['dskna']);
  $alert='<a href="Admin.php"><div class="alert alert-danger"><strong>Success !</strong> The Skill has been deleted</div></a>';
}
if (isset($_POST['nlana'])) {
  $C->newLanguage($_POST['nlaty'],$_POST['nlana']);
  $alert='<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Language has been added</div></a>';
}
if (isset($_POST['dlana'])) {
  $C->deleteLanguage($_POST['dlana']);
  $alert='<a href="Admin.php"><div class="alert alert-danger"><strong>Success !</strong> The Language has been deleted</div></a>';
}
if (isset($_POST['nedna'])) {
  $C->newEducation($_POST['nedty'],$_POST['nedna']);
  $alert='<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Education has been added</div></a>';
}
if (isset($_POST['dedna'])) {
  $C->deleteEducation($_POST['dedna']);
  $alert='<a href="Admin.php"><div class="alert alert-danger"><strong>Success !</strong> The Education has been deleted</div></a>';
}
if (isset($_POST['dprna'])) {
  $C->deleteProduct($_POST['dprna']);
  $alert='<a href="Admin.php"><div class="alert alert-danger"><strong>Success !</strong> The Product has been deleted</div></a>';
}
if (isset($_POST['dsrna'])) {
  $C->deleteService($_POST['dsrna']);
  $alert='<a href="Admin.php"><div class="alert alert-danger"><strong>Success !</strong> The Service has been deleted</div></a>';
}
if (isset($_POST['una'])) {
  $C->updateOwner($_POST['una'],$_POST['ubr'],$_POST['ufr'],$_POST['uadr'],$_POST['uem'],$_POST['uph'],$_POST['ude']);
  $alert='<a href="Admin.php"><div class="alert alert-success"><strong>Success !</strong> The Informations has been updated</div></a>';
}
$O = $C->getOwner("../Json/Owner.json");
?>
<!DOCTYPE html>
<html>
<head>
	<title>MCode Admin</title>
	<meta name="description" content="online CV for a computer engineer and website for his freelance work">
	<link rel="stylesheet" type="text/css" href="../Css/Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Michroma"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Orbitron" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body style="background-color: #DDD;">
<div id="bardiv">
<div id="logo"><a href="Admin.php"><img src="../Img/Logo.png" style="width: 100%; margin-left: 7%;"></a></div><span style="margin-top: 1.55%; margin-left: 1%; color: black; font-size: 1.3em; font-family: Orbitron;">Admin</span>
<a href="logout.php" id="out" onmouseenter="out(3)" onmouseleave="lout(3)"  style="margin-left: 80%;margin-top: 0.5%; text-decoration: none; color: black; font-size: 2em;"><i class="fa fa-power-off"></i></a>
</div>
<br>
<table width="90%" align="center" style="margin-top: 5%; vertical-align: top;">
  <tr>
    <td valign="top" colspan="5">
      <?php echo $alert; ?>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Informations : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
      <form id="formu" method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="huus" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-refresh"></i> Update Owner Informations </span>
        </div>
        <div id="uus" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-user"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="una" value="<?php echo $O->getName(); ?>" required name="una" placeholder="User's name" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-calendar"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="ubr" value="<?php echo $O->getBirth(); ?>" required name="ubr" placeholder="User's birth date" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-map-marker"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="ufr" value="<?php echo $O->getFrom(); ?>" required name="ufr" placeholder="User's birth city" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-map-pin"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="uadr" value="<?php echo $O->getAdresse(); ?>" required name="uadr" placeholder="User's adress" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-envelope"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="uem" value="<?php echo $O->getEmail(); ?>" required name="uem" placeholder="User's email" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-phone"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="uph" value="<?php echo $O->getPhone(); ?>" required name="uph" placeholder="User's adress" type="text"/>
          </div>
          <div class="input-group" style="margin: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i>
            </div>
            <textarea name="ude" style="overflow:scroll; background: #CCC; color: black; width: 99%;" required form="formu"><?php echo $O->getDescription(); ?></textarea>
          </div>
          <button value="submit" style="margin: 2% 2% 2% 25%;" class="btn btn-danger btn-default"><i class="fa fa-refresh"></i> Update informations</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php" enctype="multipart/form-data">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="huim" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-image"></i> Update Owner Image </span>
        </div>
        <div id="uim" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-file-image-o"></i>
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Owner's Image" required name="owimg" id="owimg">
              <input type="hidden" name="go" value="ok">
          </div>
          <button value="submit" style="margin: 2% 2% 2% 27%;" class="btn btn-danger btn-default"><i class="fa fa-refresh"></i> Change image</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Skills : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hnsk" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-plus"></i> Add New Skill </span>
        </div>
        <div id="nsk" style=" background: #EEE; color: black; padding: 4%; display: none;">
          <div class="input-group" style="margin-bottom: 3%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-bolt"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nskna" required name="nskna" placeholder="Skill's Name" type="text"/>
          </div>
          <select style="margin: 2% 0% 2% 2%; width: 95%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" id="nskty" required name="nskty">
              <option value="Languages">Language</option>
              <option value="Plateforms">Platform</option>
              <option value="Conception">Conception</option>
              <option value="Databases">Database</option> 
              <option value="Softwares">Software</option> 
              <option value="Operating System">OS</option>            
            </select>
          <button value="submit" style="margin: 2% 2% 2% 27%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new skill</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hdsk" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-times"></i> Delete Skill</span>
        </div>
        <div id="dsk" style=" background: #EEE; color: black; display: none;">
          <select style="margin: 4% 0% 2% 5%; width: 90%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" required name="dskna">
            <?php
              $S = $O->getSkills();
              foreach ($S as $v) {
                echo '<option value="'.$v[1].'">'.$v[1].'</option>';
              }
            ?>
          </select>
          <button value="submit" style="margin: 2% 2% 2% 32%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete skill</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Languages : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hnla" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-plus"></i> Add New Language</span>
        </div>
        <div id="nla" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-language"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nlana" required name="nlana" placeholder="Language" type="text"/>
          </div>
          <select style="margin: 2% 0% 2% 2%; width: 95%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" id="nlaty" required name="nlaty">
              <option value="Basic">Basic</option>
              <option value="Good">Good</option>
              <option value="Fluent">Fluent</option>
              <option value="Native">Native</option>
            </select>
          <button value="submit" style="margin: 2% 2% 2% 27%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new language</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hdla" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-times"></i> Delete Language</span>
        </div>
        <div id="dla" style=" background: #EEE; color: black; display: none;">
          <select style="margin: 4% 0% 2% 5%; width: 90%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" required name="dlana">
            <?php
              $S = $O->getLanguages();
              foreach ($S as $v) {
                echo '<option value="'.$v[0].'">'.$v[0].'</option>';
              }
            ?>
          </select>
          <button value="submit" style="margin: 2% 2% 2% 29%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete language</button>
        </div>
      </div>
    </td>
  </form>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Educations : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hned" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-plus"></i> Add New Education</span>
        </div>
        <div id="ned" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="margin-bottom: 3%; padding-top: 4%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-book"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nedna" required name="nedna" placeholder="Education's name" type="text"/>
          </div>
          <div class="input-group" style="margin-bottom: 3%; width: 100%;  margin-left: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-calendar"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nedty" required name="nedty" placeholder="Education's period" type="text"/>
          </div>
          <button value="submit" style="margin: 0% 2% 2% 25%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new education</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hded" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-times"></i> Delete Education</span>
        </div>
        <div id="ded" style=" background: #EEE; color: black; display: none;">
          <select style="margin: 4% 0% 2% 5%; width: 90%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" required name="dedna">
            <?php
              $S = $O->getEducations();
              foreach ($S as $v) {
                echo '<option value="'.$v[0].'">'.$v[1].'</option>';
              }
            ?>
          </select>
          <button value="submit" style="margin: 2% 2% 2% 28%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete education</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Services : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
          <form id="forms" method="POST" action="Admin.php" enctype="multipart/form-data">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hnsr" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-plus"></i> Add New Service</span>
        </div>
        <div id="nsr" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="padding: 2% 2% 0% 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-file-image-o"></i>
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Service's Image" required name="srico" id="srico">
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-font"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nsrna" required name="nsrna" placeholder="Service's name" type="text"/>
          </div>
          <div class="input-group" style="margin: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i>
            </div>
          <textarea name="nsrde" style="overflow:scroll; background: #CCC; color: black; width: 99%;" required form="forms">Service's Description</textarea>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i> S
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="spade" required name="spade" placeholder="S-Pass's Description" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-hourglass-half"></i> S
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="spada" required name="spada" placeholder="S-Pass's Days" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-money"></i> S
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="spapr" required name="spapr" placeholder="S-Pass's Price" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i> M
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="mpade" required name="mpade" placeholder="M-Pass's Description" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-hourglass-half"></i> M
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="mpada" required name="mpada" placeholder="M-Pass's Days" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-money"></i> M
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="mpapr" required name="mpapr" placeholder="M-Pass's Price" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i> L
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="lpade" required name="lpade" placeholder="L-Pass's Description" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-hourglass-half"></i> L
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="lpada" required name="lpada" placeholder="L-Pass's Days" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-money"></i> L
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="lpapr" required name="lpapr" placeholder="L-Pass's Price" type="text"/>
          </div>
          <button value="submit" style="margin: 2% 2% 2% 27%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new product</button>
        </div>
      </div>
      </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hdsr" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-times"></i> Delete Service</span>
        </div>
        <div id="dsr" style=" background: #EEE; color: black; display: none;">
          <select style="margin: 4% 0% 2% 5%; width: 90%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" required name="dsrna">
            <?php
              $S = $C->getServices('');
              foreach ($S as $p) {
                echo '<option value="'.$p->getId().'">'.$p->getName().'</option>';
              }
            ?>
          </select>
          <button value="submit" style="margin: 2% 2% 2% 28%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete service</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
  <tr>
    <td valign="top" colspan="3" style="padding: 0% 0% 1% 0%;">
      <span class="bigtitle">Products : </span>
    </td>
  </tr>
  <tr>
    <td valign="top" width="30%">
      <form id="formp" method="POST" action="Admin.php" enctype="multipart/form-data">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hnpr" style="background-color: #CCC; color: #818181; width: 100%;">
          <span class="panel-title"><i class="fa fa-plus"></i> Add New Product</span>
        </div>
        <div id="npr" style=" background: #EEE; color: black; display: none;">
          <div class="input-group" style="padding: 2% 2% 0% 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-file-image-o"></i>
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Icon" required name="prico" id="prico">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-picture-o"></i>
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Name Image" required name="pricona" id="pricona">
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-font"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nprna" required name="nprna" placeholder="Product's name" type="text"/>
          </div>
          <div class="input-group" style="width: 100%;  margin:2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-money"></i>
            </div>
            <input class="form-control" style="overflow:scroll; background: #CCC; color: black; width: 95%;" id="nprpr" required name="nprpr" placeholder="Product's Price" type="text"/>
          </div>
          <div class="input-group" style="margin: 2%;">
            <div class="input-group-addon" style="background-color: #CCC; color: white;">
              <i class="fa fa-info-circle"></i>
            </div>
          <textarea name="nprde" style="overflow:scroll; background: #CCC; color: black; width: 99%;" required form="formp">Product's Description</textarea>
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 1
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image1" required name="prscre1" id="prscre1">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 2
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image2" required name="prscre2" id="prscre2">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 3
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image3" required name="prscre3" id="prscre3">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 4
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image4" required name="prscre4" id="prscre4">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 5
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image5" required name="prscre5" id="prscre5">
          </div>
          <div class="input-group" style="margin: 2%;">
              <div class=" input-group-addon" style="background-color: #CCC; color: white;">
                  <i class="fa fa-camera"></i> 6
                </div> 
              <input type="file" class="form-control" style="overflow:scroll; background: #CCC; color: white;" placeholder="Product's Screen Image6" required name="prscre6" id="prscre6">
          </div>
          <button value="submit" style="margin: 2% 2% 2% 27%;" class="btn btn-danger btn-default"><i class="fa fa-plus"></i> Add new product</button>
        </div>
      </div>
      </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <form method="POST" action="Admin.php">
      <div class="panel" style="border: none;">
        <div class="panel-heading" id="hdpr" style="background-color: #CCC; color: #818181; width: 100%;">
         <span class="panel-title"><i class="fa fa-times"></i> Delete Product</span>
        </div>
        <div id="dpr" style=" background: #EEE; color: black; display: none;">
          <select style="margin: 4% 0% 2% 5%; width: 90%;border-radius: 0.5em; font-size: 1.5em; background-color: #CCC;" required name="dprna">
            <?php
              $S = $C->getProducts('');
              foreach ($S as $p) {
                echo '<option value="'.$p->getId().'">'.$p->getName().'</option>';
              }
            ?>
          </select>
          <button value="submit" style="margin: 2% 2% 2% 28%;" class="btn btn-danger btn-default"><i class="fa fa-times"></i> Delete product</button>
        </div>
      </div>
    </form>
    </td>
    <td valign="top" width="5%">
      <br>
    </td>
    <td valign="top" width="30%">
      <br>
    </td>
  </tr>
</table>
<script type="text/javascript" src="../Javascript/Admin.js"></script>
</body>
</html>
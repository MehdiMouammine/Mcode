<?php
require 'Bd.php'; 
if (isset($_POST['Email'])) {
  $ex = 2;
  $reponse3 = $bd->query('SELECT Email FROM Users WHERE Email=\'' . $_POST['Email'] . '\'');
  while ($donnees3 = $reponse3->fetch()){
    if (isset($donnees3)) {
      $ex = 0;
    }
  }
  if ($ex == 2) {
    $query = $bd->prepare("INSERT INTO Users (Email, Password, Name) VALUES (?, ?, ?)");
      $query->execute(array($_POST['Email'], base64_encode(str_rot13($_POST['Pass'])), $_POST['Name']));
      $ex = 1;
  }
  echo $ex;
}
?>
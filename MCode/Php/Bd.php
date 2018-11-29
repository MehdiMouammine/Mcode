<?php
	try
{
	$bd = new PDO('mysql:host=localhost;dbname=MCode;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
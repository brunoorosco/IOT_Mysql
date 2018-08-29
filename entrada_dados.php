<?php

//require 'config.php';
//require 'conectar.php';
require 'database.php';

$serie = $_GET["serie"];
$temperatura = $_GET["temp"];

if((!empty($serie) && (!empty($temperatura))))
{

$query = ("INSERT INTO `IOT_dht`(`id`, `data`, `temp`, `serie`)  VALUES (NULL, CURRENT_TIMESTAMP, '$temperatura', '$serie')" );

//header("Location:index.html");
//);
if(DBExecute($query))
	//echo "<script type='text/javascript'>alert('Sua mensagem enviada com sucesso');</script>";
	header("Location:index.php");
}
  else echo "<h1>Necessário inserir todos os dados<h1>";


?>

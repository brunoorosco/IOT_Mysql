<?php
$conexion = mysql_connect("https://databases.000webhost.com", "id2294134_test", "test123");
mysql_select_db("id2294134_test", $conexion);
mysql_query("SET NAMES 'utf8'");

$chipid = $_POST ['chipid'];
$temperatura = $_POST ['temperatura'];

mysql_query("INSERT INTO `id2294134_test`.`tabla` (`id`, `chipId`, `fecha`, `temperatura`) VALUES (NULL, '$chipid', CURRENT_TIMESTAMP, '$temperatura');");

mysql_close();

echo "Datos ingresados correctamente.";
?>
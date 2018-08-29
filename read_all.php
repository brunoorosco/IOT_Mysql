<?php

require 'config.php';
require 'conectar.php';
//require 'database.php';

//Creating Array for JSON response
$response = array();

 // Connecting to database
$link = DBConnect();

$conn = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());

if(mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$sql = "SELECT * FROM id ORDER BY temp";

$res = mysqli_query($conn,$sql);

$total = mysqli_num_rows($res);

echo "<p>total de resultados: " . $total . "</p>";

while($dados = mysqli_fetch_array($res))
{
 echo 'ID: ' . $dados['id'].'';
} 

echo 'registros encontrados: ' . $result->num_rows;
//$result = mysqli_query($sql,$link);

//$result = mysqli_query("SELECT *FROM dht") or die(mysql_error());

var_dump(DBExecute($sql));

mysqli_close($conn);

?>

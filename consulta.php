<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Consulta DB</title>
</head>
<body>
<?php

require 'config.php';
require 'conectar.php';
require 'database.php';

//$conexion = mysql_connect("localhost", "root", "root");
//mysql_select_db("tutorial", $conexion);
//mysql_query("SET NAMES 'utf8'");
$link = DBConnect();

$query = "SELECT DISTINCT `serie` FROM `IOT_dht` WHERE 1";

$resultado = @mysqli_query($link,$query) or die (mysqli_error($link));


?>
<form action="resposta.php" method="POST">

  <select name="chipId">

  <?php

   $link = DBConnect();

    while ($row=mysqli_fetch_array($resultado))
      {
       echo "<option>";
        echo $row[0];
        echo "</option>";
      }

   var_dump($row);
    DBClose($link);


  ?>
  </select><br><br>
  <input type="date" name="fecha" ><br><br>
  <input type="submit" name="Enviar" >
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
 <title>Resposta MySQL</title>
 <meta charset="UTF-8">
</head>
<body>
<?php

require_once 'config.php';
require_once 'conectar.php';
require_once 'database.php';


$link = DBConnect();

function temperatura_diaria ($chipId,$ano,$mes,$dia) {

$query = "SELECT UNIX_TIMESTAMP(data), temp FROM IOT_dht WHERE year(`data`) = '$ano' AND month(`data`) = '$mes' AND day(`data`) = '$dia' AND `serie`= '$chipId'";

$resultado = @mysqli_query($link,$query) or die (mysqli_error($link));

var_dump($resultado);

 while ($row=mysqli_fetch_array($resultado))
 {
  echo "[";
  echo ($row[0]*1000)-10800000; //le resto 3 horas = 10800000 mill
  echo ",";
  echo $row[1];
  echo "],";
 }
}
?>

<div id="container1" style="width: 100%; height: 400px;"></div>

<script type="text/javascript" src="/script.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'line',
            zoomType: 'x'
        },
        colors: ['#337ab7', '#cc3c1a'],
        title: {
            text: 'Temperatura'
        },
        xAxis: {
             type: 'datetime',         
        },
        yAxis: {
            title: {
                text: 'Temperatura'
            }
        },
      
        series: [{
            name: 'temp',
            data: [<?php
                $chipId = $_POST ['serie'];
                $fecha = $_POST ['data'];
                $ano = substr("$data", 0, 4); // 2017/07/16
                $mes = substr("$data", 5, 2);
                $dia = substr("$data", 8, 2);
                temperatura_diaria($chipId, $ano , $mes, $dia);
             ?>   
        ]},   
    ],
    });
});
</script>
</body>
</html>
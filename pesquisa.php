
<!DOCTYPE html>
<html>
<head>
	<title>Pesquisa</title>
	<link rel="stylesheet"  href="reset.css">
	<link rel="stylesheet"  href="style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<a href="index.php">VOLTAR</a>

<form action="" method="post" class="pesquisa"><br>
				Escolha a Data: <input type="date" name="data" class="txt" ><br><br>
					Escolha o Equipamento: <select name="chipId" ><br>
						<?php
						   require_once 'database.php';
							$query = "SELECT DISTINCT `serie` FROM `IOT_dht` WHERE 1";
							$resultado=DBExecute($query);
							while ($row=mysqli_fetch_array($resultado))
							      { echo "<option>";
							        echo $row[0];
							        echo "</option>";}?>

					</select><br><br>

		   		<input type="submit" name="submit" value="Pesquisar" class="btn"><br><br>
		  	</form><br>

		  	<?php

	     	require_once 'database.php';

		//	if($_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['submit'])){
			//if(isset($_POST['data'])){
			$equi = $_POST['chipId'];

			if($_POST['data']){


			$dataPesquisa = $_POST['data']; //guarda a data selecionada na variavel $data
			//echo "Data de Pesquisa: ". $dataPesquisa;
			//$dataArray = explode("-", $dataPesquisa);
			//$dataPesquisa = $dataArray[0] . "-" . $dataArray[1];

			$sql = "SELECT * FROM IOT_dht WHERE data LIKE '%$dataPesquisa%' AND serie LIKE '$equi'"; //LIKE

		   }else {
		   		$dataAtual = date('Y-m-d');
				//echo "Data Atual: ".$dataAtual;
				$sql = "SELECT * FROM IOT_dht WHERE data LIKE '%$dataAtual%' AND serie LIKE '$equi'" ; //LIKE
			 }


			$stmt = DBExecute($sql);
			$total_rows = mysqli_num_rows($stmt);

		//	echo "<table><tr><th>Equipamento</th><th>Data/hora</th><th>Temperatura</th><th>Umidade</th></tr>";

			echo "<table class='blueTable'><thead><tr><th>Equipamento</th><th>Data/Hora</th><th>Temperatura (ºC)</th><th>Umidade (%)</th></tr></thead>";
			echo "<tfoot><tr><td colspan='4'><div class='links'><a href='#'>&laquo;</a> <a class='active' href='#'>1</a> <a href='#'>2</a> <a href='#'>3</a> <a href='#'>4</a>
			<aref='#'>&raquo;</a></div>";
			echo "</td></tr></tfoot><tbody>";

			while ($linha=mysqli_fetch_array($stmt)){
						echo "<tr><th>".$linha['serie']."</th><th>".$linha['data']."</th><th>".$linha['temp']."</th><th>teste4</th></tr>";	}

			echo "</tr></tbody></table>";}
			?>

<body>
	<canvas id="line-chart" width="300" height="300"></canvas>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"> </script>
<script>
var chartGraph = new Chart(ctx,{
	type:'line',

	


});






</body>
</html>

<script>
    $(document).ready(function(){
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    });
</script>

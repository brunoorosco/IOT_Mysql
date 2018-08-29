<?php

	/* ESTE ARQUIVO TEM A FUNÇÃO DE TRAZER A RESPOSTA DO BANCO DE DADOS DA ULTIMA INSERÇÃO NO BANCO DE BANCO */

      	require 'database.php';

		//$BANCO = $_POST['banco'];

	    //Select para fazer a busca
		//$sql = ("SELECT * FROM IOT_dht WHERE serie LIKE '%" .$busca. "%'") or die ("Não foi possível realizar a consulta."); //LIKE

		//$sql = ("SELECT * FROM IOT_dht ORDER BY id DESC LIMIT 1") or die ("Não foi possível realizar a consulta.");
		$sql = ("SELECT * FROM IOT_dht ORDER BY id DESC LIMIT 1") or die ("Não foi possível realizar a consulta.");
		$stmt = DBExecute($sql);



		//Aqui verifica se veio algum resultado
		//$total_rows = $stmt -> rowCount();
		$total_rows = mysqli_num_rows($stmt);

		//echo $total_rows;

		if($total_rows == 0){

			echo "Nenhum resultado encontrado";
			 }
			 else{

			//Loop com resultado do select
			 //while($linha = $stmt->fetch(PDO::FETCH_OBJ)){
			 	while ($linha=mysqli_fetch_array($stmt)){

			   //echo $linha->serie." || ";
			   //echo $linha->data." || ";
			//   echo "Temperatura: ".$linha[2]." ºC<br><br>";
			   echo $linha['TEMP'];
			 	//echo json_encode($linha);
			 }}






?>

<?php

  require 'conectar.php';

function DBRead($table,$params = null, $fields = '*'){

 	//$table = DB_PREFIX.'_'.$table;
	$params = ($params)  ? "{$params}" : null;

	$query = "SELECT * FROM {$table} {$params}";
	
	$res = DBExecute($query);

   //var_dump($query);

	if(!mysqli_num_rows($res))

		return false;
	else {
		while($res1 = mysqli_fetch_assoc($res)){
			$data[]= $res1;
		}
		return $data;
	}
	
	return $result;
}


//Execute query
function DBExecute($query){
	$link = DBConnect();
	$result = @mysqli_query($link,$query) or die (mysqli_error($link));


	DBClose($link);
	//echo  "Conectado com sucesso";
	return $result;
}

//grava registros
function DBCreate($table, array $data){
	$table = DB_PREFIX.'_'.$table;
	$data = DBEscape($data);

    $fields = implode(', ', array_keys($data));
    $valor = "'".implode("', '", $data)."'";
    //$valor  = implode(', ', $data);

	//$query = "INSERT INTO 'dht' ('serie', 'temp') VALUES ('node', '18')";
	
	$query = "INSERT INTO {$table} ({$fields}) VALUES ( {$valor})";
	//$query = "INSERT INTO {$table} ({$fields}) VALUES ( {$valor})";

	var_dump($query);

	return DBExecute($query);
}

?>
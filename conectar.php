<?php

  		require 'config.php';
  		
  	 //proteje com injetion DB
  		
function DBEscape($dados)
{
	$conn= DBConnect();
	
	 if(!is_array($dados))
	 	$dados = mysqli_real_escape_string($conn, $dados);
	 else {
	 	$arr = $dados;
	 	foreach ($arr as $key => $value) {
	 		$key   = mysqli_real_escape_string($conn, $key);
	 		$value = mysqli_real_escape_string($conn, $value);
	 		
	 		$dados[$key] = $value;
	 	}

	 }
	 DBClose($conn);
	 return $dados;

  }

   //fecha conexão
	function DBClose($link){
   		@mysqli_close($link) or die(mysqli_error($link));

    		}
  
  //abre conexão com DB
  function DBConnect(){
  	$link = mysqli_connect(HOST, USER, PASS, DB) or die(mysqli_connect_error());
  	
  	mysqli_set_charset($link, CHARSET) or die(mysqli_error($link));
  	return $link;
  }


  ?>
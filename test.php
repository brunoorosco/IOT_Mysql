<!DOCTYPE html>
<html>
<head>
	<title> Inserir Dados</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"  href="reset.css">
	<link rel="stylesheet"  href="style_form.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
</head>
<body>
	<div class="w3-container w3-orange">
		<h2 style="font-size  : 50px; font-family: Arial, Helvetica, sans-serif;">
		   INSERÇÃO DE DADOS</h2>
	</div><br><br>

		<form class="w3-container" action="entrada_dados.php" method="get">
		<p>
		<label style="font-size  : 30px;"><b>Nome do Equipamento</b></label>
		<input class="input" type="text" name="serie"></p><br>

		<p>
		<label style="font-size  : 30px;">Temperatura</label>
		<input type="text" class="input" name="temp"></p><br>

		<p>
		<input type="submit" class="w3-button" name="Enviar" ></p>
		</form>


</body>
</html>

<script>
    $(document).ready(function(){ 
	$('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove();
    }); 
</script>


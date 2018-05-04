<?php
	if (isset($_POST["producto"])){
		$producto = $_POST["producto"];
		$url = "http://localhost/webservice/webservice.php";

		//se inicia curl en el servidor especifico
		$ch = curl_init($url);
		//parametros
		$parametros = "producto=$producto";
		//metodo POST
		curl_setopt($ch, CURLOPT_POST, 1);
		//agregar parametros: Define los datos del POST (ejemplo: "usu=daniel&password=12345;”)
		curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
		//MAXIMO TIEMPO DE espera de respuesta del server
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//ejecutamos la peticion
		$resultado = curl_exec($ch);

		//cerrar
		curl_close($ch);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<h1>CLIENTE YOHANY</h1>
		Ingrese alguno de los siguientes productos: <strong>zapatos, pantalones, camisa</strong>
		<hr>
		<form method="post" action="">
			<input type="text" name="producto">
			<input type="submit" name="enviar">
		</form>
		<hr>
		<h3><?php 
		if (isset($_POST["producto"])) echo $resultado 
		?></h3>
	</body>
</html>
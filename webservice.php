<?php
function producto($producto=''){
	$productos = array(
						"zapatos" => 1000,
						"pantalones" => 2000,
						"camisa" => 1500,
					);
	if (array_key_exists($producto, $productos)){
		return $producto . " cuesta " . $productos[$producto] . " €";
	}
	else{
		return "¡¡¡El producto " . $producto . " seleccionado no ha sido encontrado!!!";
	}
}
if (isset($_POST["producto"])){
	$a = producto($_POST["producto"]);
	print "¡¡¡" . $a;
	//producto($_POST["producto"]);
}else{
	echo "primer arranque webservices";
}
?>
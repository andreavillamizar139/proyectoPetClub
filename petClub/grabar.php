<?php
/* Se conecta con la base de datos elegida. */
require 'database.php';
 
	$datos = base64_encode(file_get_contents($_FILES['imagen']['tmp_name']));
 
	try{
		$consulta = "INSERT INTO imagenes (";
		$consulta .= "imagen";
		$consulta .= ") VALUES (";
		$consulta .= "'".$datos."');";
		$conn->query($consulta);
	} catch (Exception $e) {
		die ("Se produjo un error");
	}
 
	echo "Imagen almacenada.";
?>
<?php include("auth.php"); ?>
<?php
require 'database.php';
	$request=$_REQUEST;

	$cat=$request["categ"];
	$raza=$request["raza"];
	$nombre=$request["nombre"];
	$nacimiento=$request["nacimiento"];
	//$datos="ffffffffff";
    $datos = base64_encode(file_get_contents($_FILES["imagen"]["tmp_name"]));
	//$id=1;
	$idUsuario=$_SESSION['idusuario'];
	$sqlidusuario = "SELECT idCliente FROM cliente WHERE FK_idUsuario = $idUsuario";
	$resultadoidusuario = mysqli_query($conn, $sqlidusuario);
	$ej=mysqli_fetch_array($resultadoidusuario);
	$id=$ej[0];
	
	
	?>
<?php	
	$sql="INSERT INTO `mascota` ( `categoria`, `raza`, `nombre`,`FK_idCliente` ,`fechaNacimiento`,`imagen`) VALUES
(  '$cat','$raza','$nombre','$id','$nacimiento', '$datos')";

if(mysqli_query($conn, $sql)){
	header("Location: mascotas.php?text=1");

}else{
	header("Location: RegistrarMascota.php?text=2");

}
mysqli_close($conn);


?>



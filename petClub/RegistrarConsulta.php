<?php

include("authVet.php");

require 'database.php';
	$request=$_REQUEST;

	$tem=$request["temperatura"];
	$pul=$request["pulso"];
	$diag=$request["diagnostico"];
	$trat=$request["tratamiento"];
	$prueba=$request["pruebas"];
	$peso=$request["peso"];
	

$sql="INSERT INTO `historialclinico` ( `temperatura`, `pulso`, `diagnosticoFinal`, `tratamiento`, `prueba`, `peso`) VALUES
(  '$tem','$pul','$diag','$trat','$prueba','$peso')";
if (mysqli_query($conn, $sql)) {
	$last_id = mysqli_insert_id($conn);
	$cita=$_SESSION['cita'];
	$sql2 = "UPDATE cita SET estado='asistió',idHistorial='$last_id' WHERE idCita='$cita'";
	if(mysqli_query($conn, $sql2)){
		header('Location: atender.php?text=1');
	}else{header('Location: atender.php?text=3');}
  } else {
	header('Location: atender.php?text=2');
  }




?>
<?php
include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Historial</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.css">
</head>

<body class="formlogin">

	<?php
	//error_reporting(0);
	if (isset($_SESSION['veterinario'])) {
		require_once("headervet.php");
	} else {
		require_once("headercliente.php");
	}
	require 'database.php';


	$id = $_POST['idMascota'];
	$sql = "SELECT * FROM cita INNER JOIN agendaveterinario ON agendaveterinario.idAgendaVeterinario = cita.idAgendaVeterinario WHERE idMascota ='$id' ORDER BY idCita";

	$sql1 = "SELECT * FROM mascota WHERE idMascota =$id";
	$query = mysqli_query($conn, $sql);
	$query1 = mysqli_query($conn, $sql1);
	$mascexist = mysqli_num_rows($query1);

	$totalData = mysqli_num_rows($query);


	if ($totalData <= 0) {
		header('Location: historial.php?error=2');
	}
	// }
	$rowmasc = mysqli_fetch_array($query1);
	echo '<div class="loguinCuadro1"><span > ';
	echo "<div class='mascota'>";
	echo "<h1>" .  $rowmasc[2] . "</h1>";
	if (empty($rowmasc[6])) {

		// Imprimes la imagen utilizando la ruta, por ejemplo:
		echo "<img  src='img\default.jpg' alt='imagen'/>";
	} else {

		echo "<img src='data:imagen/png;base64," . $rowmasc[6] . "'>";
		// Lo que tengas ahora mismo para imprimir la imagen BLOB
	}

	echo "</div><span >Fecha de Nacimiento: $rowmasc[3]";
	echo "<br/> Categoria: $rowmasc[4]";
	echo "<br/> Raza: $rowmasc[5]";
	echo mysqli_num_rows($query1);
	echo "<br/><br/></span></span></center></div>";
	echo '<div class="grid-container">';



	while ($row = mysqli_fetch_array($query)) {

		$sql2 = "SELECT fecha, hora FROM agenda WHERE idAgenda ='$row[7]' ";
		$sql21 = "SELECT FK_idUsuario FROM veterinario WHERE idVeterinario ='$row[6]'";
		$query2 = mysqli_query($conn, $sql2); //CONSULTA AGENDA
		$query21 = mysqli_query($conn, $sql21); //CONSULTA veterinario

		$row2 = mysqli_fetch_array($query2);
		$row21 = mysqli_fetch_array($query21);

		$sql3 = "SELECT nombre FROM usuario WHERE idUsuario ='$row21[0]'";
		$query3 = mysqli_query($conn, $sql3); //CONSULTA EL NOMBRE DEL VETERINARIO
		$row3 = mysqli_fetch_array($query3); //nombre veterinario


		$sql4 = "SELECT * FROM historialclinico WHERE idHistorial ='$row[2]'";
		$query4 = mysqli_query($conn, $sql4);
		$histo = mysqli_num_rows($query4);

		$row4 = mysqli_fetch_array($query4);
	?>
		<div class="grid-item">
		<div class="historialCuadro"> 

			<span> <?php


					echo '<b>';
					echo "ID consulta: $row[0]";
					echo '</b><br/>';
					echo "<b>Veterinario: </b>$row3[0]";
					echo '<br/>';
					echo "<b>Fecha: </b>$row2[0]";
					echo '<br/>';
					echo "<b>Hora: </b>$row2[1]";
					echo '<br/>';
					if ($histo > 0) {
						echo "<b>Peso: </b>$row4[6] kg";
						echo '<br/>';
						echo "<b>Temperatura: </b>$row4[1] °C";
						echo '<br/>';
						echo "<b>Pulso: </b>$row4[2] puls/min";
						echo '<br/>';
						echo "<b>Diagnostico: </b>$row4[3]";
						echo '<br/>';
						echo "<b>Tratamiento: </b>$row4[4]";
						echo '<br/>';
						echo "<b>Examenes: </b>$row4[5]";
						echo '<br/>';
					} else {
						echo '<p>No hay historial para esta cita.<br/> Aún está pendiente</P></br>';
					}
					echo '<br/></span></div></div>'; 

					
				}
					?>
			

			
		</div>
		<center><a class='boton-sesionn' href='historial.php'>cerrar</a></center>

		<?php
		require_once("footer.php");
		?>

</body>

</html>
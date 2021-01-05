<?php
include("authVet.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Atender Mascota</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="formlogin">
	<?php
	require_once("headervet.php");
	require 'database.php';
	?>
	<main class="contenedor contenedor-iniciar-sesion">
		<div class="formulario-login">
			<div class="letra-form2">
				<form action="RegistrarConsulta.php" method="POST">
					<div class="campo">
						<?php
						
						$_SESSION['cita'] = $_POST['cita'];
						$cita=$_SESSION['cita'];
						$sql="SELECT idMascota FROM cita WHERE idCita = $cita";
						$results=mysqli_query($conn,$sql);
						$row = mysqli_fetch_array($results);

						$sql1 = "SELECT nombre, idMascota FROM mascota WHERE idMascota = $row[0]";
						$results1=mysqli_query($conn,$sql1);
						$row1 = mysqli_fetch_array($results1);
					
					    echo "<b style='color:white; font-size:20px; padding-left:10px'>ID de la mascota: $row1[1]";
						echo "</b></div>"; 
						
						echo "<div class='campo'><br/> <b style='color:white; font-size:20px; padding-left:10px'>Nombre: $row1[0]";
						echo "</b><br/>"; 
						?>
						</div>
					<table>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Temperatura: </b></th>
							<td>
								<div class="campo">
									<input name="temperatura" type="text" placeholder="temperatura en °C" required/>
								</div>
							</td>
						</tr>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Pulso: </b></td>
							<td>
								<div class="campo">
									<input name="pulso" type="text" placeholder="Pulsaciones por minuto" required/>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Diagnostico Final: </b></td>
							<td>
								<div class="campo">
									<input name="diagnostico" type="text" placeholder="Diagnostico" required/>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Tratamiento: </b></td>
							<td>
								<div class="campo">
									<input name="tratamiento" type="text" placeholder="Tratamiento Recomendado" required/>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Prueba: </b></td>
							<td>
								<div class="campo">
									<input name="pruebas" type="text" placeholder="Pruebas a realizar" required/>
								</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><b style="color:white; font-size:20px; padding-left:10px">Peso: </b></td>
							<td>
								<div class="campo">
									<input name="peso" type="text" placeholder="Peso en Kg" required/>
								</div>
								</div>
							</td>
						</tr>
					</table>
					<div class="campo">
						<input class="boton-sesionn"  type="submit" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</main>
	<script>
		function myFunction() {
			if ($ban = 1) {
				alert("Datos registrados");
			} else {
				alert("Datos no registrados");
			}
		}
	</script>
	<?php
	require_once("footer.php");
	?>
</body>

</html>
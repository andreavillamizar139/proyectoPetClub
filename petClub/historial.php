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
	<link rel="icon" href="img/huella.png" type="image/png" />

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.css">
</head>

<body class="formlogin">
	<?php
	if (isset($_SESSION['veterinario'])) {
		require_once("headervet.php");
	} else {
		require_once("headercliente.php");
	}

	?>
	<main class="contenedor contenedor-iniciar-sesion">
		<div class="formulario-login">

			<form action="historialMascota.php" method="POST">
				<?php if (isset($_GET['error']) && $_GET['error'] == 1) {
					echo "<script>
		alert('¡El cliente no tiene mascotas registradas!')</script>";
				}
				if (isset($_GET['error']) && $_GET['error'] == 2) {
					echo "<script>
		alert('¡La mascota no tiene citas registradas!')</script>";
				}
				if (isset($_GET['error']) && $_GET['error'] == 3) {
					echo "<script>
		alert('¡El cliente no existe!')</script>";
				}
				?>
				<div class="campo">
					<h3>Ingrese la cédula del cliente:</h3>
				</div>
				<div class="campo">
					<b>ID:&nbsp;&nbsp;&nbsp; </b><input name="cedula" type="text" placeholder="1234567890">
				</div>
				<div class="campo">
					<input class="boton-sesionn" style="background-color: #F2726F;" type="submit" value="Buscar">
				</div>
			</form>
		</div>
	</main>
	<?php
	require_once("footer.php");
	?>

</body>

</html>
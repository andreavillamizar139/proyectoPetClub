<?php include("authCliente.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
	<title>Registrar Mascota</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
	<link rel="icon" href="img/huella.png" type="image/png" />

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.css">
</head>
<?php if (isset($_GET['text']) && $_GET['text'] == 2) {
						echo "<script>
		alert('¡No se pudieron guardar los datos!')</script>";
					} ?>
<body >
	<?php
	require_once("headercliente.php");
	require 'database.php';
	?>

	<main class="contenedor contenedor-iniciar-sesion">
        <div class=formulario-login>
            <form action="RegistrarMascotadb.php" method="POST" enctype='multipart/form-data'>
                <h1 class="titulo1" style="color:white;text-align:center; font-size:23px;padding-bottom:1px;">DATOS DE LA MASCOTA</h1>
                


                
                <div class="campo"style="padding-left:4rem;justify-content:left;"><span>Categoría:</span> &nbsp &nbsp &nbsp &nbsp 
                <select id="categ" name="catego" style="color:white;background-color:#5D62B5;height:4rem;width:40rem; padding:1rem;border-radius:1rem;" >
                    <option value=""  disabled selected ><span>Selecciona la categoría de tu mascota<span></option>
                    <option value="perro"  >Perro</option>
                    <option value="gato">Gato</option>
                    <option value="roedor">Roedor</option>
                    <option value="ave">Ave</option>
                </select>

                </div>
                <div class="campo"style="padding-left:4rem;justify-content:left;">
                    <span>Raza:</span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                    <input name="raza" type="text" placeholder="Ejemplo:Yorkshire" required >


                </div>
                
                </br>
                <div class="campo"style="padding-left:4rem;justify-content:left;"><span>Nombre:</span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<input name="nombre" type="text" placeholder="Nombre de la mascota" required />
				</div></br>
						
							
				<div class="campo" style="padding-left:4rem;justify-content:left;"><span>Fecha de Nacimiento:</span>&nbsp &nbsp &nbsp &nbsp
					<input type="date" name="nacimiento" style="padding:1rem;" value="2018-07-22" min="2009-01-01" max="2020-12-31" required />

                </div>
                </br>
					

				<div style="padding-left:4rem;justify-content:left;color:white;"><span>Imagen:</span>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
					<input name="imagen" type="file" style="color: transparent; width: 25rem;padding:1rem;border-radius:1rem;">
                </div>
                </br>
                
			    <div class="inferior">
				    <input class="boton-sesionn" onclick="myFunction()" style="background-color: #F2726F;" type="submit" value="Registrar">
				</div>
                

            </form>
                </div>

		
			
		
	</main>

	<?php
	require_once("footer.php");
	?>
</body>

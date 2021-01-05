<?php
    include("auth.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetClub</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
		if(isset($_SESSION['veterinario'])){
			require_once("headervet.php");
		}else{
			require_once("headercliente.php");
		}
   
	 ?>
     <main class="contenedor">
        <div class="grid centrar-columnas">
            <div class="morado">
                <div class="columna-12 texto-morado">
                    <h4>Bienvenido a PetClub  <?php echo $_SESSION['username']; ?>!</h4>
                    <p>PetClub es una clinica veterinaria en la que contamos con variedad de servicios de los que puedes beneficiarte junto a tus mascotas, no dudes en visitarnos. <br> Estamos tan comprometidos como tu con su cuidado.</p>
                </div>
            </div>

            <div class="imagen-principal columna-10">
                <img src="img/imagen.png" alt="Imagen PetClub">
            </div>
        </div>
    </main>

    <?php
        require_once("footer.php");
    ?>


</body>

</html>
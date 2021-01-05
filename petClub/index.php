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
    require_once("header.php");
 ?>
    <main class="contenedor">
        <div class="grid centrar-columnas">
            <div class="morado">
                <div class="columna-12 texto-morado">
                    <h1>Bienvenido a PetClub, el mejor lugar para tus mascotas.</h1>
                    <p>PetClub es una clinica veterinaria en la que contamos con variedad de servicios de los que puedes beneficiarte junto a tus mascotas, no dudes en visitarnos. <br> Estamos tan comprometidos como tu con su cuidado.</p>
                </div>
            </div>

            <div class="imagen-principal columna-10">
                <img src="img/imagen.png" alt="Imagen PetClub">
            </div>
        </div>
    </main>




    <section class="contenedor">
        <h2 class=" centrar-texto">Enterate de los servicios que tenemos a tu disposición</h2>
        <div class="informaciones">
            <div class="informacion">
                <div class="titulo">
                    <img src="img/1.png" alt=" Icono Productos ">
                    <div>
                        <h3 class="no-margin">Monitorea a tu mascota</h3>
                        <p>Podrás consultar el historial clínico de tu mascota, de esta manera estarás al tanto de su salud.</p>
                    </div>
                </div>

            </div>

            <div class="informacion ">
                <div class="titulo">
                    <img src="img/2.png " alt="Icono agenda ">
                    <div>
                        <h3 class="no-margin">Agenta tu cita desde casa</h3>
                        <p>Puedes solicitar tu cita acá, solo debes registrarte! Nuestro compromiso es contigo y tus mascotas.</p>
                    </div>
                </div>

            </div>

            <div class="informacion ">
                <div class="titulo">
                    <img src="img/3.png " alt="Icono consejos ">
                    <div>
                        <h3 class="no-margin">Consejos</h3>
                        <p>Te ofrecemos los mejores consejos para el cuidado y bienestar de tus mascotas.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

<?php
require_once("footer.php");
?>

</body>

</html>
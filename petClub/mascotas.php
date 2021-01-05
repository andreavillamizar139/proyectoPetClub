<?php include("authCliente.php"); ?>
<?php
require_once('database.php');
$auxIdusuario = $_SESSION['idusuario'];
$sql0 = "SELECT idCliente FROM cliente INNER JOIN usuario ON cliente.FK_idUsuario = usuario.idUsuario WHERE idUsuario= $auxIdusuario";
$resultadoo = $conn->query($sql0);
$row = mysqli_fetch_array($resultadoo);
$sql = "SELECT nombre, fechaNacimiento, categoria, raza,imagen FROM mascota INNER JOIN cliente ON mascota.FK_idCliente = cliente.idCliente WHERE idCliente = $row[0]";
$resultado = $conn->query($sql);


while ($mascotas = $resultado->fetch_assoc()) {

    $mascota = array(
        'nombre' => $mascotas['nombre'],
        'fechaNacimiento' => $mascotas['fechaNacimiento'],
        'categoria' => $mascotas['categoria'],
        'raza' => $mascotas['raza'],
        'imagen' => $mascotas['imagen']
    );

    $mascotass[] = $mascota;
    $_SESSION['mascotass'] = $mascotass;
}
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
<?php if (isset($_GET['text']) && $_GET['text'] == 1) {
                    echo "<script>
		alert('¡Los datos se guardaron exitosamente!')</script>";
                }
             
                ?>

<body>
    <?php require_once("headercliente.php"); ?>
    <?php if (empty($mascotass)) {
        echo <<<EOT
        <div class='contenedor'> 
            <p>No tienes mascotas registrada. Registra tu mascota e intentalo nuevamente</p> 
            <a class='boton-sesionn' href='RegistrarMascota.php'>Registra mascota</a> 
        </div>
        EOT;
    } else { ?>

        <div class="contenedor">
            <h1 class="solicitarcita"> Mis mascotas</h1>

            <div class="contenedor1">
               
                <form action="confirmacionDatos.php" method="post">
                    <div class="mascotas">
                        <?php for ($i = 0; $i < count($mascotass); $i++) {

                            echo <<<EOT
                <div class="mascota">
                EOT;
                            if (empty($mascotass[$i]['imagen'])) {

                                // Imprimes la imagen utilizando la ruta, por ejemplo:
                                echo "<img  src='img\default.jpg' alt='imagen'/>";
                            } else {
                                echo "<img src='data:imagen/png;base64," . $mascotass[$i]['imagen'] . "'>";
                                // Lo que tengas ahora mismo para imprimir la imagen BLOB
                            }

                            echo "<h1>" . $mascotass[$i]['nombre'] . "</h1>";
                            echo "<p>Fecha de nacimiento:" . $mascotass[$i]['fechaNacimiento'] . "<br>";
                            echo "Categoría:" . $mascotass[$i]['categoria'] . "<br>";
                            echo "Raza:" . $mascotass[$i]['raza'] . "</p><br>";


                            echo "</div>";
                        } ?>
                    </div>
                    <div class='subhora'>
                        <a class='boton-sesionn' href='RegistrarMascota.php'>Registrar nueva mascota</a>
                        <a class='boton-sesionn' href=''>Volver al inicio</a>
                </form>
            </div>
        </div>
        </div>
    <?php } ?>

    <?php require_once("footer.php"); ?>


</body>

</html>
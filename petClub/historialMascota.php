<?php include("authVet.php"); ?>


<?php
require_once('database.php');

$request = $_REQUEST;

$id = $request['cedula'];

$sqlid = "SELECT * FROM usuario INNER JOIN cliente ON usuario.idUsuario = cliente.FK_idUsuario WHERE numeroDocumento = '$id'";
$queryid = mysqli_query($conn, $sqlid); //datos del cliente
while ($rowid = mysqli_fetch_array($queryid)) {
    //0=idUsuario , 1 = email, 2 = password, 3 = tipoUsuario, 4 = tipoDocumento, 5 = nombre, 6 = numeroDocumento, 7 = celular, 8 =fechaNacimiento, 9 = idCliente, 10 = FK_idUsuario

    $nombreCliente = $rowid[5]; //nombre

    $cedulaCliente = $rowid[6]; //cedula

    $celularCliente = $rowid[7]; //celular

    $idCliente = $rowid[9];
}
$sql1 = "SELECT * FROM mascota WHERE FK_idCliente ='$idCliente'";
$query1 = mysqli_query($conn, $sql1);
$mascexist = mysqli_num_rows($query1);
if ($mascexist <= 0) {

    header('Location: historial.php?error=1');
}
if (mysqli_num_rows($queryid)<=0) {
    header('Location: historial.php?error=3');
}

while ($mascotas = mysqli_fetch_array($query1)) {

    $mascota = array(
        'idMascota' => $mascotas['idMascota'],
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

<body>
    <?php require_once("headervet.php"); ?>


    <div class="contenedor">
        <h1 class="solicitarcita"> Seleccionar Mascota</h1>


        <div class="contenedor1">
            <h1>Selecciona una mascota para ver su historial<br /><?php
                                                                    echo "<p id='datosCliente'>Nombre del Cliente: $nombreCliente<br/>
        Cédula: $cedulaCliente<br/>
        Celular: $celularCliente</p>
        "; ?>
            </h1>
            <?php

            ?>
            <form action="historialdb.php" method="post">
                <div class="mascotas">
                    <?php for ($i = 0; $i < count($mascotass); $i++) {

                        $auxid = $mascotass[$i]['idMascota'];

                        echo <<<EOT
            <div class="mascota">
            <label>
            <input type="radio" name="idMascota" id="idMascota" value='$auxid'>
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

                        echo "</label>";
                        echo "</div>";
                    } ?>
                </div>
                <div class='subhora'>
                    <input type="submit" class='boton-sesionn' name='confirmacionCita' value="Consultar"></div>
            </form>
        </div>
    </div>

    <?php require_once("footer.php"); ?>


</body>

</html>
<?php include("authCliente.php"); ?>
<?php include("database.php"); ?>

<?php
$ejemplomascota = $_SESSION['mascotaseleccionada'];
$_SESSION['fechaseleccionada'];
$horaSeleccionada = $_SESSION['horaSeleccionada'];
$horasDisponibles= $_SESSION['horasDisponibles'];
$mascotass=$_SESSION['mascotass']; 
$idmascotaSeleccionada=$mascotass[$_SESSION['mascotaseleccionada']]['idMascota']; 


$idAgendaVeterinario='';
for($i=0; $i<count($horasDisponibles); $i++) {
    if($horaSeleccionada == $horasDisponibles[$i]['hora']){
        $idAgendaVeterinario=$horasDisponibles[$i]['idAgendaVeterinario'];
        $i=count($horasDisponibles);
    }
}
;


$sqlregistroCita = "INSERT INTO `cita` (`idCita`, `idMascota`, `idHistorial`, `estado`, `idAgendaVeterinario`) VALUES (NULL, '$idmascotaSeleccionada', NULL, 'Pendiente', '$idAgendaVeterinario')";
if (mysqli_query($conn, $sqlregistroCita)) {
    //echo "Se ha registrado correctamente la cita!";
} else {
    echo "Error: " . $sqlregistroCita . "<br>" . mysqli_error($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetClubb</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
<?php require_once("headercliente.php"); ?>

<div class="contenedor">

<h1 class="solicitarcita"> Solicitar cita</h1>
<div class="contenedor1">
<div class="mascota paralelo">
    <div class="imagen-confirmacion"> 
   <?php if (empty($mascotass[$ejemplomascota]['imagen'])) {
            
            // Imprimes la imagen utilizando la ruta, por ejemplo:
            echo "<img  src='img\default.jpg' alt='imagen'/>";
         } else {
            echo"<img src='data:imagen/png;base64,".$mascotass[$ejemplomascota]['imagen']."'>";
            // Lo que tengas ahora mismo para imprimir la imagen BLOB
         }?>
        
    </div>

    <div class="confirmacion">
        <h2>Tu cita ha sido programada!</h2>
        <p>Te esperamos</p>
        <p> <span>Mascota:</span> <?php echo $mascotass[$ejemplomascota]['nombre'];?></p> 
        <p> <span>Fecha: </span> <?php echo $_SESSION['fechaseleccionada']; ?></p>
        <p> <span>Hora: </span> <?php echo $_SESSION['horaSeleccionada']; ?></p>    
        
    </div>
    
</div><div class='subhora'>
<a class='boton-sesionn'style="text-decoration:none;" href='solicitarcita.php'>Aceptar</a> 
        </div>
</div>
</div>

<?php require_once("footer.php"); ?>
</body>

</html>


<script type="text/javascript">
    function registrarBase(){

    }
</script>


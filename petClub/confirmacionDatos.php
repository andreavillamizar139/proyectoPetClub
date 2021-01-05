<?php include("authCliente.php"); ?>
<?php
    if(isset($_POST['confirmacionCita'])){
        $ejemplomascota = $_POST['mascotica'];
        $_SESSION['mascotaseleccionada'] = $ejemplomascota; 
        //echo "<br> La fecha seleccionada es: ".$_SESSION['fechaseleccionada'];
        //echo "<br> La hora seleccionada es: ".$_SESSION['horaSeleccionada'];
        $mascotass = $_SESSION['mascotass']; 
        //echo "<br> La mascota seleccionada es : ".$mascotass[$ejemplomascota]['nombre'];
        
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
            <h2>Datos de la cita:</h2>
            <p>Por favor verifica si los datos son correctos</p>
            <p> <span>Mascota:</span> <?php echo $mascotass[$ejemplomascota]['nombre'];?></p> 
            <p> <span>Fecha: </span> <?php echo $_SESSION['fechaseleccionada']; ?></p>
            <p> <span>Hora: </span> <?php echo $_SESSION['horaSeleccionada']; ?></p>    
            
        </div>
        
    </div><div class='subhora'>
    <a class='boton-sesionn' href='aceptarcita.php'>Aceptar</a> 
            <a class='boton-sesionn' href='solicitarcita.php'>Cancelar</a> </div>
    </div>
    </div>

    <?php require_once("footer.php"); ?>

</body>

</html>


<script type="text/javascript">
    function registrarBase(){

    }
</script>


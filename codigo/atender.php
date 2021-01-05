<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

</script>

<body class="formlogin" onload="recargarListaHora()">
    <?php
    include("authVet.php");
    ?>
    <?php require_once("headervet.php"); ?>
    <?php
    date_default_timezone_set("America/Bogota");
    $hoy = date("Y-m-d");
    $ayer = date('Y-m-d', strtotime(date("Y-m-d") . "- 1 days"));
    $diasas = date('Y-m-d', strtotime("+15 days")); ?>

    <main class="contenedor">

        <h1 class="solicitarcita"> Atender cita</h1>
        <form action="atenderMascota.php" method="post">
            <div class="contenedor-fecha">
                <div class="morado2">
                    <h3>Selecciona un día para ver las cita pendientes</h3>
                    <div class="fondoblanco">
                        <div name="horaa " id="horaa">

                        </div>

                    </div>


                    <div class="img1"><img src="img/perro.png" alt="perro"></div>
                </div>
                <div class="solicitar-fecha">

                    <input type="date" name="fechaCita" value=<?php echo $hoy; ?> id="fechaCita" width="100" min="<?php echo $hoy; ?>" max="<?php echo $diasas; ?>">
                </div>



            </div>

            <!-- <input class='boton-sesionn' type="submit" value="Continuar" name='listamascotas'> -->
        </form>
    </main>
    <?php if (isset($_GET['text'])) {
        if ($_GET['text'] == 1) {
            echo "<script>
            alert('¡La consulta se registro exitosamente!')</script>";
        }else{
            echo "<script>
            alert('ERROR: No se guardaron los cambios')</script>";
        }
    }
    ?>
    <?php
    require_once("footer.php");
    ?>

</body>

</html>
<script>
    $('form').submit(function(e) {
        // si la cantidad de checkboxes "chequeados" es cero,
        // entonces se evita que se envíe el formulario y se
        // muestra una alerta al usuario
        if ($('input[type=radio]:checked').length === 0) {
            e.preventDefault();
            alert('Debe seleccionar una cita');

        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#fechaCita').change(function() {
            recargarListaHora();
        });
    })
</script>

<script type="text/javascript">
    function recargarListaHora() {
        $.ajax({
            type: "POST",
            url: "verpendientes.php",
            data: "fechaa=" + $('#fechaCita').val(),
            success: function(r) {
                $('#horaa').html(r);
            }
        });
    }
</script>
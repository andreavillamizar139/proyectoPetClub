<?php include("authCliente.php"); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PetClub</title>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/style.css">
        

    </head>

    <body onload="recargarListaHora()">
        <?php require_once("headercliente.php"); ?>
        <?php 
        date_default_timezone_set( "America/Bogota");

        $hoy = date("Y-m-d");
        $ayer = date('Y-m-d', strtotime(date("Y-m-d")."- 1 days"));
        $diasas = date('Y-m-d', strtotime("+15 days")); ?>

        <div class="contenedor">
            <h1 class="solicitarcita"> Solicitar cita</h1>
            <form action="elegirmascotas.php" method="post">
                <div class="contenedor-fecha">
                <div class="morado2">
                    <h3>Selecciona el día y la hora de tu preferencia:</h3>
                    <div  class="fondoblanco" name="horaa "id="horaa"></div>
                    <div class="img1" ><img  src="img/perro.png" alt="perro"></div>
                </div> 
                <div class="solicitar-fecha">
                        
                        <input type="date" name="fechaCita" value=<?php echo $hoy; ?> id="fechaCita" width="100" min="<?php echo $hoy; ?>" max="<?php echo $diasas; ?>">
                </div>
                

                 
                </div>          
                
                
            </form>

        </div>
        <?php require_once("footer.php"); ?>
    </body>
</html>


<script type="text/javascript">
	$(document).ready(function(){

		$('#fechaCita').change(function(){
			recargarListaHora();
		});
	})
</script>

<script type="text/javascript">
	
    function recargarListaHora(){
		$.ajax({
			type:"POST",
			url:"listarhoras.php",
			data:"fechaa=" + $('#fechaCita').val(),
			success:function(r){
				$('#horaa').html(r);
			}
		});
	}
	
</script>



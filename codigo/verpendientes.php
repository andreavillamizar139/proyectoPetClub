<?php
include("auth.php");


require_once("database.php");
$idUser = $_SESSION['idusuario'];
$dia = $_POST['fechaa'];
$sql = "SELECT nombre FROM usuario where idUsuario=$idUser";
$results0 = mysqli_query($conn, $sql);
$row0 = mysqli_fetch_array($results0);
$nombre = $row0[0]; //nombre del veterinario
$_SESSION['vet'] = $nombre;



$sql1 = "SELECT * FROM veterinario where FK_idUsuario=$idUser";
$results = mysqli_query($conn, $sql1);
$row = mysqli_fetch_array($results);
$idVet = $row[0]; //id del veterinario
$_SESSION['idvet'] = $idVet;

$i = 0;

$sql2 = "SELECT hora, idAgendaVeterinario FROM agendaveterinario INNER JOIN agenda ON agendaveterinario.idAgenda = agenda.idAgenda WHERE fecha = '$dia' AND idVeterinario='$idVet' ORDER BY hora";
$results2 = mysqli_query($conn, $sql2);
$horas = array();
$cita = array();
if (mysqli_num_rows($results2) > 0) {
    while ($row2 = mysqli_fetch_array($results2)) {
        $horas[] = $row2;
        $sqlcita = "SELECT idCita, estado FROM cita where idAgendaVeterinario=$row2[1] and estado='Pendiente'";
        $resultscita = mysqli_query($conn, $sqlcita);

        if (mysqli_num_rows($resultscita) > 0) {

            $cita[] = mysqli_fetch_array($resultscita);
           
                $idCita = $cita[$i][0];

                echo <<<EOT
            <div class="letrahora" id="asignado">
            <label id="radios"><p>
            <input type="radio" id="cita" name="cita" value="$idCita">
            EOT;
                echo  " &nbsp &nbsp" . $row2[0] . " &nbsp &nbsp Pendiente</br></br>";
                echo "</p></label>";
                echo "</div>";
                $i = $i + 1;
      
        }
    }
   
    
}
if($i==0){
    echo "<p>No hay más citas por atender este día</p>";
}else{
echo "<div class='subhora'> <input class='boton-sesionn'  type='submit' value='Atender' name='atender'></div>";
}


// echo "<h2>" . $dia . "</h2>";
// for ($i = 0; $i < count($horas); $i++) {
//     $auxID=$horas[$i][1];

//     $sql3 = "SELECT estado, idCita FROM cita where idAgendaVeterinario='$auxID'";
//     $results3 = mysqli_query($conn, $sql3);

//     if (mysqli_num_rows($results3) > 0) {
//         $row3 =  mysqli_fetch_array($results3);
//         echo <<<EOT
//         <div class="letrahora" id="asignado">
//         <label id="radios"><p>     
//         <input type="radio" id="hora" name="hora" value="$row3[1]">  
//         EOT;
//         echo  " &nbsp &nbsp" . $horas[$i][0] . " &nbsp &nbsp $row3[0]</br></br>";
//         echo "</p></label>";
//         echo "</div>";
//     } else {
//         echo <<<EOT
//         <div class="letrahora" id="disponible">
//         <label id="radios"><p>
       
//         EOT;
//         echo  " &nbsp &nbsp" . $horas[$i][0] . " &nbsp &nbsp Campo disponible para cita </br></br>";
//         echo "</p></label>";
//         echo "</div>";
//     }
//     echo '<br/>';
// }


// }else{
//     echo "<p>No hay mascotas por atender este día</p>";
// }

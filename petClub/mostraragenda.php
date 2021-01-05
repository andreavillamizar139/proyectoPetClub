<?php
include("auth.php");
?>
<?php
$horario = array(
    '07:00:00'  => true,
    '08:00:00'  => true,
    '09:00:00'  => true,
    '10:00:00'  => true,
    '11:00:00'  => true,
    '12:00:00'  => true,
    '13:00:00'  => true,
    '14:00:00'  => true,
    '15:00:00'  => true,
    '16:00:00'  => true,
    '17:00:00'  => true,
    '18:00:00'  => true,

);
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



$sql2 = "SELECT idAgenda FROM agendaveterinario WHERE idVeterinario = $idVet";
$results2 = mysqli_query($conn, $sql2);
$fechas = array();

while ($row2 = mysqli_fetch_array($results2)) {
    $agenda = [];
    // idAgenda=$row2[0] and 

    $sql3 = "SELECT fecha,hora FROM agenda WHERE fecha='$dia' AND idAgenda=$row2[0] ORDER BY hora";
    $results3 = mysqli_query($conn, $sql3);
    $numrowa = mysqli_num_rows($results3);
    if ($numrowa > 0) {
        $row3 = mysqli_fetch_array($results3);
        $fechas[] = $row3;
    };
}


foreach ($horario as $hour => $valor) {

    for ($i = 0; $i < count($fechas); $i++) {
        if ($hour == $fechas[$i][1]) {
            $horario[$hour] = false;
        }
    }
}
echo "<h2>".$dia."</h2>";
foreach ($horario as $hour => $value) {
    if ($value) {
        echo <<<EOT
            <div class="letrahora" id="disponible">
            <label id="radios"><p>
            <input type="checkbox" id="hora" name="hora[]" value="$hour">
            EOT;
        echo  " &nbsp &nbsp" .$hour ." &nbsp &nbsp Disponible</br></br>";
        echo "</p></label>";
        echo "</div>";
    } else {
        echo <<<EOT
        <div class="letrahora" id="agendado">
        <label id="radios"><p>
        <input type="checkbox" id="hora" disabled name="hora[]" value="$hour">
        EOT;
        echo  " &nbsp &nbsp" .$hour ." &nbsp &nbsp Asignada </br></br>";
        echo "</p></label>";
        echo "</div>";
    }
    echo'<br/>';

}

echo "<center><div class='botones'> <input class='boton-sesionn'  type='submit' value='Continuar' name='horavet' id='boton'>" ;
echo "<p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</p>";
echo <<<EOT
        <input class="boton-sesionn"  type="button" value="Ver agenda" onClick="location.href='agenda.php'"></div></center>
        EOT;


    
   
?>
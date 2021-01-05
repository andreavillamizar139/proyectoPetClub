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



$sql2 = "SELECT hora, idAgendaVeterinario FROM agendaveterinario INNER JOIN agenda ON agendaveterinario.idAgenda = agenda.idAgenda WHERE fecha = '$dia' AND idVeterinario='$idVet' ORDER BY hora";
$results2 = mysqli_query($conn, $sql2);
$horas = array();
if (mysqli_num_rows($results2) > 0) {
    while($row2 = mysqli_fetch_array($results2)) {
    $horas[]=$row2;
}


echo "<h2>" . $dia . "</h2>";
for ($i = 0; $i < count($horas); $i++) {
    $auxID=$horas[$i][1];

    $sql3 = "SELECT estado FROM cita where idAgendaVeterinario='$auxID'";
    $results3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($results3) > 0) {
        $row3 =  mysqli_fetch_array($results3);
        echo <<<EOT
        <div class="letrahora" id="asignado">
        <label id="radios"><p>       
        EOT;
        echo  " &nbsp &nbsp" . $horas[$i][0] . " &nbsp &nbsp $row3[0]</br></br>";
        echo "</p></label>";
        echo "</div>";
    } else {
        echo <<<EOT
        <div class="letrahora" id="disponible">
        <label id="radios"><p>
       
        EOT;
        echo  " &nbsp &nbsp" . $horas[$i][0] . " &nbsp &nbsp Campo disponible para cita </br></br>";
        echo "</p></label>";
        echo "</div>";
    }
    echo '<br/>';
}


}else{
    echo "<p>No hay agenda para este día</p>";
}
    
?>
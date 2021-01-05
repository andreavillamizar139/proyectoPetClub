<?php include("auth.php");?>


<?php

require_once("database.php");
$horas = $_POST['hora'];
$dia = $_POST['fechaCita'];
$idVet=$_SESSION['idvet'];

foreach ($horas as $id) { //registra las horas que no están en la tabla agenda

    $sql = "SELECT * FROM agenda WHERE fecha ='$dia' and hora='$id'";

    $results = mysqli_query($conn, $sql);
    $numrowa = mysqli_num_rows($results);
    if ($numrowa > 0) {
        $row = mysqli_fetch_array($results);
        
    } else {
        $sql1 = "INSERT INTO agenda (fecha, hora)
        VALUES ('$dia','$id')";
        $results1 = mysqli_query($conn, $sql1);
      

    };
    $sql2 = "SELECT * FROM agenda WHERE fecha ='$dia' and hora='$id'";
    $results2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($results2);

    $sql3 = "INSERT INTO agendaveterinario (idVeterinario, idAgenda) VALUES ('$idVet','$row2[0]')";
    $results3 = mysqli_query($conn, $sql3);
}//cierre foreach
header('Location: agendarDisp.php?text=1');


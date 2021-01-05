<?php include("auth.php"); ?>
<?php 
    require_once('database.php');
    $sqlcitasAsignadas = "SELECT * FROM cita INNER JOIN agendaveterinario ON cita.idAgendaVeterinario = agendaveterinario.idAgendaVeterinario";
    $resultado = $conn -> query($sqlcitasAsignadas);

    $citasAsignadas = array();
    while($asignadas =$resultado -> fetch_assoc()){
        $citasAsignadas[]=$asignadas;
    }
    $prueba='';
    for($i=0; $i<count($citasAsignadas); $i++) {
        $prueba .= $citasAsignadas[$i]['idAgendaVeterinario'].',';
    }
    $pruebaa = trim($prueba, ',');

    $fechaSeleccionada=$_POST['fechaa']; 
    $_SESSION['fechaSeleccionada'] = $fechaSeleccionada; 
    $sqlhoras="SELECT hora, idAgendaVeterinario FROM agendaveterinario INNER JOIN agenda ON agendaveterinario.idAgenda = agenda.idAgenda WHERE fecha = '$fechaSeleccionada' AND idAgendaVeterinario not in (".$pruebaa.") ORDER BY hora";
    $resultadoo= $conn -> query($sqlhoras);

    $horasDisponibles=array();
    while($horas = $resultadoo -> fetch_assoc()){
        $horasDisponibles[]=$horas;
    }

    $_SESSION['horasDisponibles'] = $horasDisponibles;
    $pruebahora='';

    for($i=0; $i<count($horasDisponibles); $i++) {
        //var_dump($horasDisponibles[$i]["hora"]) ;
        $pruebahora .= $horasDisponibles[$i]["hora"].'';
    }

    $pruebahoraa = trim($pruebahora, '');
    $arreglohoras = str_split($pruebahoraa,8);
    
    
    // horas no disponibles
    $sqlhorasNoDisponibles="SELECT hora, idAgendaVeterinario FROM agendaveterinario INNER JOIN agenda ON agendaveterinario.idAgenda = agenda.idAgenda WHERE fecha = '$fechaSeleccionada' AND idAgendaVeterinario in (".$pruebaa.") ORDER BY hora";
    $resultadooo= $conn -> query($sqlhorasNoDisponibles);

    $horasNODisponibles=array();
    while($horas = $resultadooo -> fetch_assoc()){
        $horasNODisponibles[]=$horas;
    }
    $pruebahoraNoDisponible='';

    for($i=0; $i<count($horasNODisponibles); $i++) {
        //var_dump($horasDisponibles[$i]["hora"]) ;
        $pruebahoraNoDisponible .= $horasNODisponibles[$i]["hora"].'';
    }

    $pruebahoraaNO = trim($pruebahoraNoDisponible, '');
    $arreglohorasNO = str_split($pruebahoraaNO,8);
    
    echo "<h2>".$fechaSeleccionada."</h2>";
    if($pruebahoraa == ''){
        
        echo "<p>No hay citas disponibles este día</p>";
    }else{
        //mostrar disponibles
    for($i=0; $i<count($arreglohoras); $i++) {
        //var_dump($arreglohoras[$i]);
        echo <<<EOT
            <div class="letrahora" id="disponible">
            <label id="radios"><p>
            <input type="radio" id="hora" name="hora" value="$arreglohoras[$i]">
            EOT;
            echo " &nbsp &nbsp".$arreglohoras[$i].".       Disponible <br><br>";
            echo"</p></label>";
            echo"</div>";
    }

    //mostrar NO disponibles 

  
        for($i=0; $i<count($arreglohorasNO); $i++) {
            //var_dump($arreglohoras[$i]);
            echo <<<EOT
                <div id="ndisponible">
                <label><p>
                <input type="radio" id="hora" name="hora" disabled value="$arreglohorasNO[$i]"  style="display:none;">
                EOT;
                echo " &nbsp  &nbsp  &nbsp".$arreglohorasNO[$i].".      No disponible <br><br>";
                echo"</p></label>";
                echo"</div>";
        }
        echo "<div class='subhora'> <input class='boton-sesionn'  type='submit' value='Continuar' name='listamascotas'></div>" ;
    }

    

?>
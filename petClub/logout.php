<?php
session_start();
// Destuir todas las Sesiones
if(session_destroy())
{
// Redirigir al index
header("Location: index.php");
}
?>
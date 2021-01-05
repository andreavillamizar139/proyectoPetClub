<?php
session_start();
if(!isset($_SESSION["tipoUsuario"])){
    header("Location: iniciarsesion.php");
exit(); }
?>
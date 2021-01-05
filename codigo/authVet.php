<?php
session_start();
if(!isset($_SESSION["veterinario"])){
    header("Location: iniciarsesion.php");
exit(); }
?>
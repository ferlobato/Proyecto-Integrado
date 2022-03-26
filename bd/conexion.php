<?php
//declaracion datos de la Base de Datos
$servername = 'localhost';
$database = 'id17937513_igwusuarios';

//LocalHost
$username = 'root';
$password = '';

//conexion base de datos
$conn = mysqli_connect($servername, $username, $password, $database);

//comrpobar conexion correcta
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}//FinSi

?>
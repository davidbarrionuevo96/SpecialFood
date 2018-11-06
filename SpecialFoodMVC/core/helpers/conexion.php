<?php

$host_db = "localhost:3306";
$user_db = "root";
$pass_db = "admin";
$db_name = "SpecialFoodDB";
$tbl_name = "usuario";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
	die("La conexion falló: " . $conexion->connect_error);
}

?>
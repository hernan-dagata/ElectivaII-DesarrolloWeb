<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();
$sqlAutores = "select codigo, nombre from autores";
$resultAutores = $miconexion->EjecutarSQL($sqlAutores);
$codigo_autor = isset($_GET['codigo_autor']) ? $_GET['codigo_autor'] : '';
?>
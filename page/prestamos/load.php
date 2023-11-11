<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();

$sqlUsuario = "select codigo, nombre from usuarios";
$resultUsuarios = $miconexion->EjecutarSQL($sqlUsuario);
$codigo_usuario = isset($_GET['codigo_usuario']) ? $_GET['codigo_usuario'] : '';

$sqlLibros = "select codigo, titulo from libros";
$resultLibros = $miconexion->EjecutarSQL($sqlLibros);
$codigo_libro = isset($_GET['codigo_libro']) ? $_GET['codigo_libro'] : '';
?>
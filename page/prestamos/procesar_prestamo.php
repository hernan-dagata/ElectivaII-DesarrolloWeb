<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();

$codigo=$_POST['codigo'];
$codigo_usuario=$_POST['codigo_usuario'];
$codigo_libro=$_POST['codigo_libro'];
$fecha_prestamo=$_POST['fecha_prestamo'];
$fecha_devolucion=$_POST['fecha_devolucion'];

//Insertar
if(@$_POST['btnRegistrar']){
    $sql="insert into prestamos(codigo,codigo_usuario,codigo_libro,fecha_prestamo,fecha_devolucion) values('".$codigo."','".$codigo_usuario."','".$codigo_libro."','".$fecha_prestamo."','".$fecha_devolucion."')";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if($numfila>0){
            echo "Prestamo registrado exitosamente.";
        }
        else{
            echo "Error, no se pudo registrar el prestamo.";
        }
    }
}

//Consultar
if (@$_POST['btnConsultar']){
    $sql="select codigo, codigo_usuario, codigo_libro, fecha_prestamo, fecha_devolucion from prestamos where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        while ($row=$miconexion->ObtenerFilas($result)){
            header ("location: gestionar_prestamo.php?codigo=".$row[0]."&codigo_usuario=".$row[1]."&codigo_libro=".$row[2]."&fecha_prestamo=".$row[3]."&fecha_devolucion=".$row[4]);
        }
    }
    else {
        echo "Error, no se pudo consultar el prestamo.";
    }
}

//Eliminar
if(@$_POST['btnEliminar']){
    $sql="delete from prestamos where codigo='".$codigo."'";
    $result =$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if ($numfila>0){
            echo "prestamo eliminado exitosamente.";
        }
        else {
            echo"Error, no se pudo eliminar el prestamo.";
        }
    }
}

//Actualizar
if (@$_POST['btnActualizar']){
    $sql="update prestamos set codigo_usuario='".$codigo_usuario."', codigo_libro='".$codigo_libro."', fecha_prestamo='".$fecha_prestamo."', fecha_devolucion='".$fecha_devolucion."' where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        if($result>0){
            echo"Prestamo actualizado exitosamente.";
        }
    }
    else {
        echo"Error, no se pudo actualizar el prestamo.";
    }   
}
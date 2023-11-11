<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();
$codigo=$_POST['codigo'];
$nombre=$_POST['nombre'];
$telefono=$_POST['telefono'];
$direccion=$_POST['direccion'];

//Insertar
if(@$_POST['btnRegistrar']){
    $sql="insert into usuarios(codigo,nombre,telefono,direccion) values('".$codigo."','".$nombre."','".$telefono."','".$direccion."')";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if($numfila>0){
            echo "Usuario registrado exitosamente.";
        }
        else{
            echo "Error, no se pudo registrar el usuario.";
        }
    }
}

//Consultar
if (@$_POST['btnConsultar']){
    $sql="select codigo, nombre, telefono, direccion from usuarios where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        while ($row=$miconexion->ObtenerFilas($result)){
            header ("location: gestionar_usuario.php?codigo=".$row[0]."&nombre=".$row[1]."&telefono=".$row[2]."&direccion=".$row[3]);
        }
    }
    else {
        echo "Error, no se pudo consultar el usuario.";
    }
}


//Eliminar
if(@$_POST['btnEliminar']){
    $sql="delete from usuarios where codigo='".$codigo."'";
    $result =$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if ($numfila>0){
            echo "Usuario eliminado exitosamente.";
        }
        else {
            echo"Error, no se pudo eliminar el usuario.";
        }
    }
}

//Actualizar
if (@$_POST['btnActualizar']){
    $sql="update usuarios set nombre='".$nombre."', telefono='".$telefono."', direccion='".$direccion."' where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        if($result>0){
            echo"Usuario actualizado exitosamente.";
        }
    }
    else {
        echo"Error, no se pudo actualizar el usuario.";
    }   
}
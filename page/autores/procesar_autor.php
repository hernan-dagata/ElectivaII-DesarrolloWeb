<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();
$codigo=$_POST['codigo'];
$nombre=$_POST['nombre'];

//Insertar
if(@$_POST['btnRegistrar']){
    $sql="insert into autores(codigo,nombre) values('".$codigo."','".$nombre."')";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if($numfila>0){
            echo "Registro insertado en la base de datos.";
        }
        else{
            echo "Error al registrar. No se guardo en la base de datos.";
        }
    }
}

//Consultar
if (@$_POST['btnConsultar']){
    $sql="select codigo, nombre from autores where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        while ($row=$miconexion->ObtenerFilas($result)){
            header ("location: gestionar_autor.php?codigo=".$row[0]."&nombre=".$row[1]);
        }
    }
    else {
        echo "Error, libro no existe.";
    }
}


//Eliminar
if(@$_POST['btnEliminar']){
    $sql="delete from autores where codigo='".$codigo."'";
    $result =$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if ($numfila>0){
            echo " Eliminado exitosamente";
        }
        else {
            echo"<h2> Error, no se encontro que eliminar.</h2>";
        }
    }
}

//Actualizar
if (@$_POST['btnActualizar']){
    $sql="update autores set nombre='".$nombre."' where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        if($result>0){
            echo"Registro actualizado";
        }
    }
    else {
        echo"Error al actulizar, no se encontro registro.";
    }   
}
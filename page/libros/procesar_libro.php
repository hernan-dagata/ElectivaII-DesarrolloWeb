<?php
include('../../conexion.php');
$miconexion = new ConexionMysql();
$miconexion->CrearConexion();
$codigo=$_POST['codigo'];
$titulo=$_POST['titulo'];
$isbn=$_POST['isbn'];
$editorial=$_POST['editorial'];
$paginas=$_POST['paginas'];
$codigo_autor=$_POST['codigo_autor'];

//Insertar
if(@$_POST['btnRegistrar']){
    $sql="insert into libros(codigo,titulo,isbn,editorial,paginas,codigo_autor) values('".$codigo."','".$titulo."','".$isbn."','".$editorial."','".$paginas."','".$codigo_autor."')";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if($numfila>0){
            echo "Libro registrado exitosamente.";
        }
        else{
            echo "Error, no se pudo registrar el libro.";
        }
    }
}

//Consultar
if (@$_POST['btnConsultar']){
    $sql="select codigo, titulo, isbn, editorial, paginas, codigo_autor from libros where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        while ($row=$miconexion->ObtenerFilas($result)){
            header ("location: gestionar_libro.php?codigo=".$row[0]."&titulo=".$row[1]."&isbn=".$row[2]."&editorial=".$row[3]."&paginas=".$row[4]."&codigo_autor=".$row[5]);
        }
    }
    else {
        echo "Error, no se pudo consultar el libro.";
    }
}

//Eliminar
if(@$_POST['btnEliminar']){
    $sql="delete from libros where codigo='".$codigo."'";
    $result =$miconexion->EjecutarSQL($sql);
    if($result){
        $numfila=$miconexion->ObtenerFilasAfectadas();
        if ($numfila>0){
            echo "Libro eliminado exitosamente.";
        }
        else {
            echo"Error, no se pudo eliminar el libro.";
        }
    }
}

//Actualizar
if (@$_POST['btnActualizar']){
    $sql="update libros set titulo='".$titulo."', isbn='".$isbn."', editorial='".$editorial."', paginas='".$paginas."', codigo_autor='".$codigo_autor."' where codigo='".$codigo."'";
    $result=$miconexion->EjecutarSQL($sql);
    if($result){
        if($result>0){
            echo"Libro actualizado exitosamente.";
        }
    }
    else {
        echo"Error, no se pudo actualizar el libro.";
    }   
}
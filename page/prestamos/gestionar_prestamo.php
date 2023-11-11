<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Libros</title>
    </head>
    <body>
        <?php require_once('load.php'); ?>
        <h1>
            Libros
        </h1>
        <form action="procesar_prestamo.php" method="POST">
            <table>
                <tr>
                    <td>
                        Codigo:
                    </td>
                    <td>
                        <input type="text" name="codigo" value="<?php echo isset($_GET['codigo']) ? htmlspecialchars($_GET['codigo']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Usuario:
                    </td>
                    <td>
                        <select name="codigo_usuario">
                            <option value="">Seleccione un usuario</option>
                            <?php
                                while ($rowUsuario = $resultUsuarios->fetch_assoc()) {
                                    $codigoUsuario = $rowUsuario['codigo'];
                                    $nombreUsuario = $rowUsuario['nombre'];
                                    $selected = ($codigoUsuario == $codigo_usuario) ? 'selected' : '';
                                    echo "<option value='$codigoUsuario' $selected>$nombreUsuario</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Libro:
                    </td>
                    <td>
                        <select name="codigo_libro">
                            <option value="">Seleccione un libro</option>
                            <?php
                                while ($rowLibro = $resultLibros->fetch_assoc()) {
                                    $codigoLibro = $rowLibro['codigo'];
                                    $nombreLibro = $rowLibro['titulo'];
                                    $selected = ($codigoLibro == $codigo_libro) ? 'selected' : '';
                                    echo "<option value='$codigoLibro' $selected>$nombreLibro</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha prestamo:
                    </td>
                    <td>
                        <input type="date" name="fecha_prestamo" value="<?php echo isset($_GET['fecha_prestamo']) ? htmlspecialchars($_GET['fecha_prestamo']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Fecha devolución:
                    </td>
                    <td>
                        <input type="date" name="fecha_devolucion" value="<?php echo isset($_GET['fecha_devolucion']) ? htmlspecialchars($_GET['fecha_devolucion']) : ''; ?>">
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <input type="submit" name="btnRegistrar" value="Registrar">
            <input type="submit" name="btnConsultar" value="Consultar">
            <input type="submit" name="btnActualizar" value="Actualizar">
            <input type="submit" name="btnEliminar" value="Eliminar">
        </form>
    </body>
</html>
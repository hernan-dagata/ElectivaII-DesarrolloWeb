<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Libros</title>
    </head>
    <body>
        <?php require_once('load_autores.php'); ?>
        <h1>
            Libros
        </h1>
        <form action="procesar_libro.php" method="POST">
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
                        Titulo:
                    </td>
                    <td>
                        <input type="text" name="titulo" value="<?php echo isset($_GET['titulo']) ? htmlspecialchars($_GET['titulo']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        ISBN:
                    </td>
                    <td>
                        <input type="text" name="isbn" value="<?php echo isset($_GET['isbn']) ? htmlspecialchars($_GET['isbn']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Editorial:
                    </td>
                    <td>
                        <input type="text" name="editorial" value="<?php echo isset($_GET['editorial']) ? htmlspecialchars($_GET['editorial']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Paginas:
                    </td>
                    <td>
                        <input type="text" name="paginas" value="<?php echo isset($_GET['paginas']) ? htmlspecialchars($_GET['paginas']) : ''; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Código autor:
                    </td>
                    <td>
                        <select name="codigo_autor">
                            <option value="">Seleccione un autor</option>
                            <?php
                                while ($rowAutor = $resultAutores->fetch_assoc()) {
                                    $codigoAutor = $rowAutor['codigo'];
                                    $nombreAutor = $rowAutor['nombre'];
                                    $selected = ($codigoAutor == $codigo_autor) ? 'selected' : '';
                                    echo "<option value='$codigoAutor' $selected>$nombreAutor</option>";
                                }
                            ?>
                        </select>
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
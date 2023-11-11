<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Autores</title>
    </head>
    <body>
        <h1>
            Autores
        </h1>
        <form action="procesar_autor.php" method="POST">
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
                        Nombre:
                    </td>
                    <td>
                        <input type="text" name="nombre" value="<?php echo isset($_GET['nombre']) ? htmlspecialchars($_GET['nombre']) : ''; ?>">
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
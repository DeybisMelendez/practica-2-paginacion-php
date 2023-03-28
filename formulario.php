<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/visible-border.min.css">
    <title>Paginación</title>
</head>
<body class="gray-1-bg">

    <?php include_once("popup.php") ?>

    <div class="flex justify-center">
        <div class="s4 grid">
            
            <div class="s12">
                <h1 class="center-text">Lista de Usuarios</h1>
            </div>
            <div class="s12">
                <form action="" method="post" class="grid gap-1">
                    <p class="s6 center-text">
                        <label for="nombre">Ingrese un nombre</label>
                        <input type="text" name="nombre" id="nombre">
                    </p>
                    <p class="s6 center-text">
                        <label for="apellido">Ingrese un apellido</label>
                        <input type="text" name="apellido" id="apellido">
                    </p>
                    <div class="s12">
                        <input type="submit" value="Agregar" class="button teal-bg white">
                    </div>
                </form>
            </div>
            <div class="s12 flex">
                <table class="s12">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                    <!-- Insertar registros aquí-->
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nombre'] ?></td>
                            <td><?= $row['apellido'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
            <div class="s12 flex justify-center">
                <!-- Insertar paginación aquí-->
                <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                    <a href="?page=<?= $i ?>" class="link teal"><?= $i ?></a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</body>
</html>
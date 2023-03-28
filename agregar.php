<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Paginacion";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Verificar si se ha enviado un formulario por POST
$message;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    // Insertar los datos en la tabla
    $sql = "INSERT INTO lista (nombre, apellido) VALUES ('$nombre', '$apellido')";
    if (mysqli_query($conn, $sql)) {
        $message = "Los datos se han insertado correctamente en la base de datos.";
    } else {
        $message = "Error al insertar los datos en la base de datos: " . mysqli_error($conn);
    }
}

// Definir el número de registros por página
$limit = 10;

// Obtener el número total de registros en la tabla
$sql = "SELECT COUNT(*) AS total FROM lista";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
$total_rows = $data['total'];

// Calcular el número total de páginas
$total_pages = ceil($total_rows / $limit);

// Obtener el número de página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcular el índice del primer registro de la página actual
$start = ($page - 1) * $limit;

// Obtener los registros de la tabla para la página actual
$sql = "SELECT * FROM lista LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);

// Incluir el formulario para mostrar los registros y paginación.
include_once("formulario.php");

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
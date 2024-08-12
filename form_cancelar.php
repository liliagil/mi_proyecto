<?php
session_start();
include 'db.php';


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    
    header("location: login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha_cita = $_POST['fecha_cita'];
    $hora_cita = $_POST['hora_cita'];
    $descripcion_cita = $_POST['codigo_usu'];
    
    
    $sql = "INSERT INTO citas (id_usuario, fecha, hora, codigo_usu) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_SESSION['id'], $fecha_cita, $hora_cita, $codigo_usu);
    
    if ($stmt->execute()) {
        
        header("location: cita_confirmada.php");
        exit;
    } else {
        echo "Error al agendar la cita. Por favor, inténtelo de nuevo.";
    }
}

include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" type="text/css" href="cita_confirmada.css"> 
</head>
<body>

<div class="container">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h1>
    <p>
        <a href="logout.php">Cerrar sesión</a>
    </p>

    <h2>Agendar cita</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="fecha_cita">Fecha de la cita:</label>
            <input type="date" id="fecha_cita" name="fecha_cita" required>
        </div>
        <div>
            <label for="hora_cita">Hora de la cita:</label>
            <input type="time" id="hora_cita" name="hora_cita" required>
        </div>
        <div>
            <label for="codigo_usu">Codigo usuario Alcanos:</label>
            <input id="codigo_usu" name="codigo_usu"  required></input>
        </div>
        <div>
            <input type="submit" value="Agendar cita">
        </div>
    </form>
</div>

<?php
include 'templates/footer.php';
?>

</body>
</html>

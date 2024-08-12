<?php
session_start();
include 'db.php';
 
 

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $fecha_cita = $_POST['fecha'];  
    $hora_cita = $_POST['hora'];  
    $codigo_usu = $_POST['codigo_usu'];  

   
    if (!isset($_SESSION['id'])) {  
        die("Error: ID de usuario no está disponible.");  
    }  

    
    $sql = "INSERT INTO citas (id_usuario, fecha, hora, codigo_usu) VALUES (?, ?, ?, ?)";  
    $stmt = $conn->prepare($sql);  
    
    
    if (!$stmt) {  
        die("Error en la preparación de la consulta: " . $conn->error);  
    }  
    
    
    $id_usuario = $_SESSION['id'];  
    
      
    $stmt->bind_param("isss", $id_usuario, $fecha_cita, $hora_cita, $codigo_usu);  
    
    
    if ($stmt->execute()) {  
        echo "Cita agendada exitosamente.";  
    } else {  
        echo "Error al agendar la cita: " . $stmt->error;  
    }  
    
    
    $stmt->close();  
}  

$conn->close();  




include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Cita</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" type="text/css" href="welcome_styles.css"> 
</head>
<body>

<div class="container">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h1>
    

    <h2>Agendar cita</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="fecha">Fecha de la cita:</label>
            <input type="date" id="fecha" name="fecha" required>
        </div>
        <div>
            <label for="hora">Hora de la cita:</label>
            <input type="time" id="hora" name="hora" required>
        </div>
        <div>
            <label for="codigo_usu">Codigo usuario Alcanos:</label>
            <input id="codigo_usu" name="codigo_usu"  required></input>
        </div>
        <div>
            <input type="submit" value="Agendar cita">
            <p>
        <a href="logout.php"><h3>Cerrar sesión</h3></a>
    </p>
        </div>
    </form>
</div>

<?php
include 'templates/footer.php';
?>

</body>
</html>

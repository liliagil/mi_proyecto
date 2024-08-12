<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    
    
    $sql = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        
        header("location: index.php");
        exit;
    } else {
        
        $stmt->close();

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, nombre) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $hashed_password, $nombre);

        if ($stmt->execute()) {
            
            header("location: login.php");
            exit;
        } else {
            
            echo "Ocurrió un error. Por favor, inténtelo de nuevo.";
        }

        $stmt->close();
    }
}

include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="register_styles.css">
</head>
<body>
<div class="register-container">
    <h1>Registro</h1>
    <?php include 'templates/register_form.php'; ?>
</div>

</body>
</html>


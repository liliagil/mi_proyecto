<?php
session_start();
include 'db.php'; 

if (isset($conn)) { 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM administrador WHERE username = ? AND nombre = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username,$password);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $username, $hashed_password);
            if ($stmt->fetch() && password_verify($password, $hashed_password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
               
                header("location: admin.php");
                exit;
            } else {
                echo "<p><h1>Contraseña incorrecta.</h1></p>";
            }
        } else {
            header("location: login_admin.php");
            exit;
        }
        $stmt->close();
    }
    $conn->close(); 
} else {
    die("No se ha establecido una conexión con la base de datos.");
}

include 'templates/header.php';
include 'templates/login_form.php';
?>


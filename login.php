<?php
session_start();
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password, nombre FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashed_password, $nombre);
        if ($stmt->fetch() && password_verify($password, $hashed_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
           
            header("location: welcome.php");
            exit;
        } else {
            echo "<p><h1>Contraseña incorrecta.</h1></p>";
        }
    } else {
        header("location: register.php");
        exit;
    }

    $stmt->close();
}
$conn->close();

include 'templates/header.php';
include 'templates/login_form.php';

?>

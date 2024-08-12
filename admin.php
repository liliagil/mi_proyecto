<?php
session_start();
include 'db.php';

if (!isset($_SESSION[ADMIN_LOGGEDIN]) || $_SESSION[ADMIN_LOGGEDIN] !== true) {
    header("location: login_admin.php");
    exit;
}


echo "Bienvenido, " . $_SESSION[ADMIN_USERNAME];






if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_id'])) {
       
        $delete_id = $_POST['delete_id'];
        $sql = "DELETE FROM citas WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);
        $stmt->execute();
        $stmt->close();
    }
}


$sql = "SELECT citas.id, citas.fecha, citas.hora, citas.codigo_usu, users.nombre FROM citas JOIN users ON citas.id_usuario = users.id";
$result = $conn->query($sql);

include 'templates/header.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="styles.css"> 
    <link rel="stylesheet" type="text/css" href="admin_styles.css"> 
    
        </div>
</head>
<body>

<div class="container">
    <h1>Panel de Administrador</h1>
    <p>
        <a href="logout.php">Cerrar sesión</a>
    </p>

    <h2>Citas Agendadas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Codigo usuario Alcanos</th>
            <th>Usuario</th>
            
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['fecha']); ?></td>
            <td><?php echo htmlspecialchars($row['hora']); ?></td>
            <td><?php echo htmlspecialchars($row['descripcion']); ?></td>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php
include 'templates/footer.php';
$conn->close();
?>

</body>
</html>


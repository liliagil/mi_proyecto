<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Inicio de Sesión Administrador</title>  
    <link rel="stylesheet" href="styles.css">  
    <link rel="stylesheet" type="text/css" href="login_admin_styles.css">  
    
</head>  
<body>  
    <?php include 'templates/header.php'; ?>  
    <div class="container">  
        <h1>Inicio de Sesión Administrador</h1>  
        <form action="login_admin_process.php" method="post">  
        <div class="login-container ">
    <div class="logo">
        <img src="imagenes/logopyg.png" alt="Logo">
    </div>
            <div class="form-group">  
                <label for="username">Usuario:</label>  
                <input type="text" id="username" name="username" required>  
            </div>  
            
            <div class="form-group">  
                <label for="password">Contraseña:</label>  
                <input type="password" id="password" name="password" required>  
            </div>  
            <div class="form-group">  
                <input type="submit" value="Iniciar sesión">  
                <p><a class="return-link" href="index.php">Regresar a la página de inicio</a></p>  

                <?php  
                if (isset($_GET['error'])) {  
                    echo '<p style="color:red; font-size:18px">' . htmlspecialchars($_GET['error']) . '</p>';  
                }  
                ?>  
            </div>  
        </form>  
    </div>  
</body>  
</html>
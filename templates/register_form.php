<form action="register.php" method="post" class="register-form">
<div class="register-container">
    <div class="logo">
        <img src="imagenes/logopyg.png" alt="Logo">
    
        <div class="form-group">
            
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
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
        <input type="submit" value="Registrarse">
        
    <p><a class="return-link" href="index.php">
        <h4>Regresar a la página de inicio</h4></a></p>
    </div>
</form>

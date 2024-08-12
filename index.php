<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Inicio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'templates/header.php'; ?>
    <nav class="navbar">
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="#">Nosotros</a>
                <ul class="dropdown">
                    <li><a href="mision.php">Misión</a></li>
                    <li><a href="vision.php">Visión</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">Cuenta</a>
                <ul class="dropdown">
                    <li><a href="register.php">Registro</a></li>
                    <li><a href="login.php">Inicio de Sesión</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="login_admin.php">Administrador</a>
            </li>
        </ul>
    </nav>
    <main>
        <h1>Bienvenido a Nuestra Página</h1>
        <div class="slider">
            <input type="radio" name="slider" id="slide1" checked>
            <input type="radio" name="slider" id="slide2">
            <input type="radio" name="slider" id="slide3">
            <div class="slides">
                <div class="slide">
                    <img src="secuencia/images.jpeg" alt="Imagen 1">
                </div>
                <div class="slide">
                    <img src="secuencia/descarga.jpeg" alt="Imagen 2">
                </div>
                <div class="slide">
                    <img src="secuencia/descarga (1).jpeg" alt="Imagen 3">
                </div>
            </div>
            <div class="navigation">
                <label for="slide1" aria-label="Slide 1"></label>
                <label for="slide2" aria-label="Slide 2"></label>
                <label for="slide3" aria-label="Slide 3"></label>
            </div>
        </div>
        <div class="contenido">
            <h3>En Cronogas P&G brindamos soluciones técnicas de servicio de gas domiciliarios para hogar y comercio.</h3>
            <h3>En Cronogas proporciona servicio técnico en la revisión de gas domiciliario, construcción de internas y derivados de las internas.</h3>
        </div>
    </main>
    <?php include 'templates/footer.php'; ?>
    <script>
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
        function showNextSlide() {
            currentIndex = (currentIndex + 1) % totalSlides;
            document.getElementById(`slide${currentIndex + 1}`).checked = true;
        }
        setInterval(showNextSlide, 3000);
    </script>
</body>
</html>

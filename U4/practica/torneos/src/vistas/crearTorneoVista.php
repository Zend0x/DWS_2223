<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/crearTorneo.css">
    <title>Document</title>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }
    ?>
</head>
<body>
    <div class="contenedorGeneral">
        <div class="topPage">
            <h1 id="textoPrincipal">Creación de un nuevo torneo</h1>
            <div class="welcome">
                <?php 
                    echo "Bienvenido, ".$_SESSION['username']; 
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);

                    require("../negocio/torneosReglasNegocio.php");

                    $torneosBL = new TorneosReglasNegocio();
                    $datosTorneos = $torneosBL->obtener();
                ?>
                <a href="logout.php"> Cerrar sesión </a><br>
            </div>
        </div>
        <div class="formularioDatosTorneo">
            <form action="insertar.php" method="post">
                <label for="nombreTorneo">Nombre torneo:</label><br>
                <input type="text" name="nombreTorneo"><br>
                <label for="fechaTorneo">Fecha torneo:</label><br>
                <input type="date" name="fechaTorneo"><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
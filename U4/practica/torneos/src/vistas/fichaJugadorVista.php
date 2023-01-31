<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fichaJugador.css">
    <title>Ficha del jugador</title>
    <?php
        require ("../negocio/jugadorReglasNegocio.php");
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }
    ?>
</head>
<body>
    <div class="contenedor"> 
        <div class="topPage">
            <h1 id="textoPrincipal">Ficha de <?php echo $_GET['id'] ?></h1>
            <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
            <div class="welcome">
                <?php
                    require("../negocio/jugadorReglasNegocio.php");
                    echo "Bienvenido, ".$_SESSION['username']; 
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);
                    
                    $jugadorBL=new JugadorReglasNegocio();
                    $datosJugador=$jugadorBL->obtener($_GET['id']);
                    var_dump($datosJugador);
                ?>
                <a href="logout.php"> Cerrar sesión </a><br>
            </div>
        </div>
    </div>
</body>
</html>
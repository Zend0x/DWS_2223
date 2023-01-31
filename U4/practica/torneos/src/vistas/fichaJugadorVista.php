<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fichaJugador.css">
    <title>Ficha del jugador</title>
</head>
<body>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }
        require_once("../negocio/jugadorReglasNegocio.php");
    ?>
    <div class="contenedor"> 
        <div class="topPage">
            <h1 id="textoPrincipal">Ficha de <?php echo $_GET['id'] ?></h1>
            <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
            <div class="welcome">
                <?php
                    echo "Bienvenido, ".$_SESSION['username']; 
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);
                ?>
                <a href="logout.php">Cerrar sesión</a><br>
            </div>
        </div>
        <div class="fichaJugador">
            <?php
                $jugadorBL=new JugadorReglasNegocio();
                $datosJugador=$jugadorBL->obtener($_GET['id']);
            ?>
            <h3>Ficha de <?php echo $datosJugador[0]->getNombre().' '.$datosJugador[0]->getApellidos(); ?></h3>
            <p class="izquierda">Total de partidos jugados:</p><p class="derecha">X</p><br>
            <p class="izquierda">Partidos ganados:</p><p class="derecha">X</p><br>
            <p class="izquierda">Porcentaje victorias:</p><p class="derecha">X</p><br>
            <p class="izquierda">Torneos disputados:</p><p class="derecha">X</p><br>
            <p class="izquierda">Torneos ganados:</p><p class="derecha">X</p><br>
        </div>
    </div>
</body>
</html>
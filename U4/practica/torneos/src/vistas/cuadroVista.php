<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bracket.css">
    <title>Cuadro del torneo</title>
</head>
<body>
    <?php
        require ("../negocio/partidoReglasNegocio.php");
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }
    ?>
    <div class="contenedor"> 
        <div class="topPage">
            <h1 id="textoPrincipal">Cuadro del torneo <?php echo $_GET['torneo'] ?></h1>
            <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
            <div class="welcome">
                <?php 
                    echo "Bienvenido, ".$_SESSION['username']; 
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);


                    $partidoBL = new PartidoReglasNegocio();
                    $datosPartidos = $partidoBL->obtener($_GET['torneo']);
                ?>
                <a href="logout.php"> Cerrar sesión </a><br>
            </div>
        </div>
        <div class="cuadroTorneo">
            <main id="tournament">
                <ul class="round ronda1">
                    <?php
                        for($i=0;$i<4;$i++){
                            echo '<li class="spacer">&nbsp;</li>        
                            <li class="game game-top"><a class="nombreJugador" href="fichaJugadorVista.php?id='.$datosPartidos[$i]->getJugadorA().'&torneo='.$_GET['torneo'].'">'.$datosPartidos[$i]->getNombreJugadorA().'</a></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom"><a class="nombreJugador" href="fichaJugadorVista.php?id='.$datosPartidos[$i]->getJugadorB().'&torneo='.$_GET['torneo'].'">'.$datosPartidos[$i]->getNombreJugadorB().'</a></li>';
                        }
                    ?>
                    <li class="spacer">&nbsp;</li>
                </ul>
                <ul class="round ronda2">
                    <?php 
                    for($i=0;$i<2;$i++){
                        echo '<li class="spacer">&nbsp;</li>
                            <li class="game game-top">Jugador1</li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom">Jugador 3</li>';
                    }
                    ?>
                    <li class="spacer">&nbsp;</li>
                </ul>
                <ul class="round ronda3">
                    <li class="spacer">&nbsp;</li>
                    <li class="game game-top">Jugadro1</li>
                    <li class="game game-spacer">&nbsp;</li>
                    <li class="game game-bottom ">Jugador5</li>
                    <li class="spacer">&nbsp;</li>
                </ul>   
                <ul class="round">
                    <li class="game game-top winner">Ganador</li>
                </ul> 
            </main>
        </div>
    </div>
</body>
</html>
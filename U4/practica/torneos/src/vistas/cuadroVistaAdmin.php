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
            <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a><br>
            <a href="gestionTorneosVista.php?torneo=<?php echo $_GET['torneo'] ?>" class="centradoAbajo">Editar torneo</a>
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
                        foreach($datosPartidos as $partidos){
                            if($partidos->getRondaTorneo()=="cuartos"){
                                echo '<li class="spacer">&nbsp;</li>        
                                <li class="game game-top"><a class="nombreJugador" href="fichaJugadorVista.php?id='.$partidos->getJugadorA().'&torneo='.$_GET['torneo'].'">'.$partidos->getNombreJugadorA().'</a><a class="botonEditar" href="gestionTorneosVista.php?torneo='.$_GET['torneo'].'">Editar</a></li>
                                <li class="game game-spacer">&nbsp;</li>
                                <li class="game game-bottom"><a class="nombreJugador" href="fichaJugadorVista.php?id='.$partidos->getJugadorB().'&torneo='.$_GET['torneo'].'">'.$partidos->getNombreJugadorB().'</a></li>';
                            } 
                        }
                    ?>
                    <li class="spacer">&nbsp;</li>
                </ul>
                <ul class="round ronda2">
                    <?php 
                    foreach($datosPartidos as $partidos){
                        if($partidos->getRondaTorneo()=="semis"&&$partidos->getJugadorA()!="null"){
                            echo '<li class="spacer">&nbsp;</li>
                            <li class="game game-top"><a href="fichaJugadorVista.php?id='.$partidos->getJugadorA().'&torneo='.$_GET['torneo'].'">'.$partidos->getNombreJugadorA().'<a class="botonEditar" href="gestionTorneosVista.php?torneo='.$_GET['torneo'].'">Editar</a></li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom"><a href="fichaJugadorvista.php?id='.$partidos->getJugadorB().'&torneo='.$_GET['torneo'].'">'.$partidos->getNombreJugadorB().'</a></li>';
                        }else if($partidos->getJugadorA()=="null"||$partidos->getJugadorB()=="null"){
                            echo '<li class="spacer">&nbsp;</li>
                            <li class="game game-top">Ganador 1</li>
                            <li class="game game-spacer">&nbsp;</li>
                            <li class="game game-bottom">Ganador 2</li>';
                        }
                    }
                    ?>
                    <li class="spacer">&nbsp;</li>
                </ul>
                <ul class="round ronda3">
                    <?php
                    //ToDo cambiar el bracket + revisar condiciones de imprimir de la DB o hardcodeado
                        foreach($datosPartidos as $partidos){
                            if($partidos->getRondaTorneo()=="final"){
                                echo '<li class="spacer">&nbsp;</li>
                                <li class="game game-top">'.$partidos->getNombreJugadorA().'</li>
                                <li class="game game-spacer">&nbsp;</li>
                                <li class="game game-bottom ">'.$partidos->getNombreJugadorB().'</li>
                                <li class="spacer">&nbsp;</li>';
                            }
                        }
                    ?>
                    
                </ul>   
                <ul class="round">
                    <?php
                        foreach($datosPartidos as $partidos){
                            if($partidos->getRondaTorneo()=="final"&&null!==($partidos->getGanador())){
                                echo '<li class="game game-top winner">'.$partidos->getNombreGanador().'</li>';
                            }
                        }
                    ?>
                </ul> 
            </main>
        </div>
    </div>
</body>
</html>
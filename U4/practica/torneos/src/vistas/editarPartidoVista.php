<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/editarPartido.css">
    <title>Edición de un partido</title>
</head>
<body>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }else if($_SESSION['userType']!="admin"){
            header("Location: cuadroVista.php");
        }
    ?>
    <div class="contenedor">
            <div class="topPage">
                <h1 id="textoPrincipal">Edición del torneo</h1>
                <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
                <div class="welcome">
                    <?php
                        echo "Bienvenido, " . $_SESSION['username'];
                        ini_set('display_errors', 1);
                        ini_set('html_errors', 1);

                        require("../negocio/partidoReglasNegocio.php");
                        $partidoBL = new PartidoReglasNegocio();
                        $partidos=$partidoBL->obtener($_GET['torneo']);
                        
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                            $partidoBL->actualizarPartido($_POST['id_partido'],$_POST['ganador']);
                            header("Location: gestionTorneosVista.php?torneo=".$_POST['id_torneo']);
                        }
                    ?>
                    <a href="logout.php"> Cerrar sesión </a><br>
                </div>
            </div>
            <div class="formulario">
                <form action="editarPartidoVista.php" method="post">
                    <label for="jugadorA">Jugador A</label><br>
                    <input type="text" name="jugadorA" id="jugadorA" disabled placeholder="<?php echo $partidos[intval($_GET['partido'])-1]->getNombreJugadorA() ?>"><br>
                    <label for="jugadorB">Jugador B</label><br>
                    <input type="text" name="jugadorB" id="jugadorB" disabled placeholder="<?php echo $partidos[intval($_GET['partido'])-1]->getNombreJugadorB()?>"><br><br>
                    <label for="ganador">Ganador</label><br>
                    <select name="ganador" id="ganador">
                        <option value="<?php echo $partidos[intval($_GET['partido'])-1]->getJugadorA()?>">
                            <?php echo $partidos[intval($_GET['partido'])-1]->getNombreJugadorA()?>
                        </option>
                        <option value="<?php echo $partidos[intval($_GET['partido'])-1]->getJugadorB()?>">
                            <?php echo $partidos[intval($_GET['partido'])-1]->getNombreJugadorB()?>
                        </option>
                    </select><br><br>
                    <input type="hidden" name="id_partido" value="<?php echo $_GET['partido']?>">
                    <input type="hidden" name="id_torneo" value="<?php echo $_GET['torneo'] ?>">
                    <input type="submit" value="Enviar">
                </form>
            </div>
    </div>
</body>
</html>
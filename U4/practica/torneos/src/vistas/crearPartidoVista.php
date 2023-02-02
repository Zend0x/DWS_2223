<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/crearPartido.css">
    <title>Crear un nuevo partido</title>
</head>
<body>
    <?php
        require("../negocio/partidoReglasNegocio.php");
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }else if($_SESSION['userType']!="admin"){
            header("Location: cuadroVista.php");
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            echo "hola";
            $partidoBL=new PartidoReglasNegocio();
            $partidoBL->insertar($_POST['id_torneo'],$_POST['jugadorA'],$_POST['jugadorB'],$_POST['rondaTorneo']);

            header("Location: torneosVistaAdmin.php");
        }
    ?>
    <div class="contenedor">
            <div class="topPage">
                <h1 id="textoPrincipal">Creación de un nuevo partido</h1>
                <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
                <div class="welcome">
                    <?php
                        echo "Bienvenido, " . $_SESSION['username'];
                        ini_set('display_errors', 1);
                        ini_set('html_errors', 1);

                        if(isset($_GET['torneo'])){
                            $partidoBL = new PartidoReglasNegocio();
                            $datosPartidos=$partidoBL->obtener($_GET['torneo']);
                        }else{
                            $partidoBL=new PartidoReglasNegocio();
                            $datosPartidos=$partidoBL->obtener($_POST['id_torneo']);
                        }
                    ?>
                    <a href="logout.php"> Cerrar sesión </a><br>
                </div>
            </div>
            <div class="formularioPartido">
                <form action="crearPartidoVista.php" method="post">
                    <label for="rondaTorneo">Ronda</label><br>
                    <select name="rondaTorneo" id="rondaTorneo">
                        <option value="cuartos">Cuartos</option>
                        <option value="semis">Semifinal</option>
                        <option value="final">Final</option>
                    </select><br>
                    <label for="jugadorA">Jugador A</label><br>
                    <select name="jugadorA" id="jugadorA">
                        <?php
                            foreach ($datosPartidos as $partido) {
                                echo "<option value=".$partido->getJugadorA().">".$partido->getNombreJugadorA()."</option>";
                            }
                        ?>
                    </select><br>
                    <label for="jugadorB">Jugador B</label><br>
                    <select name="jugadorB" id="jugadorB">
                        <?php
                            foreach ($datosPartidos as $partido) {
                                echo "<option value=".$partido->getJugadorB().">".$partido->getNombreJugadorB()."</option>";
                            }
                        ?>
                    </select><br>
                    <input type="hidden" name="id_torneo" value=<?php echo $_GET['torneo']?>>
                    <button type="submit">Enviar</button>
                </form>
            </div>
    </div>
</body>
</html>
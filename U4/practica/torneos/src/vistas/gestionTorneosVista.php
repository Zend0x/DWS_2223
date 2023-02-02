<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/gestionTorneos.css">
    <title>Editar partido</title>
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
            <h1 id="textoPrincipal">Edición del partido <?php echo $_GET['partido'] ?></h1>
            <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
            <div class="welcome">
                <?php
                    echo "Bienvenido, " . $_SESSION['username'];
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);

                    require("../negocio/partidoReglasNegocio.php");
                    $partidoBL = new PartidoReglasNegocio();
                    $datosPartidos = $partidoBL->obtener($_GET['torneo']);
                ?>
                <a href="logout.php"> Cerrar sesión </a><br>
            </div>
        </div>
        <table class="tablaTorneos">
            <caption id="crearPartido"><a id="crearPartido" href="crearPartidoVista.php">Crear partido</a></caption>
            <tr>
                <th>ID</th>
                <th>Jugador A</th>
                <th>Jugador B</th>
                <th>Ronda</th>
                <th>Ganador</th>
                <th colspan=2> </th>
            </tr>
            <?php
                foreach ($datosPartidos as $partido)
                {
                    echo "<tr>";
                        echo "<td id='columnaID'>".$partido->getID()."</td>";
                        echo "<td id='nombreJugadorA'>".$partido->getNombreJugadorA()."</td>";
                        echo "<td id='nombreJugadorB'>".$partido->getNombreJugadorB()."</td>";
                        echo "<td id='rondaTorneo'>".ucfirst($partido->getRondaTorneo())."</td>";
                        echo "<td id='ganadorPartido'>".$partido->getNombreGanador();"</td>";
                        echo "<td id='editar'><a href='editarTorneosVista.php'>Editar</a></td>";
                        echo "<td id='borrar'><a href='borrarTorneo.php?torneo=".$partido->getID()."'>Borrar</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>

</html>
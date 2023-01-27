<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../../css/vistaTorneos.css">
</head>

<body>
    <?php
        session_start(); // reanudamos la sesión
        if (!isset($_SESSION['username']))
        {
            header("Location: loginVista.php");
        }
    ?>

    <div class="contenedorGeneral">
        <div class="topPage">
            <h1 id="textoPrincipal">Listado de torneos (admin ver)</h1>
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
        <table class="tablaTorneos">
            <caption id="crearTorneo"><a href="crearTorneoVista.php">Crear torneo</a></caption>
            <caption id="cantidadTorneos">Cantidad de torneos: <?php echo count($datosTorneos); ?></caption>
            <tr>
                <th>ID</th>
                <th>Nombre del torneo</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Campeón</th>
                <th colspan=2> </th>
            </tr>
            <?php
                foreach ($datosTorneos as $torneo)
                {
                    echo "<tr>";
                    echo "<td>".$torneo->getID()."</td>";
                    echo "<td>".$torneo->getNombre()."</td>";
                    echo "<td>".$torneo->getFecha()."</td>";
                    echo "<td>".ucfirst($torneo->getEstado())."</td>";
                    echo "<td>".ucfirst($torneo->getGanador())."</td>";
                    echo "<td><a href='editarTorneosVista.php'>Editar</a></td>";
                    echo "<td>Borrar</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>

</html>
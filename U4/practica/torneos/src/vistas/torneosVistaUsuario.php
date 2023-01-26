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


    <h1> Listado de torneos (user ver)</h1>
    <?php echo "Bienvenido: ".$_SESSION['username']; ?>
    <br>
    <a href="logout.php"> Cerrar sesión </a>

    <table class="tablaTorneos">
        <tr>
            <th>ID</th>
            <th>Nombre del torneo</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Campeón</th>
        </tr>
        <?php
            require("../Negocio/torneosReglasNegocio.php");

            $torneosBL = new TorneosReglasNegocio();
            $datosTorneos = $torneosBL->obtener();
            
            foreach ($datosTorneos as $torneo)
            {
                echo "<tr>";
                echo "<td>".$torneo->getID()."</td>";
                echo "<td>".$torneo->getNombre()."</td>";
                echo "<td>".$torneo->getFecha()."</td>";
                echo "<td>".ucfirst($torneo->getEstado())."</td>";
                echo "<td>".ucfirst($torneo->getGanador())."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>

</html>
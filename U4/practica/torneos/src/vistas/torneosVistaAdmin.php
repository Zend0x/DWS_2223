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
        }else if($_SESSION['userType']!="admin"){
            header("Location: torneosVistaUsuario.php");
        }else if($_SESSION['userType']!="admin"){
            header("Location: cuadroVista.php");
        }
    ?>

    <div class="contenedorGeneral">
        <div class="topPage">
            <h2 id="textoPrincipal">Listado de torneos para administradores</h2>
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
            <caption id="crearTorneo"><a id="crearTorneo" href="crearTorneoVista.php">Crear torneo</a></caption>
            <caption id="cantidadTorneos">Cantidad de torneos: <?php echo count($datosTorneos);?></caption>
            <tr>
                <th>ID</th>
                <th>Nombre del torneo</th>
                <th>Fecha</th>
                <th>Campeón</th>
                <th colspan=2> </th>
            </tr>
            <?php
                foreach ($datosTorneos as $torneo)
                {
                    echo "<tr>";
                    echo "<td id='columnaID'>".$torneo->getID()."</td>";
                    echo "<td id='nombreTorneo'><a id='textoNombre' href='cuadroVistaAdmin.php?torneo=".$torneo->getID()."'>".$torneo->getNombre()."</a></td>";
                    echo "<td id='columnaFecha'>".$torneo->getFecha()."</td>";
                    echo "<td id='columnaGanador'>".ucfirst($torneo->getGanador())."</td>";
                    echo "<td><a href='gestionTorneosVista.php?torneo=".$torneo->getID()."'>Editar</a></td>";
                    echo "<td><a href='borrarTorneo.php?torneo=".$torneo->getID()."'>Borrar</a></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>

</html>
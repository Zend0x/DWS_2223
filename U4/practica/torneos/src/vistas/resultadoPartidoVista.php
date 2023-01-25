<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../../css/resultadoPartidos.css">
</head>

    <body>
        <?php
            session_start(); // reanudamos la sesión
            if (!isset($_SESSION['username']))
            {
                header("Location: loginVista.php");
            }
        ?>
        <?php
            ini_set('display_errors', 1);
            ini_set('html_errors', 1);
            require("../negocio/resultadoPartidoReglasNegocio.php");

            $rnPartido = new ResultadoPartidoReglasNegocio();
            $datosPartido = $rnPartido->obtener();
        ?>
        <div class="contenedor">
                <?php
                    foreach ($datosPartido as $partido){
                        echo "<div class='resultadoPartido'>";
                        echo "<h3 id='tituloPartido'>Resultado del partido ".$partido->getID()."</h3>";
                        echo "<p class='textoPartido'>Partido ".$partido->getID()."<br>"," Jugador 1: ",$partido->getJugadorA(),"<br> Jugador 2: ",$partido->getJugadorB()."<br>Ganador: ",$partido->getGanador()."</p>";
                        echo "</div>";
                    }
                ?>
        </div>
    </body>

</html> 
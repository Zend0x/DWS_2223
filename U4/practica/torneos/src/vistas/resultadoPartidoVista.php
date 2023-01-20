<!doctype html>
<html>
<head>

</head>

    <body>
        <h1>Resultado partidos</h1>
        <?php
            ini_set('display_errors', 1);
            ini_set('html_errors', 1);
            require("../negocio/partidoReglasNegocio.php");

            $rnPartido = new PartidoReglasNegocio();
            $datosPartido = $rnPartido->obtener();
            
            foreach ($datosPartido as $partido){
                echo "<div>";
                echo "Partido: <br>"," Jugador 1: ",$partido->getJugadorA(),"<br> Jugador 2: ",$partido->getJugadorB()."<br>Ganador: ",$partido->getGanador();
                echo "</div>";
            }
        ?>
    </body>

</html> 
<!doctype html>
<html>
<head>

</head>

    <body>
        <h1> Listado de torneos </h1>
        <?php
            ini_set('display_errors', 1);
            ini_set('html_errors', 1);
            require("../negocio/torneoReglasNegocio.php");

            $vnTorneo = new TorneoReglasNegocio();
            $datosTorneos = $vnTorneo->obtener();
            
            foreach ($datosTorneos as $torneo){
                echo "<div>";
                echo $torneo->getID(),": ",$torneo->getNombre().". Día: ",$torneo->getFecha();
                echo "</div>";
            }
        ?>
    </body>

</html> 
<!doctype html>
<html>
<head>
    
</head>

    <body>
        <h1> Listado de torneos </h1>
        <?php
            require("../vistas/torneoReglasNegocio.php");

            $torneosBL = new TorneoReglasNegocio();
            $datosTorneos = $torneosBL->obtener();
            
            foreach ($datosTorneos as $torneo)
            {
                echo "<div>";
                print($torneo->getID());
                echo "</div>";
            }
        ?>
    </body>

</html> 
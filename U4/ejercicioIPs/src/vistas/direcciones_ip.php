<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Direcciones IP</title>
</head>
<body>
    <div class="contenedor">
        <div class="ipValidas">

        </div>
        <div class="ipNoValidas">
            <?php
                ini_set('display_errors', 1);
                ini_set('html_errors', 1);

                require("../negocio/ipReglasNegocio.php");
                $ipDAL=new ipReglasNegocio();
                $listadoIPsBloqueadas=$ipDAL->obtenerDireccionesIpBloquedas();
                foreach ($listadoIPsBloqueadas as $ipBloqueada){
                    echo $ipBloqueada->getIP();
                    echo "<br>";
                    echo $ipBloqueada->limpiarIps();
                }
            ?>
        </div>
    </div>
</body>
</html>
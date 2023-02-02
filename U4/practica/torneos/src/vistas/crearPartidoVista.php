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
                <h1 id="textoPrincipal">Creación de un nuevo partido</h1>
                <a class="centrado" href="torneosVistaAdmin.php">Volver al inicio</a>
                <div class="welcome">
                    <?php
                        echo "Bienvenido, " . $_SESSION['username'];
                        ini_set('display_errors', 1);
                        ini_set('html_errors', 1);

                        require("../negocio/partidoReglasNegocio.php");
                        $partidoBL = new PartidoReglasNegocio();
                    ?>
                    <a href="logout.php"> Cerrar sesión </a><br>
                </div>
            </div>
            <div class="formularioPartido">
                <form action="crearPartidoVista.php" method="post">
                    <label for="rondaPartido">Ronda</label><br>
                    <select name="rondaPartido" id="rondaPartido">
                        <option value="cuartos">Cuartos</option>
                        <option value="semis">Semifinal</option>
                        <option value="final">Final</option>
                    </select><br>
                    <label for="jugadorA">Jugador A</label><br>
                    <input type="text" name="jugadorA" id="jugadorA"><br>
                    <label for="jugadorB">Jugador B</label><br>
                    <input type="text" name="jugadorB" id="jugadorB"><br>
                    <button type="submit">Enviar</button>
                </form>
            </div>
    </div>
</body>
</html>
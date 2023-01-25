<!doctype html>
<html>
<head>

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

    <?php
        require("../Negocio/torneosReglasNegocio.php");

        $torneosBL = new TorneosReglasNegocio();
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
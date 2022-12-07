<html>
<head>
    <title>Primera página de PHP</title>
    <link rel="stylesheet" href="chad.css">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">
                <h1>Panel de control de ejercicios</h1>
                <ol>
                    <li><a href="pagina2.php">Segunda página</a></li>
                    <li><a href="pagina3.php">Tercera página</a></li>
                    <li><a href="pagina5.php">Quinta página</a></li>
                    <li><a href="pagina6.php">Sexta página</a></li>
                </ol>
            </div>
            <div class="segunda_columna">
                <?php
                    $numero_entero=5;
                    $numero_float=6.5;
                    $cadena="Adis Abebba";

                    echo gettype($numero_entero).": ".$numero_entero . "<b>" . "<br>";
                    echo gettype($numero_float).": ".$numero_float . "<b>" . "<br>";
                    echo gettype($cadena).": ".$cadena . "<b>" . "<br>";
                ?>
            </div>

        </div>

        <div class="tercera_caja">

        </div>
    <div>
</body>
</html>


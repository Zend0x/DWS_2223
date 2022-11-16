<html>
<head>
    <title>Primera página de PHP</title>
    <link rel="stylesheet" href="barbados.css">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">
                <h1>Panel de control de ejercicios</h1>
                <ol>
                    <li><a href="index.php">Primera página</a></li>
                    <li><a href="pagina2.php">Segunda página</a></li>
                    <li><a href="pagina3.php">Tercera página</a></li>
                    <li><a href="pagina4.php">Cuarta página</a></li>
                    <li><a href="pagina6.php">Sexta página</a></li>
                </ol>
            </div>
            <div class="segunda_columna">
                <?php
                    $personas=["Fernando","Carlos","Jaume"];
                ?>
                <ul>
                    <?php
                        foreach ($personas as $persona){
                            echo "<li>$persona</li> <br>";
                        }

                        for($i=1;$i<=10;$i++){
                            echo $i." ";
                        }

                        echo "<br>";
                        echo "<br>";

                        $j=1;
                        while($j<=count($personas)){
                            echo $j++." ";
                        }
                    ?>
                </ul>
            </div>

        </div>

        <div class="tercera_caja">

        </div>
    <div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cuadrado mágico</title>
</head>
<body>
    <?php
        require("cuadrado.php");
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $numeros=array(
            0=>array(4,9,2),
            1=>array(3,5,7),
            2=>array(8,1,6)
        );
        $fallos=array();
        $dummy=new Cuadrado($numeros,3,3,false,$fallos);

        $cuadrado=$dummy->analizarCuadradoMagico($numeros);

        $cuadrado->pintarCuadradoMagico($cuadrado);
        
        ?>
</body>
</html>
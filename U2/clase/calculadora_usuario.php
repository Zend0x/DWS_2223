<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora 👍</title>
</head>
<body>
    <h1>Factorial</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        require("calculadora.php");

        $calcular=new Calculadora;
        $numero=5;
        if($numero>=0){
            echo $calcular->factorial($numero);
        } else {
            echo "El número tiene que ser mayor que 0.";
        }
    ?>
    <h1>Coeficiente Binomial</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $calcular2=new Calculadora();

        $n=5;
        $k=7;
        if($n-$k<=0){
            echo "Números incorrectos. N - K es menor o igual a 0.";
        } else {
            echo $calcular2->coeficienteBinomial($n,$k);
        }
        
    ?>
    <h1>Conversor de binario.</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $bits="1001";
        echo $bits." en decimal es: ".$calcular->conversionBinarioDecimal($bits);
    ?>
    <h1>Suma de números pares del array.</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $numeros=array(1,2,4,8);
        echo "La suma de los pares es: ".$calcular->sumaNumerosPares($numeros);
    ?>
    <h1>Palabras Palíndromas</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $palabra1="amor";
        $palabra2="roma";
        $result=$calcular->esPalindromo($palabra1,$palabra2);

        if($result==1){
            echo $palabra1." y ".$palabra2." son palíndromas.";
        } else if ($result==2){
            echo $palabra1." y ".$palabra2." NO son palíndromas.";
        }
    ?>
    <h1>Suma de Matrices</h1>
    <?php
        ini_set('display_errors','On');
        ini_set('html_errors',0);

        $matriz1=array(
            "fila1"=>array(2,3),
            "fila2"=>array(1,4),
        );
        $matriz2=array(
            "fila1"=>array(6,8),
            "fila2"=>array(2,1),
        );
        
    ?>
</body>
</html>
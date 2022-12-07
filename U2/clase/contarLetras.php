<?php 

    ini_set('display_errors','On');
    ini_set('html_errors',0);

    $frase="La casa es blanca y la nube es gris";
    $contarLetras=array(
        "A"=>0,
        "B"=>0,
        "C"=>0,
        "D"=>0,
        "E"=>0,
        "F"=>0,
        "G"=>0,
        "H"=>0,
        "I"=>0,
        "J"=>0,
        "K"=>0,
        "L"=>0,
        "M"=>0,
        "N"=>0,
        "0"=>0,
        "P"=>0,
        "Q"=>0,
        "R"=>0,
        "S"=>0,
        "T"=>0,
        "U"=>0,
        "V"=>0,
        "W"=>0,
        "X"=>0,
        "Y"=>0,
        "Z"=>0

    );
    function contadorLetras($frase,$contarLetras){
        for($i=0;$i<strlen($frase);$i++){
            $mayusculas=strtoupper($frase);
            $letra=$mayusculas[$i];
            $posicion=array_search($letra,$contarLetras);
            if($posicion!=-1&&$letra!=" "){
                $contarLetras[$letra]=$contarLetras[$letra]+1;
            } else {
                
            }
        }
        return $contarLetras;
    }

    function fraseArrayMayusculas($frase){
        $fraseMayusculas=strtoupper($frase);
        $arrayFrase=explode(" ",$fraseMayusculas);

        return $arrayFrase;
    }

    echo print_r(contadorLetras($frase,$contarLetras),true);
    echo "<br>";
    echo print_r(fraseArrayMayusculas($frase),true);


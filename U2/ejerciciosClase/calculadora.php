<?php

    class Calculadora{
        function factorial($numero){
            $resultado=0;
            if ($numero==0){
                $resultado=1;
            } else if ($numero>0) {
                $resultado=1;
                while($numero>0){
                    $resultado=$resultado*$numero;
                    $numero--;
                }
                return $resultado;
            }
        }

        function coeficienteBinomial($n,$k){
            try{
                $resultado=$this->factorial($n)/
                ($this->factorial($k)*$this->factorial($n-$k));
                return $resultado;
            }catch(DivisionByZeroError $e){
                echo "Números incorrectos.";
            }
        }

        function conversionBinarioDecimal($bits){
            
            $numero=str_split(strrev($bits));

            $resultado=0;
            $operacion=0;

            for($i=0;$i<count($numero);$i++){
                $operacion=$numero[$i]*(2**$i);
                $resultado=$resultado+$operacion;
            }
            return $resultado;

            /*if(is_string($bits)=="true"){
                $resultado=bindec($bits);
                return $resultado;
            } else {
                echo "La variable tiene que ser una string.";
            }*/
        }

        function sumaNumerosPares($numeros){
            $resultado=0;
            for ($i=0; $i < count($numeros); $i++) { 
                if($numeros[$i]%2==0){
                    $resultado=$resultado+$numeros[$i];
                }
            }
            return $resultado;
        }

        function esPalindromo($palabra1,$palabra2){
            $reverse=strrev($palabra1);
            if($reverse==$palabra2){
                return true;
            } else {
                return false;
            }
        }

        function sumaMatrices($matriz1,$matriz2){
            $aux=array();

            for($i=0;$i<count($matriz1);$i++){
                for ($j=0; $j < count($matriz2); $j++) { 
                    $aux[$i][$j]=$matriz1[$i][$j]+$matriz2[$i][$j];
                }
            }
            return $aux;
        }
}
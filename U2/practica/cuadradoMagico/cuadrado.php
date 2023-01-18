<?php

class Cuadrado{
    //Constructor
    public function __construct($array,$filas,$columnas,$magic,$arrayFallos){
        $this->array=$array;
        $this->filas=$filas;
        $this->columnas=$columnas;
        $this->magic=$magic;
        $this->arrayFallos=$arrayFallos;
    }

    
    //Getters y setters
    public function setFilas($filas){
        $this->filas=$filas;
    }
    public function getFilas(){
        return $this->filas;
    }
    public function setColumnas($columnas){
        $this->columnas=$columnas;
    }
    public function getColumnas(){
        return $this->columnas;
    }
    public function setArray($array){
        $this->array=$array;
    }
    public function getArray(){
        return $this->array;
    }
    public function setMagic($magic){
        $this->magic=$magic;
    }
    public function getMagic(){
        return $this->magic;
    }
    public function setFallos($arrayFallos){
        $this->arrayFallos=$arrayFallos;
    }
    public function getFallos(){
        return $this->arrayFallos;
    }

    function sumaFilas($numeros){
        $sumasFilas=array(
            0=>0,
            1=>0,
            2=>0
        );
        for($i=0;$i<count($numeros);$i++){
            for($j=0;$j<count($numeros[$i]);$j++){
                $sumasFilas[$i]=$sumasFilas[$i]+$numeros[$i][$j];
            }
        }
        return $sumasFilas;
    }
    function sumaColumnas($numeros){
        $sumaColumnas=array(
            0=>0,
            1=>0,
            2=>0
        );
        foreach ($numeros as $columnas) {
            for($i=0;$i<count($numeros);$i++){
                $sumaColumnas[$i]=$sumaColumnas[$i]+$columnas[$i];
            }
        }
        return $sumaColumnas;
    }
    function sumaDiagonales($numeros){
        $diagonal1=0;
        $diagonal2=0;
        $sumaDiagonales=array(
            0=>0,
            1=>0
        );
        for($i=0;$i<count($numeros);$i++){
            for($j=0;$j<count($numeros);$j++){
                if($i==$j){
                    $diagonal1=$diagonal1+$numeros[$i][$j];
                }
            }
        }

        for($i=0;$i<count($numeros);$i++){
            for($j=0;$j<count($numeros);$j++){
                if($i+$j==count($numeros)-1){
                    $diagonal2=$diagonal2+$numeros[$i][$j];
                }
            }
        }
        $sumaDiagonales[0]=$diagonal1;
        $sumaDiagonales[1]=$diagonal2;

        return $sumaDiagonales;
    }

    function analizarCuadradoMagico($arrayNumeros){
        $filas=0;
        foreach ($arrayNumeros as $i) {
            $filas++;
        }
        $columnas=count($arrayNumeros[0]);
        $magic=false;
        $arrayFallos=array();
        $objeto=new Cuadrado($arrayNumeros,$filas,$columnas,$magic,$arrayFallos);

        $sumaFilas=$objeto->sumaFilas($arrayNumeros);
        $sumaColumnas=$objeto->sumaColumnas($arrayNumeros);
        $sumaDiagonales=$objeto->sumaColumnas($arrayNumeros);
        
        $filasTrue=false;
        $colTrue=false;
        $diagTrue=false;
        $filasErroneas=array(

        );
        $columnasErroneas=array(

        );
        $diagonalesErroneas=array(

        );
        for($i=0;$i<count($sumaFilas);$i++){
            if($sumaFilas[$i]==$sumaFilas[0]){
                $filasTrue=true;
            } else {
                $filasTrue=false;
                $filasErroneas[$i]=$sumaFilas[$i];
            }
        }
        for($i=0;$i<count($sumaColumnas);$i++){
            if($sumaColumnas[$i]==$sumaColumnas[0]){
                $colTrue=true;
            } else {
                $colTrue=false;
                $columnasErroneas[$i]=$sumaColumnas[$i];
            }
        }
        for($i=0;$i<count($sumaDiagonales);$i++){
            if($sumaDiagonales[$i]==$sumaDiagonales[0]){
                $diagTrue=true;
            } else {
                $diagTrue=false;
                $diagonalesErroneas[$i]=$sumaDiagonales[$i];
            }
        }
        if(
            $filasTrue==true
            &&
            $colTrue==true
            &&
            $diagTrue==true
        ){
            $magic=true;
        }
        $arrayFallos=array(
            $filasErroneas,$columnasErroneas,$diagonalesErroneas
        );
        $objeto->setColumnas($columnas);
        $objeto->setFilas($filas);
        $objeto->setMagic($magic);
        $objeto->setFallos($arrayFallos);
        return $objeto;
    }

    function pintarCuadradoMagico($objeto){
        $filas=$objeto->getFilas();
        $columnas=$objeto->getColumnas();
        if($filas==$columnas){
            echo "<table>";
            $mainArray=$objeto->getArray();
            foreach($mainArray as $subArray){
                echo "<tr>";
                foreach($subArray as $casilla){
                    echo "<td>";
                    echo $casilla;
                    echo "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            if($objeto->getMagic()==true){
                echo '<p class="true">El cuadrado SÍ es mágico.</p>';
            } else if ($objeto->getMagic()==false){
                echo '<p class="false">El cuadrado NO es mágico.</p>';
            }
            echo "Suma de las filas: ",print_r($objeto->sumaFilas($objeto->getArray())),"<br>";
            echo "Suma de las columnas: ",print_r($objeto->sumaColumnas($objeto->getArray())),"<br>";
            echo "Suma de las diagonales: ",print_r($objeto->sumaDiagonales($objeto->getArray())),"<br>";
            echo "<br><br>Filas Erroneas: ",print_r($objeto->getFallos());
        } else if ($filas!=$columnas){
            throw new Exception("La matriz es de dimensiones incorrectas. Por favor, introduce una matriz que sea cuadrada.");
        }

    }
    
}
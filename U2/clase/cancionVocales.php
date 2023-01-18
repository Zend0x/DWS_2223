<?php
$frase="El sapo no se lava el pie...";
$vocales=array("a","e","i","o","u");

function escribirFrase($frase,$vocal){
    $vocales=array("a","e","i","o","u");
    $vocales2=array("a","e","i","o","u");

    foreach ($vocales as $vocal) { 
        foreach ($vocales2 as $vocal2) {
            $nuevaFrase=str_replace($vocal2,$vocal,$frase);
        }
    }
    return $nuevaFrase;
}

echo escribirFrase($frase,$vocales);
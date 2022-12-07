<?php

    ini_set('display_errors',1);
    ini_set('html_errors',1);

    $credenciales=mysqli_connect('localhost','root','12345');

    mysqli_select_db($credenciales,'carteleraPeliculas');

    $query="SELECT peliculas.titulo as 'tituloPelicula', categorias.nombre as 'nombreCategoria' FROM peliculas
            INNER JOIN categorias ON peliculas.categoria=categorias.id 
            ORDER BY peliculas.votos DESC;";

    $resultado=mysqli_query($credenciales,$query);

    if(!$resultado){
        $devolucion='Consulta no válida.'.mysqli_error($credenciales)."\n";
        $devolucion="Consulta realizada: ".$query;
        die($devolucion);
    } else {
        echo "Conexión realizada."."<br>"."<br>";
        while($arrayResultados=mysqli_fetch_assoc($resultado)){
            echo "Título: ".$arrayResultados['tituloPelicula'].", categoría: ".$arrayResultados['nombreCategoria']."<br>";
            echo "<br>";
        }
    }
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/votado.css">
    <title>Votación</title>
</head>
<body>
    <?php

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        function votarPelicula(){
            $login=mysqli_connect('localhost','root','12345');
            mysqli_select_db($login,'carteleraPeliculas');

            $id_pelicula=$_POST['id_pelicula'];
            $sanitized_id_pelicula=msyqli_real_escape_string($login,$id_pelicula);

            $query="UPDATE peliculas SET votos = votos + 1 WHERE peliculas.id='".$_POST['id_pelicula']."';";

            mysqli_query($login,$query);

            echo 'Has votado a la película '.$_POST['id_pelicula'];
        }
    ?>
    <div class="contenedor">
        <div class="primera_caja">

        </div>
        <div class="segunda_caja">
                $
                <a href="categorias.php" class="botonBonito">Inicio</a>
                <p id="votado"><?php
                    votarPelicula();
                ?></p>

        </div>

        <div class="tercera_caja">

        </div>
    <div>
</body>
</html>
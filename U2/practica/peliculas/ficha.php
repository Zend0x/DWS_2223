
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&family=Kaushan+Script&family=New+Rocker&display=swap" rel="stylesheet">
    
    <?php

        $categoriaSeleccionada = strtoupper($_GET['categoria']);

        switch ($categoriaSeleccionada) {
            case 'TERROR':
                echo '<link rel="stylesheet" href="styles/ficha_terror.css">';
                break;
            case 'ARTES MARCIALES':
                echo '<link rel="stylesheet" href="styles/ficha_MA.css">';
                break;
        }
    ?>
</head>
<body>
    <?php

        ini_set('display_errors', 1);
        ini_set('html_errors', 1);

        class Pelicula{
            public function __construct($id, $titulo,$anno, $imagen, $categoria, $duracion, $descripcion,$votos)
            {
                $this->id = $id;
                $this->titulo = $titulo;
                $this->anno=$anno;
                $this->imagen = $imagen;
                $this->categoria = $categoria;
                $this->duracion = $duracion;
                $this->descripcion = $descripcion;
                $this->votos=$votos;
            }
            public function getId()
            {
                return $this->id;
            }
            public function getTitulo()
            {
                return $this->titulo;
            }
            public function getAnno(){
                return $this->anno;
            }
            public function getCategoria()
            {
                return $this->categoria;
            }
            public function getDuracion(){
                return $this->duracion;
            }
            public function getImagen()
            {
                return $this->imagen;
            }
            public function getDescripcion()
            {
                return $this->descripcion;
            }
            public function getVotos(){
                return $this->votos;
            }

        function fichaPelicula(){
            $login=mysqli_connect('localhost','root','12345');
            if(mysqli_connect_errno()){
                echo "Error al conectar a la base de datos. ".mysqli_connect_error();
            }
            mysqli_select_db($login,'carteleraPeliculas');

            $id_pelicula=$_GET['id_pelicula'];
            $id_pelicula_sanitized=mysqli_real_escape_string($login,$id_pelicula);

            $query="SELECT peliculas.id,peliculas.titulo,peliculas.anno,peliculas.imagen,peliculas.categoria,peliculas.duracion,peliculas.descripcion,peliculas.votos,
            categorias.nombre as 'nombreCategoria'
            FROM peliculas 
            INNER JOIN categorias ON peliculas.categoria=categorias.id
            WHERE peliculas.id='".$id_pelicula_sanitized."';";

            $outputQuery=mysqli_query($login,$query);

            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                die($mensaje);
            }else{
                //echo 'Conectado.'."<br>";
                while($datos=mysqli_fetch_assoc($outputQuery)){

                    $id=$datos['id'];
                    $titulo=$datos['titulo'];
                    $anno=$datos['anno'];
                    $imagen=$datos['imagen'];
                    $categoria=$datos['nombreCategoria'];
                    $duracion=$datos['duracion'];
                    $descripcion=$datos['descripcion'];
                    $votos=$datos['votos'];

                    $objetoPelicula=new Pelicula($id, $titulo,$anno, $imagen, $categoria, $duracion, $descripcion,$votos);
                }
                return $objetoPelicula;
            }
        }
        
        function obtenerActores(){
            $login=mysqli_connect('localhost','root','12345');
            mysqli_select_db($login,'carteleraPeliculas');

            $query="SELECT CONCAT_WS(' ',actores.nombre,actores.apellidos) as 'nombreCompleto' FROM actores 
            INNER JOIN actores_peliculas ON actores.id=actores_peliculas.id_actor
            INNER JOIN peliculas ON actores_peliculas.id_pelicula=peliculas.id
            WHERE peliculas.id=".$id_pelicula_sanitized.";";

            $outputQuery=mysqli_query($login,$query);

            $outputQuery=mysqli_query($login,$query);
            $arrayActores=array();
            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                die($mensaje);
            }else{
                //echo 'Conectado.'."<br>";
                while($datos=mysqli_fetch_assoc($outputQuery)){
                    array_push($arrayActores,$datos['nombreCompleto']);
                }
                return $arrayActores;
            }
        }
        function obtenerDirectores(){
            $login=mysqli_connect('localhost','root','12345');
            mysqli_select_db($login,'carteleraPeliculas');

            $query="SELECT CONCAT_WS(' ',directores.nombre,directores.apellidos) as 'nombreCompleto' FROM directores 
            INNER JOIN directores_peliculas ON directores.id=directores_peliculas.id_director
            INNER JOIN peliculas ON directores_peliculas.id_pelicula=peliculas.id
            WHERE peliculas.id=".$id_pelicula_sanitized.";";

            $outputQuery=mysqli_query($login,$query);

            $outputQuery=mysqli_query($login,$query);
            $arrayDirectores=array();
            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                die($mensaje);
            }else{
                //echo 'Conectado.'."<br>";
                while($datos=mysqli_fetch_assoc($outputQuery)){
                    array_push($arrayDirectores,$datos['nombreCompleto']);
                }
                return $arrayDirectores;
            }
        }
    }

    ?>
    <div class="contenedor">
        <div class="cajaUno">
            
            <?php
                echo '<a href="categorias.php" class="botonBonito">Inicio</a>';
                echo '<br>';
                echo '<a href="peliculas.php?categoria='.$_GET['categoria'].'" class="botonBonito">Categoría</a>';
            ?>
        </div>
        <div class="cajaDos">
            <div class="columnaIzquierda">
                
            </div>
            <div class="columnaCentral">
                <div class="ficha">
                        <?php
                            $dummy=new Pelicula(0,0,0,0,0,0,0,0);
                            $nuevaPelicula=$dummy->fichaPelicula();
                            echo '<div class="poster">';
                            echo '<img src="img/'.$nuevaPelicula->getImagen().'"> <alt="'.$nuevaPelicula->getImagen().'">';
                            echo '</div>';
                        ?>
                    
                    <div class="votar">
                        <?php
                        echo '<form action="votado.php" method="post">';
                        echo "<input type='hidden' name='id_pelicula' value='".$id_pelicula_sanitized."' />";
                        echo '<input type="submit" name="submit" value="Votar" id="botonVotar">';
                        echo '</form>';
                        ?>
                    </div>

                    <div class="datos">
                        <?php
                        $stringActoresFinal=implode(', ',$nuevaPelicula->obtenerActores());
                        $directores=implode(', ',$nuevaPelicula->obtenerDirectores());
                            echo '<p id="titulo"><b>Titulo:</b> '.$nuevaPelicula->getTitulo().'</p>
                            <p id="anno"><b>Año:</b> '.$nuevaPelicula->getAnno().'</p>
                            <p id="duracion"><b>Duración:</b> '.$nuevaPelicula->getDuracion().' minutos.</p>
                            <p id="directores"><b>Director(es): </b>'.$directores.'</p>
                            <p id="reparto"><b>Reparto: </b>'.$stringActoresFinal.'</p>
                            <p id="sinopsis"><b>Sinopsis:</b> '.$nuevaPelicula->getDescripcion().'</p>
                            <p id="votos"><b>Votos:</b> '.$nuevaPelicula->getVotos().'</p>';
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="cajaTres">
            <p>a</p>
        </div>
    </div>
</body>
</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $categoriaSeleccionada = strtoupper($_GET['categoria']);

    switch ($categoriaSeleccionada) {
        case 'TERROR':
            echo '<link rel="stylesheet" href="styles/terror.css">';
            break;
        case 'ARTES MARCIALES':
            echo '<link rel="stylesheet" href="styles/martialarts.css">';
            break;
    }
    ?>
    <title>Películas</title>
</head>

<body>
    <?php
    class Pelicula
    {
        public function __construct($id, $titulo, $imagen, $categoria, $duracion, $descripcion,$votos)
        {
            $this->id = $id;
            $this->titulo = $titulo;
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

        //Query para sacar las películas
        function sacarPeliculas(){
            $login=mysqli_connect('localhost','root','12345');
            mysqli_select_db($login,'carteleraPeliculas');

            $categoriaSeleccionada = strtolower($_GET['categoria']);

            $query="SELECT peliculas.id,peliculas.titulo,peliculas.imagen,peliculas.categoria,peliculas.duracion,peliculas.descripcion,peliculas.votos
            FROM peliculas 
            INNER JOIN categorias ON peliculas.categoria=categorias.id
            WHERE categorias.nombre='".$categoriaSeleccionada."'
            ORDER BY peliculas.votos DESC;";

            $outputQuery=mysqli_query($login,$query);

            $arrayPeliculas=array();

            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                die($mensaje);
            }else{
                //echo 'Conectado.'."<br>";
                while($datos=mysqli_fetch_assoc($outputQuery)){

                    $id=$datos['id'];
                    $titulo=$datos['titulo'];
                    $imagen=$datos['imagen'];
                    $categoria=$datos['categoria'];
                    $duracion=$datos['duracion'];
                    $descripcion=$datos['descripcion'];
                    $votos=$datos['votos'];

                    $pelicula=new Pelicula($id, $titulo, $imagen, $categoria, $duracion, $descripcion,$votos);
                    array_push($arrayPeliculas,$pelicula);
                }
                return $arrayPeliculas;
            }
        }

        function pintarPeliculas($pelicula)
        {
            echo '<div class="pelicula">';
            echo '<p class="titulo">'.$pelicula->getTitulo().'</p>';
            echo '<div class="poster">';
            echo '<img src="img/' . $pelicula->getImagen() . '"> <alt="' . $pelicula->getImagen() . '">';
            echo '<p class="duracion">Duración: '.$pelicula->getDuracion().'</p>';
            echo '</div>';
            echo '<div class="texto">';
            echo '<p>' . $pelicula->getDescripcion() . '</p>';
            echo '</div>';
            echo '<a href="ficha.php?id_pelicula="'.$pelicula->getId().'>';
            echo '<p class="enlaceFicha">Ver ficha</p>';
            echo '</a>';
            echo '</div>';
        }
    }
    ?>
    <div class="contenedor">
        <div class="primera_caja">
            <a href="categorias.php" id="boton_inicio">INICIO</a><br>
        </div>
        <div class="segunda_caja">

            <div class="primera_columna">
            </div>

            <div class="segunda_columna">
                <?php
                    ini_set('display_errors', 1);
                    ini_set('html_errors', 1);

                    echo '<h1> Peliculas de ' . $categoriaSeleccionada . '</h1>';
                    $dummy = new Pelicula(0, 0, 0, 0, 0, 0,0);

                    $peliculaNueva = $dummy->sacarPeliculas();

                    for($i=0;$i<count($peliculaNueva);$i++){
                        $dummy->pintarPeliculas($peliculaNueva[$i]);
                    }
                
                ?>
            </div>
            <div class="tercera_columna">

            </div>
        </div>
        <div class="footer">
                <p>Footer</p>
        </div>
    </div>
</body>

</html>
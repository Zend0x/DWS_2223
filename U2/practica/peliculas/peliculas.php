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
        public function __construct($id, $titulo, $imagen, $categoria, $duracion, $descripcion)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->imagen = $imagen;
            $this->categoria = $categoria;
            $this->duracion = $duracion;
            $this->descripcion = $descripcion;
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
        public function getImagen()
        {
            return $this->imagen;
        }
        public function getDescripcion()
        {
            return $this->descripcion;
        }

        //Query para sacar las películas
        function sacarPeliculas(){
            $login=mysqli_connect('localhost','root','12345');
            mysqli_select_db($login,'carteleraPeliculas');

            $query="SELECT * FROM peliculas";

            $outputQuery=mysqli_query($login,$query);

            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                die($mensaje);
            }else{
                echo 'Conectado.'."<br>";
                while($datos=mysqli_fetch_assoc($outputQuery)){

                    $id=$datos['id'];
                    $titulo=$datos['titulo'];
                    $imagen=$datos['imagen'];
                    $categoria=$datos['categoria'];
                    $duracion=$datos['duracion'];
                    $descripcion=$datos['descripcion'];

                    $pelicula=new Pelicula($id, $titulo, $imagen, $categoria, $duracion, $descripcion);

                    $arrayPeliculas=array();
                    array_push($arrayPeliculas,$pelicula);
                }
                return $arrayPeliculas;
            }
        }

        function pintarPeliculas($pelicula)
        {
            echo '<div class="pelicula">';
            echo '<div class="poster">';
            echo '<img src="img/' . $pelicula->getImagen() . '"> <alt="' . $pelicula->getImagen() . '">';
            echo '</div>';
            echo '<div class="texto">';
            echo '<p>' . $pelicula->getDescripcion() . '</p>';
            echo '</div>';
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
                    $dummy = new Pelicula(0, 0, 0, 0, 0, 0);

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
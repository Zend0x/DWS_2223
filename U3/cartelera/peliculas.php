<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&family=Kaushan+Script&family=New+Rocker&display=swap" rel="stylesheet">
    <?php
    $categoriaSeleccionada = strtoupper($_GET['categoria']);

    switch ($categoriaSeleccionada) {
        case 'TERROR':
            echo '<link rel="stylesheet" href="styles/terror.css">';
            echo '<link rel="shortcut icon" href="img/favicon_terror.ico" type="image/x-icon">';
            break;
        case 'ARTES MARCIALES':
            echo '<link rel="stylesheet" href="styles/martialarts.css">';
            echo '<link rel="shortcut icon" href="img/favicon_MA.ico" type="image/x-icon">';
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

            $categoriaSeleccionada=strtolower($_GET['categoria']);
            $san_categoriaSeleccionada=mysqli_real_escape_string($login,$categoriaSeleccionada);

            if(isset($_POST['ordenar'])){
                $orden=mysqli_real_escape_string($login,$_POST['orden']);

                $query="SELECT peliculas.id,peliculas.titulo,peliculas.imagen,peliculas.categoria,peliculas.duracion,peliculas.descripcion,peliculas.votos
                FROM peliculas 
                INNER JOIN categorias ON peliculas.categoria=categorias.id
                WHERE categorias.nombre='".$san_categoriaSeleccionada."'".$orden.";";
            }else{
                $query="SELECT peliculas.id,peliculas.titulo,peliculas.imagen,peliculas.categoria,peliculas.duracion,peliculas.descripcion,peliculas.votos
                FROM peliculas 
                INNER JOIN categorias ON peliculas.categoria=categorias.id
                WHERE categorias.nombre='".$san_categoriaSeleccionada."';";
            }

            

            $outputQuery=mysqli_query($login,$query);

            $arrayPeliculas=array();

            if(!$outputQuery){
                $mensaje='Consulta inválida.'.mysqli_error($login);
                $mensaje='Query realizada: '.$query;
                die($mensaje);
            }else{
                if(($outputQuery->num_rows)>0){
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
                }else{
                    echo '<h1 class="mensajeError">No hay películas que mostrar.</h1>';
                }
            }
        }

        function pintarPeliculas($arrayPeliculas)
        {
            if(!empty($arrayPeliculas)){
                foreach ($arrayPeliculas as $pelicula) {
                    $nombreCategoria=$_GET['categoria'];
                    echo '<div class="pelicula">';
                    echo '<p class="titulo">'.$pelicula->getTitulo().'</p>';
                    echo '<p class="votos">Votos: '.$pelicula->getVotos().'</p>';
                    echo '<div class="poster">';
                    echo '<img src="img/' . $pelicula->getImagen() . '"> <alt="' . $pelicula->getImagen() . '">';
                    echo '<p class="duracion">Duración: '.$pelicula->getDuracion().'</p>';
                    echo '</div>';
                    echo '<div class="texto">';
                    echo '<p>' . substr($pelicula->getDescripcion(),0,150)."...". '</p>';
                    echo '</div>';
                    echo '<a href="ficha.php?id_pelicula='.$pelicula->getId().'&categoria='.$nombreCategoria.'">';
                    echo '<p class="enlaceFicha">Ver ficha</p>';
                    echo '</a>';
                    echo '</div>';
                }
            }
        }
    }
    ?>
    <div class="contenedor">
        <div class="primera_caja">
        <a href="categorias.php" class="botonBonito">Inicio</a>
            <?php
                echo '<h1 id="catPelis"> Peliculas de '.$_GET['categoria'].'</h1>';
            ?>
            </div>
        <div class="segunda_caja">

            <div class="primera_columna">
            </div>

            <div class="segunda_columna">
                <?php
                    
                ini_set('display_errors', 1);
                ini_set('html_errors', 1);

                echo '<form action="" method="post">
                <div class="selector">
                    <select name="orden" id="orden">
                      <option selected="selected" value=" " selected>Default</option>
                      <option value="ORDER BY peliculas.votos ASC">Votos, ascendente</option>
                      <option value="ORDER BY peliculas.votos DESC">Votos, descendente</option>
                      <option value="ORDER BY peliculas.titulo ASC">Alfabeto, ascendente</option>
                      <option value="ORDER BY peliculas.titulo DESC">Alfabeto, descendente</option>
                    </select>
                    <input type="submit" name="ordenar" value="Ordenar" class="botonForm">
                  </form>
                </div>';
                echo '<br>';

                    $dummy = new Pelicula(0, 0, 0, 0, 0, 0,0);

                    $peliculaNueva = $dummy->sacarPeliculas();
                    $dummy->pintarPeliculas($peliculaNueva);
                
                ?>
                <br>
            </div>
        </div> 
        
        <div class="tercera_caja">
            <p>Fernando Buendía Galindo - DWS</p>
        </div> 
    </div>
</body>

</html>
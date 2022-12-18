<html>
<head>
    <meta charset="UTF-8">
    <title>Cartelera del cine</title>
    <link rel="stylesheet" href="styles/categorias.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Hanalei+Fill&family=Kaushan+Script&family=New+Rocker&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
            
        </div>

        <div class="segunda_caja">

            <div class="primera_columna">

            </div>

            <div class="segunda_columna">
                <?php
                    class Categoria{
                        public function __construct($id,$nombre,$imagen,$descripcion){
                            $this->id=$id;
                            $this->nombre=$nombre;
                            $this->imagen=$imagen;
                            $this->descripcion=$descripcion;
                        }

                        public function getNombre(){
                            return $this->nombre;
                        }
                        public function getImagen(){
                            return $this->imagen;
                        }
                        public function getDescripcion(){
                            return $this->descripcion;
                        }

                        function sacarCategorias(){
                            $login=mysqli_connect('localhost','root','12345');
                            if(mysqli_connect_errno()){
                                echo "Error al acceder a la base de datos.".mysqli_connect_error();
                            }
                            $dummy=new Categoria(0,0,0,0);
                            mysqli_select_db($login,'carteleraPeliculas');
                
                            $query="SELECT categorias.id,categorias.nombre,categorias.imagen,categorias.descripcion FROM categorias;";
                
                            $outputQuery=mysqli_query($login,$query);
                
                            $arrayCategorias=array();
                
                            if(!$outputQuery){
                                $mensaje='Consulta inválida.'.mysqli_error($login);
                                die($mensaje);
                            }else{
                                if(($outputQuery->num_rows)>0){
                                    
                                    echo '<h1 class="seleccionaUna">Selecciona una categoría</h1>';
                                    while($datos=mysqli_fetch_assoc($outputQuery)){
                
                                        $id=$datos['id'];
                                        $nombre=$datos['nombre'];
                                        $imagen=$datos['imagen'];
                                        $descripcion=$datos['descripcion'];
                    
                                        $categoria=new Categoria($id, $nombre,$imagen, $descripcion);
                                        array_push($arrayCategorias,$categoria);
                                    }
                                    $dummy->pintarCategorias($arrayCategorias);
                                }else{
                                    echo '<h1 id="mensajeError">No ha habido resultados.</h1>';
                                }
                            }
                        }

                        function pintarCategoria($categoria){

                            $nombreCategoria=$categoria->getNombre();
                            $imagenCategoria=$categoria->getImagen();

                            echo '<div class="cuadrado">';
                            echo '<a href="peliculas.php?categoria='.$nombreCategoria.'" class="icono"">';
                            echo '<img src="img/'.$imagenCategoria.'"> <alt="'.$nombreCategoria.'">';
                            echo '</a>';
                            echo '<p class="nombreCategoria">'.$nombreCategoria.'</p>';
                            echo '</div>';
                        }

                        function pintarCategorias($listaCategorias){
                            $dummy=new Categoria(0,0,0,0);
                            for($i=0;$i<count($listaCategorias);$i++){
                                $dummy->pintarCategoria($listaCategorias[$i]);
                            }
                        }
                    }
                    
                    $dummy=new Categoria(0,0,0,0,0);
                    $arrayCat = $dummy->sacarCategorias();
                ?>
            </div>

        </div>
        <div class="tercera_caja">
            <p>Fernando Buendía Galindo - DWS</p>
        </div>
    <div>
</body>
</html>


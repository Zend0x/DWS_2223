<html>
<head>
    <meta charset="UTF-8">
    <title>Cartelera del cine</title>
    <link rel="stylesheet" href="styles/categorias.css">
</head>
<body>
    <div class="contenedor">
        <div class="primera_caja">
            
        </div>

        <div class="segunda_caja">

            <div class="primera_columna">

            </div>

            <div class="segunda_columna">
                <h1>Selecciona una categoría</h1>
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
                            mysqli_select_db($login,'carteleraPeliculas');
                
                            $query="SELECT * FROM categorias;";
                
                            $outputQuery=mysqli_query($login,$query);
                
                            $arrayCategorias=array();
                
                            if(!$outputQuery){
                                $mensaje='Consulta inválida.'.mysqli_error($login);
                                die($mensaje);
                            }else{
                                //echo 'Conectado.'."<br>";
                                while($datos=mysqli_fetch_assoc($outputQuery)){
                
                                    $id=$datos['id'];
                                    $nombre=$datos['nombre'];
                                    $imagen=$datos['imagen'];
                                    $descripcion=$datos['descripcion'];
                
                                    $categoria=new Categoria($id, $nombre,$imagen, $descripcion);
                                    array_push($arrayCategorias,$categoria);
                                }
                                return $arrayCategorias;
                            }
                        }

                        function pintarCategoria($categoria){

                            $nombreCategoria=$categoria->getNombre();
                            $imagenCategoria=$categoria->getImagen();

                            echo '<div class="cuadrado">';
                            echo '<a href="peliculas.php?categoria='.$nombreCategoria.'" class="icono">';
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
                ?>
                <!--
                <div class="cuadrado">
                    <a href="peliculas.php?categoria=terror" class="icono">
                        <img src="img/terror.png" alt="terror">
                    </a>
                    <p>Terror</p>
                </div>

                <div class="cuadrado">
                    <a href="peliculas.php?categoria=pelea" class="icono">
                        <img src="img/bruceLee_silouette.webp" alt="bruceLee">
                    </a>
                    <p>Artes Marciales</p>
                </div>
                -->
                <?php
                    $dummy=new Categoria(0,0,0,0,0);
                    $categoria1=new Categoria(1,"Terror","terror_icon.png","Peliculas de miedo.");
                    $categoria2=new Categoria(2,"Artes Marciales","martialArts_icon.webp","Peliculas de peleas.");
                    $categoria3=new Categoria(3,"Peleas 2","bruceLee_silouette.webp","Peleas pero 2");
                    $arrayCat = $dummy->sacarCategorias();
                    $dummy->pintarCategorias($arrayCat);
                ?>
            </div>

        </div>
        <div class="tercera_caja">
            <p>Fernando Buendía Galindo - DWS</p>
        </div>
    <div>
</body>
</html>


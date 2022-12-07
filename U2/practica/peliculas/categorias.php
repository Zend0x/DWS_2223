<html>
<head>
    <meta charset="UTF-8">
    <title>Cartelera del cine</title>
    <link rel="stylesheet" href="styles/main.css">
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
                        public function setNombre($nombre){
                            $this->nombre=$nombre;
                        }
                        public function getNombre(){
                            return $this->nombre;
                        }
                        public function setImagen($imagen){
                            $this->imagen=$imagen;
                        }
                        public function getImagen(){
                            return $this->imagen;
                        }
                        public function setDescripcion($descripcion){
                            $this->descripcion=$descripcion;
                        }
                        public function getDescripcion(){
                            return $this->descripcion;
                        }

                        function mostrarCarteleras($categoria){
                            $nombreCategoria=$categoria->getNombre();
                            $imagenCategoria=$categoria->getImagen();
                            echo '<div class="cuadrado">';
                            echo '<a href="peliculas.php?categoria='.$nombreCategoria.'" class="icono">';
                            echo '<img src="img/'.$imagenCategoria.'"> <alt="'.$nombreCategoria.'">';
                            echo '</a>';
                            echo '<p>'.$nombreCategoria.'</p>';
                            echo '</div>';
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
                    $categoria1=new Categoria(1,"Terror","terror.png","Peliculas de miedo.");
                    $categoria2=new Categoria(2,"Artes Marciales","bruceLee_silouette.webp","Peliculas de peleas.");
                    $categoria3=new Categoria(3,"Peleas 2","bruceLee_silouette.webp","Peleas pero 2");
                    $categorias=[
                        $categoria1,$categoria2
                    ];
                    for($i=0;$i<count($categorias);$i++){
                        $dummy->mostrarCarteleras($categorias[$i]);
                    }
                ?>
            </div>

        </div>
        <div class="tercera_caja">
            <p>Fernando Buendía Galindo - DWS</p>
        </div>
    <div>
</body>
</html>


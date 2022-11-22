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
                    class Categorias{
                        public function __construct($nombre,$imagen,$descripcion){
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

                        
                    }
                ?>
                <div class="cuadrado">
                    <a href="peliculas.php?categoria=terror" class="icono">
                        <img src="img/screamIcon.png" alt="scream">
                    </a>
                    <p>Terror</p>
                </div>

                <div class="cuadrado">
                    <a href="peliculas.php?categoria=pelea" class="icono">
                        <img src="img/bruceLee_silouette.webp" alt="bruceLee">
                    </a>
                    <p>Artes Marciales</p>
                </div>

            </div>

        </div>
        <div class="tercera_caja">
            <p>Fernando Buendía Galindo - DWS</p>
        </div>
    <div>
</body>
</html>


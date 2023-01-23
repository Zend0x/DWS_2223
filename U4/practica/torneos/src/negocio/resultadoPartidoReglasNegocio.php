<?php
    require("../infraestructura/partidoAccesoDatos.php");

    class ResultadoPartidoReglasNegocio{

        private $_ID;
        private $jugadorA;
        private $jugadorB;
        private $ganadorPartido;

        function __construct(){
            
        }

        function init($id,$jugadorA,$jugadorB,$ganadorPartido){
            $this->_ID=$id;
            $this->jugadorA=$jugadorA;
            $this->jugadorB=$jugadorB;
            $this->ganadorPartido=$ganadorPartido;
        }
        function getID(){
            return $this->_ID;
        }
        function getJugadorA(){
            return $this->jugadorA;
        }
        function getJugadorB(){
            return $this->jugadorB;
        }
        function getGanador(){
            return $this->ganadorPartido;
        }

        function obtener(){
            $accesoDatosPartido=new PartidoAccesoDatos();
            $resultado=$accesoDatosPartido->obtener();

            $listadoPartidos=array();
            foreach($resultado as $partido){
                $resultadoPartidoReglasNegocio=new ResultadoPartidoReglasNegocio();
                $resultadoPartidoReglasNegocio->init($partido['id_partido'],$partido['id_jugadorA'],$partido['id_jugadorB'],$partido['id_ganador']);
                array_push($listadoPartidos,$resultadoPartidoReglasNegocio);
            }
            return $listadoPartidos;
        }
    }
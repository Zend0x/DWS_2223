<?php

    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    require_once("../infraestructura/partidoAccesoDatos.php");

    class PartidoReglasNegocio{

        private $_ID;
        private $_JUGADORA;
        private $_NOMBREJUGADORA;
        private $_JUGADORB;
        private $_NOMBREJUGADORB;
        private $_GANADORPARTIDO;
        private $_NOMBREGANADOR;
        private $_RONDATORNEO;

        function __construct(){
            
        }

        function init($id,$jugadorA,$nombreJugadorA,$jugadorB,$nombreJugadorB,$ganadorPartido,$nombreGanador,$rondaTorneo){
            $this->_ID=$id;
            $this->_JUGADORA=$jugadorA;
            $this->_NOMBREJUGADORA=$nombreJugadorA;
            $this->_JUGADORB=$jugadorB;
            $this->_NOMBREJUGADORB=$nombreJugadorB;
            $this->_GANADORPARTIDO=$ganadorPartido;
            $this->_NOMBREGANADOR=$nombreGanador;
            $this->_RONDATORNEO=$rondaTorneo;
        }
        function getID(){
            return $this->_ID;
        }
        function getJugadorA(){
            return $this->_JUGADORA;
        }
        function getNombreJugadorA(){
            return $this->_NOMBREJUGADORA;
        }
        function getJugadorB(){
            return $this->_JUGADORB;
        }
        function getNombreJugadorB(){
            return $this->_NOMBREJUGADORB;
        }
        function getGanador(){
            return $this->_GANADORPARTIDO;
        }
        function getNombreGanador(){
            return $this->_NOMBREGANADOR;
        }
        function getRondaTorneo(){
            return $this->_RONDATORNEO;
        }

        function obtener($id_torneo){
            $accesoDatosPartido=new PartidoAccesoDatos();
            $resultado=$accesoDatosPartido->obtener($id_torneo);

            $listadoPartidos=array();
            foreach($resultado as $partido){
                $partidoReglasNegocio=new PartidoReglasNegocio();
                $partidoReglasNegocio->init($partido['id_partido'],$partido['id_jugadorA'],$partido['nombreJugadorA'],$partido['id_jugadorB'],$partido['nombreJugadorB'],
                                            $partido['id_ganador'],$partido['nombreGanador'],$partido['rondaTorneo']);
                array_push($listadoPartidos,$partidoReglasNegocio);
            }
            return $listadoPartidos;
        }

        function insertar($id_torneo,$id_jugadorA,$id_jugadorB,$rondaTorneo){
            $partidoDAL=new PartidoAccesoDatos();
            $partidoDAL->insertar($id_torneo,$id_jugadorA,$id_jugadorB,$rondaTorneo);
        }

        function borrar($id_partido){
            $partidoDAL=new PartidoAccesoDatos();
            $partidoDAL->borrar($id_partido);
        }

        function actualizarPartido($id_partido,$ganador){
            $partidoDAL=new PartidoAccesoDatos();
            $partidoDAL->actualizarPartido($id_partido,$ganador);
        }
    }
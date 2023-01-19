<?php
    require("../infraestructura/torneoAccesoDatos.php");

    class TorneoReglasNegocio{

        private $_ID;
        private $nombre;
        private $fecha;

        function __construct(){
            
        }

        function init($id,$nombre,$fecha){
            $this->_ID=$id;
            $this->nombre=$nombre;
            $this->fecha=$fecha;
        }
        function getID(){
            return $this->_ID;
        }
        function getNombre(){
            return $this->nombre;
        }
        function getFecha(){
            return $this->fecha;
        }

        function obtener(){
            $accesoDatosTorneo=new TorneosAccesoDatos();
            $resultado=$accesoDatosTorneo->obtener();

            $listadoTorneos=array();
            foreach($resultado as $torneo){
                $torneoReglasNegocio1=new TorneoReglasNegocio();
                $torneoReglasNegocio1->init($torneo['id_torneo'],$torneo['nombre'],$torneo['fecha']);
                array_push($listadoTorneos,$torneoReglasNegocio1);
            }
            return $listadoTorneos;
        }
    }
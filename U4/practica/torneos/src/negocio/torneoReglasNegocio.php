<?php
    require("../infraestructura/torneoAccesoDatos.php");

    class TorneoReglasNegocio{

        private $_ID;

        function __construct(){
            
        }

        function init($id){
            $this->_ID=$id;
        }
        function getID(){
            return $this->_ID;
        }

        function obtener(){
            $accesoDatosTorneo=new TorneosAccesoDatos();
            $resultado=$accesoDatosTorneo->obtener();

            $listadoTorneos=array();
            foreach($resultado as $torneo){
                $torneoReglasNegocio1=new TorneoReglasNegocio();
                $torneoReglasNegocio1->Init($torneo['ID']);
                array_push($listadoTorneos,$torneoReglasNegocio1);
            }
            return $listadoTorneos;
        }
    }
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
            foreach($listadoTorneos as $torneo){
                
            }
        }
    }
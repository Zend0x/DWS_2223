<?php
ini_set('display_errors', 1);
ini_set('html_errors', 1);
    require ("../infraestructura/ipAccesoDatos.php");

    class ipReglasNegocio{
        private $_DIRECCIONIP;

        function __construct(){
        }

        function init($direccionIP){
            $this->_DIRECCIONIP=$direccionIP;
        }

        function getIP(){
            return $this->_DIRECCIONIP;
        }

        function obtener(){
            $ipDAL=new ipAccesoDatos();
            $result=$ipDAL->obtener();

            $direccionesIP=array();
            foreach($result as $direccion){
                $ipBL=new ipReglasNegocio();
                $ipBL->init($direccion['ip_binaria']);

                array_push($direccionesIP,$ipBL);
            }
            return $direccionesIP;
        }

        function obtenerDireccionesIpBloquedas(){
            $ipDAL=new ipAccesoDatos();
            $result=$ipDAL->obtener();

            $direccionesIpBloqueadas=array();
            foreach($result as $direccion){
                $ipBL=new ipReglasNegocio();
                $ipBL->init($direccion['ip_binaria']);

                array_push($direccionesIpBloqueadas,$ipBL);
            }
            return $direccionesIpBloqueadas;
        }

        function insertar($direccionIP){
            $ipDAL=new ipAccesoDatos();
            $ipDAL->insertarIpValida($direccionIP);
        }

        function convertirNumeroDecimalABinario($numero){
            $cadena=strrev($numero);
            $n=strlen($cadena)-1;

            $i=0;
            $resultado=0;
            for($i=0;$i<=$n;$i++){
                $resultado=$resultado+((2**$i)*$cadena[$i]);
            }
            return $resultado;
        }

        function convertIP($ipbinario){
            $digitos = explode(".", $ipbinario);
            $resultado = "";
            $i = 1;
            foreach ($digitos as $digito)
            {
                if ($i<4)
                {
                    $resultado = $resultado.$this->convertirNumeroDecimalABinario($digito).".";
                }
                else
                {
                    $resultado = $resultado.$this->convertirNumeroDecimalABinario($digito);
                }
                $i++;
            }
            return $resultado;
        }

        function limpiarIps(){
            $ipsBL=new ipReglasNegocio();
            $direccionesIP=$ipsBL->obtener();

            $ipsBloqueadasBL=new ipReglasNegocio();
            $direccionesIPBloqueadas=$ipsBloqueadasBL->obtenerDireccionesIpBloquedas();

            foreach($direccionesIPBloqueadas as $ipBloqueada){
                
            }
        }
    }
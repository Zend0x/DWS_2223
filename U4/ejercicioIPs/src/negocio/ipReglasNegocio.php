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

        function validarDigito($digito){
            $longitud = strlen($digito);
            $result = true;
            for ($i = 0; $i < $longitud; $i++)
            {
            // print($digito[$i]);
                if ($digito[$i]!="0" && $digito[$i]!="1")
                {
                    $result = false;
                    break;
                }
            }
            return $result;

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

        function validarIP($ip){
            $longitud = strlen($ip);
            if ($longitud!=35)
            {
                return false;
            }
            $result = true;
            $digitos = explode(".", $ip);
            foreach ($digitos as $digito)
            {
                if (!$this->validarDigito($digito))
                {
                    $result = false;
                    break;
                }
            }
            return $result;
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
            $ipDAL=new ipAccesoDatos();

            $ipsBL=new ipReglasNegocio();
            $direccionesIP=$ipsBL->obtener();

            $ipsBloqueadasBL=new ipReglasNegocio();
            $direccionesIPBloqueadas=$ipsBloqueadasBL->obtenerDireccionesIpBloquedas();

            foreach($direccionesIP as $ip){
                $ip_binaria=$ip['ip_binaria'];
                if($this->validarIP($ip_binaria)){
                    $ip_decimal=$this->convertIP($ip_binaria);
                    
                    $bloqueada=false;
                    foreach($direccionesIPBloqueadas as $ip_bloqueada){
                        if($ip_decimal==$ip_bloqueada['direccion_ip_decimal']){
                            $bloqueada=true;
                            break;
                        }
                    }
                    if(!$bloqueada){
                        $ipDAL->insertarIpValida($ip_decimal);
                    }
                }
            }
        }
    }
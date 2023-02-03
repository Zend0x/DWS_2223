<?php

require("../infraestructura/torneosAccesoDatos.php");

class TorneosReglasNegocio
{
    private $_ID;
    private $_NOMBRE;
    private $_FECHA;
    private $_LOCALIZACION;
    private $_GANADOR;

	function __construct()
    {
    }

    function init($id,$nombre,$fecha,$localizacion,$ganador)
    {
        $this->_ID = $id;
        $this->_NOMBRE=$nombre;
        $this->_FECHA=$fecha;
        $this->_LOCALIZACION=$localizacion;
        $this->_GANADOR=$ganador;
    }

    function getID(){
        return $this->_ID;
    }
    function getNombre(){
        return $this->_NOMBRE;
    }
    function getFecha(){
        return $this->_FECHA;
    }
    function getLocalizacion(){
        return $this->_LOCALIZACION;
    }
    function getGanador(){
        return $this->_GANADOR;
    }

    function obtener(){
        $torneosDAL = new TorneosAccesoDatos();
        $rs = $torneosDAL->obtener();

		$listaTorneos =  array();

        foreach ($rs as $torneo)
        {
            $oTorneosReglasNegocio = new TorneosReglasNegocio();
            $oTorneosReglasNegocio->Init($torneo['id_torneo'],$torneo['nombre'],$torneo['fecha'],$torneo['localizacion'],$torneo['ganador']);
            array_push($listaTorneos,$oTorneosReglasNegocio);
         
        }
        return $listaTorneos;
    }

    function borrar($id_torneo){
        $torneosDAL=new TorneosAccesoDatos();
        $torneosDAL->borrar($id_torneo);
    }
}


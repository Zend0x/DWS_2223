<?php

require("../infraestructura/torneosAccesoDatos.php");

class TorneosReglasNegocio
{
    private $_ID;
    private $_NOMBRE;
    private $_FECHA;
    private $_LOCALIZACION;
    private $_ESTADO;
    private $_GANADOR;
    private $_CANTIDADTORNEOS;

	function __construct()
    {
    }

    function init($id,$nombre,$fecha,$localizacion,$estado,$ganador,$cantidadTorneos)
    {
        $this->_ID = $id;
        $this->_NOMBRE=$nombre;
        $this->_FECHA=$fecha;
        $this->_LOCALIZACION=$localizacion;
        $this->_ESTADO=$estado;
        $this->_GANADOR=$ganador;
        $this->_CANTIDADTORNEOS=$cantidadTorneos;
    }

    function getID()
    {
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
    function getEstado(){
        return $this->_ESTADO;
    }
    function getGanador(){
        return $this->_GANADOR;
    }
    function getCantidadTorneos(){
        return $this->_CANTIDADTORNEOS;
    }

    function obtener()
    {
        $torneosDAL = new TorneosAccesoDatos();
        $rs = $torneosDAL->obtener();

		$listaTorneos =  array();

        foreach ($rs as $torneo)
        {
            $oTorneosReglasNegocio = new TorneosReglasNegocio();
            $oTorneosReglasNegocio->Init($torneo['id_torneo'],$torneo['nombre'],$torneo['fecha'],$torneo['localizacion'],$torneo['estado'],$torneo['ganador'],$torneo['cantidadTorneos']);
            array_push($listaTorneos,$oTorneosReglasNegocio);
         
        }
        
        return $listaTorneos;
        
    }
}


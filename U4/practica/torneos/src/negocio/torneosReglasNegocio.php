<?php

require("../AccesoDatos/torneosAccesoDatos.php");

class TorneosReglasNegocio
{
    private $_ID;

	function __construct()
    {
    }

    function init($id)
    {
        $this->_ID = $id;
    }

    function getID()
    {
        return $this->_ID;
    }

    function obtener()
    {
        $torneosDAL = new TorneosAccesoDatos();
        $rs = $torneosDAL->obtener();

		$listaTorneos =  array();

        foreach ($rs as $torneo)
        {
            $oTorneosReglasNegocio = new TorneosReglasNegocio();
            $oTorneosReglasNegocio->Init($torneo['ID']);
            array_push($listaTorneos,$oTorneosReglasNegocio);
         
        }
        
        return $listaTorneos;
        
    }
}


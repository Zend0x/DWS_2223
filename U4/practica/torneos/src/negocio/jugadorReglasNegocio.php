<?php

require_once("../infraestructura/jugadorAccesoDatos.php");
// ini_set('display_errors', 1);
// ini_set('html_errors', 1);

class JugadorReglasNegocio
{
    private $_ID;
    private $_NOMBRE;
    private $_APELLIDOS;
    private $_NACIONALIDAD;
    private $_PARTIDOSJUGADOS;
    private $_PARTIDOSGANADOS;
    private $_TORNEOSJUGADOS;
    private $_TORNEOSGANADOS;

	function __construct()
    {
    }

    function init($id,$nombre,$apellidos,$nacionalidad,$partidosJugados,$partidosGanados,$torneosJugados,$torneosGanados)
    {
        $this->_ID = $id;
        $this->_NOMBRE=$nombre;
        $this->_APELLIDOS=$apellidos;
        $this->_NACIONALIDAD=$nacionalidad;
        $this->_PARTIDOSJUGADOS=$partidosJugados;
        $this->_PARTIDOSGANADOS=$partidosGanados;
        $this->_TORNEOSJUGADOS=$torneosJugados;
        $this->_TORNEOSGANADOS=$torneosGanados;
    }

    function getID(){
        return $this->_ID;
    }
    function getNombre(){
        return $this->_NOMBRE;
    }
    function getApellidos(){
        return $this->_APELLIDOS;
    }
    function getNacionalidad(){
        return $this->_NACIONALIDAD;
    }
    function getPartidosJugados(){
        return $this->_PARTIDOSJUGADOS;
    }
    function getPartidosGanados(){
        return $this->_PARTIDOSGANADOS;
    }
    function getTorneosJugados(){
        return $this->_TORNEOSJUGADOS;
    }
    function getTorneosGanados(){
        return $this->_TORNEOSGANADOS;
    }

    function obtener($id_jugador){
        $jugadorDAL = new JugadorAccesoDatos();
        $rs = $jugadorDAL->obtener($id_jugador);

		$datosJugador =  array();

        foreach ($rs as $jugador)
        {
            $oJugadorReglasNegocio = new JugadorReglasNegocio();
            $oJugadorReglasNegocio->Init($jugador['id_jugador'],$jugador['nombre'],$jugador['apellidos'],$jugador['nacionalidad'],$jugador['partidosJugados'],
                                         $jugador['partidosGanados'],$jugador['torneosJugados'],$jugador['torneosGanados']);
            array_push($datosJugador,$oJugadorReglasNegocio);
        }
        return $datosJugador;
    }
}


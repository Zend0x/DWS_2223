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

	function __construct()
    {
    }

    function init($id,$nombre,$apellidos,$nacionalidad)
    {
        $this->_ID = $id;
        $this->_NOMBRE=$nombre;
        $this->_APELLIDOS=$apellidos;
        $this->_NACIONALIDAD=$nacionalidad;
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

    function obtener($id_jugador){
        $jugadorDAL = new JugadorAccesoDatos();
        $rs = $jugadorDAL->obtener($id_jugador);

		$datosJugador =  array();

        foreach ($rs as $jugador)
        {
            $oJugadorReglasNegocio = new JugadorReglasNegocio();
            $oJugadorReglasNegocio->Init($jugador['id_jugador'],$jugador['nombre'],$jugador['apellidos'],$jugador['nacionalidad']);
            array_push($datosJugador,$oJugadorReglasNegocio);
        }
        return $datosJugador;
    }
}


<?php

class TorneosAccesoDatos{
	
	function __construct(){
    }

	function obtener(){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'T_torneos');
		$consulta = mysqli_prepare($conexion, "SELECT T_torneos.id_torneo,T_torneos.nombre,T_torneos.fecha FROM T_torneos ");
        $consulta->execute();
        $result = $consulta->get_result();

		$torneos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($torneos,$myrow);

        }
		return $torneos;
	}
}
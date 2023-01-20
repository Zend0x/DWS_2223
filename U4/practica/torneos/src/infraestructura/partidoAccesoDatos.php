<?php

class PartidoAccesoDatos{

	function __construct(){
    }

	function obtener(){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'T_torneos');
		$consulta = mysqli_prepare($conexion, "SELECT id_partido, id_jugadorA, id_jugadorB, id_ganador 
        FROM T_partidos WHERE T_partidos.id_partido='".$_GET['id_partido']."';");
        $consulta->execute();
        $result = $consulta->get_result();

		$partidos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($partidos,$myrow);

        }
		return $partidos;
	}
}
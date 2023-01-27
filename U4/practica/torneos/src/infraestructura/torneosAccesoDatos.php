<?php

class TorneosAccesoDatos
{
	
	function __construct()
    {
    }

	function obtener()
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "SELECT id_torneo, nombre,fecha,localizacion,estado,ganador FROM T_torneos GROUP BY id_torneo");
        $consulta->execute();
        $result = $consulta->get_result();

		$torneos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($torneos,$myrow);

        }
		return $torneos;
	}

	function insertar($nombre,$fecha,$estado,$ganador){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "insert into T_torneos(nombre,fecha,estado,ganador) values (?,?,?,?);");
        $consulta->bind_param("ssss", $nombre,$fecha,$estado,$ganador);
        $res = $consulta->execute();
        
		return $res;
	}
}





















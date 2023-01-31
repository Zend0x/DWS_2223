<?php
require("jugadorAccesoDatos.php");
class JugadorAccesoDatos
{
	function __construct()
    {
    }

	function obtener($id_jugador)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "SELECT id_jugador,nombre,apellidos,nacionalidad FROM T_jugadores WHERE id_jugador=".$id_jugador.";");
        $consulta->execute();
        $result = $consulta->get_result();

		$datos_jugador =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($datos_jugador,$myrow);

        }
		return $datos_jugador;
	}
}
    
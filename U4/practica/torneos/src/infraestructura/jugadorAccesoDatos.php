<?php
require_once("jugadorAccesoDatos.php");
// ini_set('display_errors', 1);
// ini_set('html_errors', 1);
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
		$query="SELECT id_jugador,nombre,apellidos,nacionalidad,
		(SELECT COUNT(id_partido) FROM T_partidos where id_jugadorA=".$id_jugador." OR id_jugadorB=".$id_jugador.") as partidosJugados,
		(SELECT COUNT(DISTINCT(id_torneo)) FROM T_partidos where id_jugadorA=".$id_jugador." OR id_jugadorB=".$id_jugador.") as torneosJugados,
		(SELECT COUNT(id_partido) FROM T_partidos where id_ganador=".$id_jugador.") as partidosGanados,
		(SELECT COUNT(DISTINCT(id_torneo)) FROM T_torneos WHERE T_torneos.ganador=".$id_jugador.") as torneosGanados
		FROM T_jugadores WHERE id_jugador=".$id_jugador.";";
		$consulta = mysqli_prepare($conexion, $query);
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
    
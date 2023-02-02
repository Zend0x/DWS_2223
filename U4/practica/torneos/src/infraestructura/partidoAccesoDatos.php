<?php
ini_set('display_errors', 1);
ini_set('html_errors', 1);

class PartidoAccesoDatos{

	function __construct(){
    }

	function obtener($id_torneo){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$query="SELECT id_partido, id_jugadorA, id_jugadorB, IFNULL(id_ganador,' ') AS id_ganador, rondaTorneo, 
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorA) as 'nombreJugadorA',
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_jugadorB) AS 'nombreJugadorB',
		(SELECT CONCAT_WS(' ',nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_ganador) AS 'nombreGanador'
		FROM T_partidos 
		WHERE T_partidos.id_torneo='".$id_torneo."';";
		$consulta = mysqli_prepare($conexion, $query);
        $consulta->execute();
        $result = $consulta->get_result();

		$partidos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($partidos,$myrow);

        }
		return $partidos;
	}
	function insertar($id_torneo,$id_jugadorA,$id_jugadorB,$rondaTorneo){
		var_dump($id_torneo);
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}

        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "insert into T_partidos(id_partido,id_torneo,id_jugadorA,id_jugadorB,rondaTorneo) values (?,?,?,?,?);");
        $consulta->bind_param("iiiis",$proximoPartido,$id_torneo,$id_jugadorA,$id_jugadorB,$rondaTorneo);
        $res = $consulta->execute();
        
		return $res;
	}
	function actualizarPartido($id_partido){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "UPDATE T_partidos SET id_ganador=(?) WHERE id_partido=(?);");
        $consulta->bind_param("ii",$id_ganador,$id_partido);
        $res = $consulta->execute();
        
		return $res;
	}
}
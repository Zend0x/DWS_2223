<?php
require("partidoAccesoDatos.php");
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
		$consulta = mysqli_prepare($conexion, 'SELECT id_torneo, nombre,fecha,localizacion, 
		(SELECT id_ganador FROM T_partidos WHERE T_partidos.rondaTorneo="final") as id_ganador, 
		(SELECT CONCAT_WS(" ",nombre,apellidos) FROM T_jugadores WHERE T_jugadores.id_jugador=id_ganador) as "nombreGanador" 
		FROM T_torneos GROUP BY id_torneo;');
        $consulta->execute();
        $result = $consulta->get_result();

		$torneos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($torneos,$myrow);

        }
		return $torneos;
	}

	function insertar($nombre,$fecha,$ganador){
		$conexion = mysqli_connect('localhost','root','12345');
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
		$id_torneo_Query=mysqli_prepare($conexion, "SELECT IFNULL(MAX(id_torneo),0)+1 AS 'id_torneo' FROM T_torneos;");
		$id_torneo_Query->execute();
		$result=$id_torneo_Query->get_result();
		$id_torneo=$result->fetch_assoc();
 		
		$consulta = mysqli_prepare($conexion, "insert into T_torneos(nombre,fecha,ganador) values (?,?,?);");
        $consulta->bind_param("sss", $nombre,$fecha,$ganador);
        $res = $consulta->execute();
		
		$jugadores=range(1,8);
		shuffle($jugadores);
		$parejas=array();
		
		for($i=0;$i<4;$i++){
			$parejas[]=array($jugadores[$i*2],$jugadores[$i*2+1]);
		}
		$partidos=new PartidoAccesoDatos();
		for($i=0;$i<count($parejas);$i++){
				$jugadorA=$parejas[$i][0];
				$jugadorB=$parejas[$i][1];
				$partidos->insertar($id_torneo["id_torneo"],$jugadorA,$jugadorB,"cuartos");
			}
			return $res;
		}
	
	function borrar($id_torneo){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}


		ini_set('display_errors', 1);
		ini_set('html_errors', 1);

		echo "aaa";
 		
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta2=mysqli_prepare($conexion,"DELETE FROM T_partidos WHERE T_partidos.id_torneo=(?)");
		$consulta2->bind_param("i",$id_torneo);
		$consulta2->execute();
		$consulta = mysqli_prepare($conexion, "DELETE FROM T_torneos WHERE T_torneos.id_torneo=(?);");
        $consulta->bind_param("i", $id_torneo);
        $res = $consulta->execute();

		return $res;
	}
}





















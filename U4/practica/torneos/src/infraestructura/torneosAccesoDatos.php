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
		
		$id_torneo_Query=mysqli_prepare($conexion, "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE table_name = 'T_torneos';");
		$id_torneo=$id_torneo_Query->execute();

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
				$partidos->insertar($id_torneo,$jugadorA,$jugadorB);
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
		$consulta = mysqli_prepare($conexion, "DELETE FROM T_torneos WHERE T_torneos.id_torneo=(?);");
        $consulta->bind_param("i", $id_torneo);
		$consulta2=mysqli_prepare($conexion,"DELETE FROM T_partidos WHERE T_partidos.id_torneo=(?)");
		$consulta2->bind_param("i",$id_torneo);
        $res = $consulta->execute();

		return $res;
	}
}





















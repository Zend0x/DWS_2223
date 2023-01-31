<?php
ini_set('display_errors', 1);
ini_set('html_errors', 1);

class PartidoAccesoDatos{

	function __construct(){
    }

	function obtener(){
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "SELECT id_partido, id_jugadorA, id_jugadorB, id_ganador 
        FROM T_partidos WHERE T_partidos.id_torneo='".$_GET['torneo']."';");
        $consulta->execute();
        $result = $consulta->get_result();

		$partidos =  array();

        while ($myrow = $result->fetch_assoc()) 
        {
			array_push($partidos,$myrow);

        }
		return $partidos;
	}
	function insertar($id_torneo,$id_jugadorA,$id_jugadorB){
		var_dump($id_torneo);
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'torneosTenisMesaDB');
		$consulta = mysqli_prepare($conexion, "insert into T_partidos(id_torneo,id_jugadorA,id_jugadorB) values (?,?,?);");
        $consulta->bind_param("iii",$id_torneo,$id_jugadorA,$id_jugadorB);
        $res = $consulta->execute();
        
		return $res;
	}
}
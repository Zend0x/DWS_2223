<?php
ini_set('display_errors', 1);
ini_set('html_errors', 1);
    class ipAccesoDatos{
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
            mysqli_select_db($conexion, 'ipsDB');
            $query="SELECT ip_binaria FROM direcciones_ip";
            $consulta = mysqli_prepare($conexion, $query);
            $consulta->execute();
            $result = $consulta->get_result();

            $direccionesIP =  array();

            while ($myrow = $result->fetch_assoc()) 
            {
                array_push($direccionesIP,$myrow);

            }
            return $direccionesIP;
        }
        function obtenerDireccionesIpBloqueadas(){
            $conexion = mysqli_connect('localhost','root','12345');
            if (mysqli_connect_errno())
            {
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'ipsDB');
            $query="SELECT ip_binaria FROM direcciones_ip_bloqueadas";
            $consulta = mysqli_prepare($conexion, $query);
            $consulta->execute();
            $result = $consulta->get_result();

            $direccionesIP =  array();

            while ($myrow = $result->fetch_assoc()) 
            {
                array_push($direccionesIP,$myrow);

            }
            return $direccionesIP;
        }

        function insertarIpValida($direccion_ip){
            $conexion = mysqli_connect('localhost','root','12345');
            if (mysqli_connect_errno())
            {
                    echo "Error al conectar a MySQL: ". mysqli_connect_error();
            }
            mysqli_select_db($conexion, 'ipsDB');
            $query="INSERT INTO direcciones_ip_validas(ip_binaria) VALUES (?)";
            $consulta = mysqli_prepare($conexion, $query);
            $consulta->bind_param("s",$direccion_ip);
            $consulta->execute();
            $result = $consulta->get_result();

            return $result;
        }
    }
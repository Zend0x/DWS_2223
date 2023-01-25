<?php

class UsuarioAccesoDatos{
	
	function __construct()
    {
    }

	function insertar($username,$perfil,$contrasena)
	{
		$conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno())
		{
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
 		
        mysqli_select_db($conexion, 'T_torneos');
		$consulta = mysqli_prepare($conexion, "insert into T_usuarios(username,contrasena,tipoUsuario) values (?,?,?);");
        $hash = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta->bind_param("sss", $username,$hash,$perfil);
        $res = $consulta->execute();
        
		return $res;
	}

    function verificar($username,$contrasena)
    {
        $conexion = mysqli_connect('localhost','root','12345');
		if (mysqli_connect_errno()){
				echo "Error al conectar a MySQL: ". mysqli_connect_error();
		}
        mysqli_select_db($conexion, 'T_torneos');
        $consulta = mysqli_prepare($conexion, "select username,contrasena,tipoUsuario from T_usuarios where username = ?;");
        $sanitized_usuario = mysqli_real_escape_string($conexion, $username);       
        $consulta->bind_param("s", $sanitized_usuario);
        $consulta->execute();
        $res = $consulta->get_result();
        if ($res->num_rows==0){
            return 'NOT_FOUND';
        }

        if ($res->num_rows>1) //El nombre de usuario debería ser único.
        {
            return 'NOT_FOUND';
        }

        $myrow = $res->fetch_assoc();
        $x = $myrow['contrasena'];
        if (password_verify($contrasena, $x)){
            return $myrow['tipoUsuario'];
        } 
        else {
            return 'NOT_FOUND';
        }
    }
}




















